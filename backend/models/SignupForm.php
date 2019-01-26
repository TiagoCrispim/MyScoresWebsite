<?php
namespace backend\models;

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
            ['username', 'required', 'message' => 'Este campo não pode ser deixado em branco.'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este username já está a ser utilizado.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['nome', 'trim'],
            ['nome', 'required', 'message' => 'Este campo não pode ser deixado em branco.'],
            ['nome', 'string', 'min' => 5, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', 'message' => 'Este campo não pode ser deixado em branco.'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este email já está a ser utilizado.'],

            ['dataNascimento', 'date', 'format' => 'php:Y-m-d'],
            ['dataNascimento', 'trim'],
            ['dataNascimento', 'required', 'message' => 'Este campo não pode ser deixado em branco.'],

            ['nacionalidade', 'trim'],
            ['nacionalidade', 'required', 'message' => 'Este campo não pode ser deixado em branco.'],
            ['nacionalidade', 'string', 'min'=> 2, 'max' => 255],

            ['password', 'required', 'message' => 'Este campo não pode ser deixado em branco.'],
            ['password', 'string', 'min' => 6],

            ['confirmacaoPassword', 'required', 'message' => 'Este campo não pode ser deixado em branco.'],
            ['confirmacaoPassword', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match"],
            ['confirmacaoPassword', 'string', 'min' => 6],
        ];
    }

    //para descrever os atributos a preencher em cada input
    public function attributeLabels(){
        return [
            'username'=>'Username:',
            'nome'=>'Nome:',
            'email'=>'Email:',
            'dataNascimento'=>'Data de Nascimento:',
            'nacionalidade'=>'Nacionalidade:',
            'password'=>'Palavra-passe:',
            'confirmacaoPassword'=>'Confirmação de Palavra-passe:',
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
        $regularRole = $auth->getRole('admin');
        $auth->assign($regularRole, $user->getId());

        return $user;

    }
}
