<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class EditarPerfilForm extends Model
{
    public $nome;
    public $email;
    public $dataNascimento;
    public $nacionalidade;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['nome', 'trim'],
            ['nome', 'required'],
            ['nome', 'string', 'min' => 5, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['dataNascimento', 'date', 'format' => 'php:Y-m-d'],
            ['dataNascimento', 'trim'],
            ['dataNascimento', 'required'],

            ['nacionalidade', 'trim'],
            ['nacionalidade', 'required'],
            ['nacionalidade', 'string', 'min'=> 2, 'max' => 255],
        ];
    }

    /**
     * Guardar as alterações realizadas pelo utilizador.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function guardardados()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = Yii::$app->user->identity->id;
        $user->username = $this->username;
        $user->nome = $this->nome;
        $user->dataNascimento = $this->dataNascimento;
        $user->email = $this->email;
        $user->nacionalidade = $this->nacionalidade;
        
        return $user->save() ? $user : null;
    }
}
