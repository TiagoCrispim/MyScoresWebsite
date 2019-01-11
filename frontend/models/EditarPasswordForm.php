<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use Yii;

/**
 * Signup form
 */
class EditarPasswordForm extends Model
{
    public $id;
    public $atualPassword;
    public $password;
    public $confirmacaoPassword;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['atualPassword', 'required', 'message' => 'Este campo não pode ser deixado em branco.'],
            ['atualPassword', 'string', 'min' => 6],

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
            'atualPassword'=>'Palavra-passe Atual:',
            'password'=>'Nova Palavra-passe:',
            'confirmacaoPassword'=>'Confirmação de Palavra-passe:',
        ];
    }

    public function verificarPassword($atualPassword)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user->validatePassword($this->atualPassword)) {
                $this->addError($atualPassword, 'Incorrect password.');
            }
        }
    }

    /**
     * Guardar as alterações realizadas pelo utilizador.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function guardardados()
    {
        if ($this->validate()) {
            $user = Yii::$app->user->identity;
            $user->setPassword($this->password);


            return $user->save(false) ? $user : null;
        }

        return false;


    }
}
