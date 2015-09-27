<?php

namespace app\api\v2;

use yii\base\Module;

class RestfulModule extends Module
{
    public $controllerNamespace = 'app\api\v2\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
