<?php

namespace common\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "sugestao".
 *
 * @property int $id
 * @property int $id_user
 * @property string $mensagem
 */
class Sugestao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sugestao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mensagem'], 'required'],
            [['mensagem'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mensagem' => 'Mensagem:',
        ];
    }

    public function enviarsugestao()
    {
        $user = Yii::$app->user->findIdentity;
        $sugestao->id_user = $user;
        $sugestao->mensagem = $this->mensagem;

        return $sugestao->save(false) ? $sugestao : null;
    }

    /**
     * relação da tabela sugestao com a tabela user
     */
    public function getUser()
    {
        return $this->hasMany(User::classname(),['id'=>'id_user']);
    }
}
