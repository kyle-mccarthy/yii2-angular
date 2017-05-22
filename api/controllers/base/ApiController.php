<?php namespace app\controllers\base;

use yii\rest\Controller;
use yii\web\Response;

class ApiController extends Controller {

    public function beforeAction($action)
    {
        $behavior = $action->controller->getBehaviors()['contentNegotiator'];
        $behavior->formats = [
            'application/json' => Response::FORMAT_JSON,
        ];

        $action->detachBehavior('contentNegotiator');
        $action->attachBehavior('contentNegotiator', $behavior);

        return parent::beforeAction($action);
    }

}