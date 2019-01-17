<?php

namespace common\models;


use Yii;

/**
 * This is the model class for table "golos_jogo".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_jogo
 * @property int $golosMarcados
 */
class GolosJogo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'golos_jogo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_jogo', 'golosMarcados'], 'required'],
            [['id_user', 'id_jogo', 'golosMarcados'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id Jogador',
            'id_jogo' => 'Id Jogo',
            'golosMarcados' => 'Golos Marcados',
        ];
    }

    /**
     * relação da tabela golosJogo com a tabela jogo
     */
    public function getJogo()
    {
        return $this->hasOne(Jogo::classname(),['id'=>'id_jogo']);
    }

    /**
     * relação da tabela golosJogo com a tabela user (jogador/utilizador)
     */
    public function getJogador()
    {
        return $this->hasOne(User::classname(),['id'=>'id_jogador']);
    }
}
