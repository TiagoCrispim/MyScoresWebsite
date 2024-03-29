<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

class GolosjogoController extends ActiveController
{

    public $modelClass = 'api\modules\v1\models\GolosJogo';

    public function behaviors()
    {

        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [ #AUTH_KEY

            'class' => CompositeAuth::className(),
            'authMethods' => [
                HttpBearerAuth::className(),
            ],
        ];
        return; // TODO: Change the autogenerated stub
    }

}
