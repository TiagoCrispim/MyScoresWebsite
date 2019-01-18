<?php
namespace frontend\controllers;

use common\models\Sugestao;
use common\models\User;
use frontend\models\EditarPasswordForm;
use frontend\models\EditarPerfilForm;
use http\Message;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Sugestao controller
 */
class SugestaoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    // para visualizar a view sugestao
    public function actionIndex(){

        $model = new Sugestao();


        if (Yii::$app->request->post()) {
            $sugestao=Yii::$app->request->bodyParams['Sugestao'];

            $msg=$sugestao['mensagem'];

            $model->mensagem = $msg;
            $model->id_user=Yii::$app->user->getId();

            $model->save();

            //return var_dump($sugestao);

            

        }

        return $this->render('sugestao', ['model' => $model]);
    }
}
