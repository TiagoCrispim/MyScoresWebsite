<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

/**
 * JogoController implements the CRUD actions for Jogo model.
 */
class JogoController extends ActiveController
{

    public $modelClass = 'api\modules\v1\models\Jogo';

    /**
     * @return array|void
     */

    /*public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className()
        ];
        return $behaviors;
    }*/

    public function actionGetjogo(){

        
    }

}
