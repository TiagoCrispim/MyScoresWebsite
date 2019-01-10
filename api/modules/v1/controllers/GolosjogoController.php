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

    /*public function actionIndex()
    {
        return $this->render('index');
    }*/

}
