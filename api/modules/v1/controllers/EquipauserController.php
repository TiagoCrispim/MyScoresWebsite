<?php

namespace api\modules\v1\controllers;

use yii\filters\auth\QueryParamAuth;

class EquipauserController extends \yii\web\Controller
{
    public $modelClass = 'common\models\EquipaUser';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className()
        ];
        return $behaviors;
    }

}
