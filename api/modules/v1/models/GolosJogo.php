<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "golos_jogo".
 *
 * @property int $id
 * @property int $id_jogador
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
    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jogador', 'id_jogo', 'golosMarcados'], 'required'],
            [['id_jogador', 'id_jogo', 'golosMarcados'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_jogador' => 'Id Jogador',
            'id_jogo' => 'Id Jogo',
            'golosMarcados' => 'Golos Marcados',
        ];
    }
}
