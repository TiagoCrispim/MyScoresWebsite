<?php
namespace frontend\controllers;

use common\models\GolosJogo;
use common\models\User;
use frontend\models\EditarPasswordForm;
use frontend\models\EditarPerfilForm;
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
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'perfil', 'editarperfil', 'login', 'home', 'index'],
                'rules' => [
                    [
                        'actions' => ['signup', 'login', 'index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'perfil', 'editarperfil', 'home', 'index'],
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

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
            return $this->render('index');
        } else {
            $usersquery= User::findBySql('SELECT username,id FROM user')->all();

            for($i = 0;$i < count($usersquery);$i++){
                $users[$i] = $usersquery[$i]->username;
                $id_users[$i]=$usersquery[$i]->id;

            }
            $model=new User();

            if (Yii::$app->request->isPost) {


                $model->username=$users[Yii::$app->request->bodyParams['User']['username']];
                $user= User::findByUsername($model->username);
                $userid=$user->id;
                $queryGolos = GolosJogo::find()->where(['id_user' => $userid]);
                $golosM = $queryGolos->sum('golosMarcados');
                $jogosJogados = $queryGolos->count();
                return $this->render('perfilodeoutrojogador', ['user' => $user, 'golosM' => $golosM, 'jogosJogados' => $jogosJogados]);

            } else{


                return $this->render('home',[
                    'model' => $model,
                    'users'=> $users,
                    'id_users'=>$id_users

                    ]

                    );
            }
        }
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionHome()
    {
        return $this->render('home');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            if (\Yii::$app->user->can('enterFrontEnd')) {
                return $this->render('home');
            } else {
                Yii::$app->user->logout();
                Yii::warning("Não tem permissões para entrar nesta area");
                return $this->render('login', ['model' => $model]);
            }
        }
        else{

            $model->password = '';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays perfil de outro jogador page.
     *
     * @return mixed
     */
    public function actionPerfildeoutrojogador()
    {
        //$user corresponde ao utilizador que pretendemos visualizar
        //$user = Yii::$app->user->identity;

        $userid = Yii::$app->user->getId();
        $queryGolos = GolosJogo::find()->where(['id_user' => $userid]);
        $golosM = $queryGolos->sum('golosMarcados');
        $jogosJogados = $queryGolos->count();
        return $this->render('perfil', ['user'=>$user, 'golosM' => $golosM, 'jogosJogados' => $jogosJogados]);
    }

    /**
     * Displays perfil page.
     *
     * @return mixed
     */
    public function actionPerfil()
    {
        //$user corresponde ao utilizador com  sessão inciciada
        $user = Yii::$app->user->identity;
        $userid = Yii::$app->user->getId();
        $queryGolos = GolosJogo::find()->where(['id_user' => $userid]);
        $golosM = $queryGolos->sum('golosMarcados');
        $jogosJogados = $queryGolos->count();
        return $this->render('perfil', ['user'=>$user, 'golosM' => $golosM, 'jogosJogados' => $jogosJogados]);
    }

    /**
     * Displays editarperfil page.
     *
     * @return mixed
     */
    public function actionEditarperfil()
    {
        $model = new EditarPerfilForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->guardardados()) {
                $user = Yii::$app->user->identity ;
                $queryGolos = GolosJogo::find()->where(['id_user' => $user->getId()]);
                $golosM = $queryGolos->sum('golosMarcados');
                $jogosJogados = $queryGolos->count();
                return $this->render('perfil', ['user'=>$user, 'golosM' => $golosM, 'jogosJogados' => $jogosJogados]);
            }
        }

        return $this->render('editarperfil', ['model' => $model]);
    }

    /**
     * Displays editarperfil page.
     *
     * @return mixed
     */
    public function actionEditarpassword()
    {
        $model = new EditarPasswordForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->guardardados()) {
                $user = Yii::$app->user->identity ;
                $queryGolos = GolosJogo::find()->where(['id_user' => $user->getId()]);
                $golosM = $queryGolos->sum('golosMarcados');
                $jogosJogados = $queryGolos->count();
                return $this->render('perfil', ['user'=>$user, 'golosM' => $golosM, 'jogosJogados' => $jogosJogados]);
            }
        }

        return $this->render('editarpassword', ['model' => $model]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
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
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
