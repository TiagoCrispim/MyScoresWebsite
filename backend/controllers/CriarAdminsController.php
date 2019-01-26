<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\SignupForm;
use yii\web\BadRequestHttpException;
use yii\base\InvalidParamException;




/**
 * Site controller
 */
class CriarAdminsController extends Controller
{
    public function actionIndex()
    {
        if (\Yii::$app->user->can('createAdmin')){
            $model = new SignupForm();
            if ($model->load(Yii::$app->request->post())) {
                if ($user = $model->signup()) {
                    if (Yii::$app->getUser()->login($user)) {
                        return $this->goHome();
                    }
                }
            }

            return $this->render('signup', [
                'model' => $model,
            ]);
        }else {

            throw new \yii\web\ForbiddenHttpException('Não tem permissão para entrar');
        }

}

}
