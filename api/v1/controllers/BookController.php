<?php

namespace app\api\v1\controllers;

use Yii;
use yii\helpers\Url;
use yii\rest\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use app\api\common\models\Book;
use yii\web\ServerErrorHttpException;

class BookController extends Controller
{
    public $modelClass = 'app\api\common\models\Book';

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items'
    ];

    public function actionIndex() //GET, HEAD
    {
        $params = Yii::$app->request->get();

//        isset($params['page'])? $page = $params['page']: $page = 1;
//        isset($params['size'])? $size = $params['size']: $size = 20;

        $query = Book::find()->where('id>0');

        // equal conditions
        foreach($fields=['version'] as $field) {
            if (isset($params[$field])) {
                $field_value = $params[$field];
                $query = $query->andWhere("$field=$field_value");
            }
        }

        // like conditions
        foreach($fields=['name', 'press', 'authors'] as $field) {
            if (isset($params[$field])) {
                $field_keyword = $params[$field];
                $query = $query->andWhere(['like', $field, $field_keyword]);
            }
        }

        $adp = new ActiveDataProvider(['query' => $query]);
        return $adp;
    }

    public function actionView($id) //GET, HEAD by id
    {
        $model = Book::findOne($id);
        if ($model == null)
            throw new NotFoundHttpException("Position Not Found");
        return $model;
    }

    # todo @sheng: May need to implement DELETE later. Just return 403 temporarily.
    public function actionDelete($id) //DELETE by id
    {
        throw new ForbiddenHttpException();
    }

    public function actionCreate() //POST
    {
        $model = new Book();
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');

        if ($model->save()) {
            $response = Yii::$app->getResponse();
            $response->setStatusCode(201);
            $id = implode(',', array_values($model->getPrimaryKey(true)));
            $response->getHeaders()->set('Location', Url::to('', true). '/'.$id);
        } elseif (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        }
        return $model;
    }

    public function actionUpdate($id) //PUT by id
    {
        $model = Book::findOne($id);
        if ($model == null)
            throw new NotFoundHttpException('Position Not Found.');

        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->save() === false && !$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
        }
        return $model;
    }

    public function actionOptions() //OPTIONS
    {
        // OPTIONS itself should be included always
        $options = ['GET', 'HEAD', 'PUT', 'POST', 'OPTIONS'];
        Yii::$app->getResponse()->getHeaders()->set('Allow', implode(', ', $options));
    }

}