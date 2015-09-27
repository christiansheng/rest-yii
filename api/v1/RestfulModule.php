<?php

namespace app\api\v1;

use yii\base\Module;

class RestfulModule extends Module
{
    public $controllerNamespace = 'app\api\v1\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
