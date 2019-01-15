<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

class UserController extends ActiveController
{

    public $modelClass = 'api\modules\v1\models\User';

    /*public function actionIndex()
    {
        return $this->render('index');
    }*/

}
