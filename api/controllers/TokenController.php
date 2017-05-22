<?php namespace app\controllers;

use yii\rest\Controller;
use yii\filters\auth\HttpBearerAuth;

class TokenController extends Controller {

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'bearerAuth' => [
                'class' => HttpBearerAuth::className()
            ]
        ]);
    }

}