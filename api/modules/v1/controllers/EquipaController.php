<?php

namespace api\modules\v1\controllers;

use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class EquipaController extends ActiveController
{

    public $modelClass = 'api\modules\v1\models\Equipa';

    /*public function actionIndex()
    {
        return $this->render('index');
    }*/

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className()
        ];
        return $behaviors;
    }


}
