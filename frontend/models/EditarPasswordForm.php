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
    public $password;
    public $confirmacaoPassword;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['confirmacaoPassword', 'required'],
            ['confirmacaoPassword', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match"],
            ['confirmacaoPassword', 'string', 'min' => 6],
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

        $user = Yii::$app->user->identity;
        $user->setPassword($this->password);

        return $user->save(false) ? $user : null;
    }
}
