<?php namespace app\controllers;

use app\models\base\User;
use app\models\forms\AuthForm;
use app\controllers\base\ApiController;

class AuthController extends ApiController {

    public function actionLogin()
    {
        $model = AuthForm::create(\Yii::$app->request->post());
        if ($model->validate()) {
            if ($model->login()) {
                return $this->asJson([
                    'status' => 'ok',
                    'message' => 'User authenticated.',
                    'token' => $model->token
                ]);
            }
        }
        return $this->asJson([
            'status' => 'failed',
            'errors' => $model->getErrors()
        ], 400);
    }

}