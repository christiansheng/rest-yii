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
            [['isbn', 'date'], 'required'],
            [['version'], 'integer'],
            [['date'], 'safe'],
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
            'date' => 'Date',
            'lanuage' => 'Lanuage',
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
}
