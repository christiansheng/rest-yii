<?php

namespace app\api\common\models;

use Yii;
use yii\web\Link;
use yii\helpers\Url;
use yii\web\Linkable;
use yii\db\ActiveRecord;
use yii\data\Pagination;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $name
 * @property string $press
 * @property string $authors
 * @property string $isbn
 * @property integer $version
 * @property string $date
 * @property string $lanuage
 */
class Book extends ActiveRecord implements Linkable
{

    public static function tableName()
    {
        return 'book';
    }


    public function rules()
    {
        return [
            [['isbn', 'publish_at'], 'required'],
            [['version'], 'integer'],
            [['publish_at', 'create_at', 'update_at'], 'safe'],
            [['name', 'authors'], 'string', 'max' => 100],
            [['press'], 'string', 'max' => 50],
            [['isbn', 'language'], 'string', 'max' => 20]
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'press' => 'Press',
            'authors' => 'Authors',
            'isbn' => 'Isbn',
            'version' => 'Version',
            'language' => 'Language',
            'publish_at' => 'Publish At',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    public function getLinks()
    {
        // a url link to the returned active record
        $url = Yii::$app->getRequest()->getAbsoluteUrl();
        // change $url_cut_point if you have more prefix in the url of restful api
        $url_cut_point = 5;
        $url_slice = array_slice(preg_split("#[?/]#", $url), 0, $url_cut_point);
        $link = implode('/', $url_slice).'/'.$this->id;

        return [ Link::REL_SELF => $link ];
    }

    public function afterFind(){
        // if request is PUT, do nothing
        if (Yii::$app->request->getIsPut())
            return;

        // else return friendly format to frontend
        $authors = explode(',', $this->authors);
        $this->authors  = $authors;
    }

    public function load($data, $formName = null)
    {
        $data = $this->_beforeLoad($data);
        parent::load($data, $formName);
    }

    private function _beforeLoad($data)
    {
        // this is where we transform the input data, to suit our data model
        $data['update_at']= date('Y-m-d h:i:s',time());

        if(isset($data['authors'])) {
            $data['authors'] = implode(',', $data['authors']);
        }

        return $data;
    }
}
