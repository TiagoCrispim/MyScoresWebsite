<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $nome;
    public $email;
    public $dataNascimento;
    public $nacionalidade;
    public $password;
    public $confirmacaoPassword;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['nome', 'trim'],
            ['nome', 'required'],
            ['nome', 'string', 'min' => 5, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['dataNascimento', 'trim'],
            ['dataNascimento', 'required'],

            ['nacionalidade', 'trim'],
            ['nacionalidade', 'required'],
            ['nacionalidade', 'string', 'min'=> 2, 'max' => 255],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['confirmacaoPassword', 'required'],
            ['confirmacaoPassword', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match"],
            ['confirmacaoPassword', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->nome = $this->nome;
        $user->dataNascimento = $this->dataNascimento;
        $user->email = $this->email;
        $user->nacionalidade = $this->nacionalidade;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->save(false);

        $auth = \Yii::$app->authManager;
        $regularRole = $auth->getRole('regular');
        $auth->assign($regularRole, $user->getId());

        return $user;

    }
}
