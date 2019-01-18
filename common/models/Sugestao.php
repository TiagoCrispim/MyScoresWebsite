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



    /**
     * relação da tabela sugestao com a tabela user
     */
    public function getUser()
    {
        return $this->hasOne(User::classname(),['id'=>'id_user']);
    }
}
