<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "golos_jogo".
 *
 * @property int $id
 * @property int $id_jogador
 * @property int $id_jogo
 * @property int $golos_marcados
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
            [['id_jogador', 'id_jogo', 'golos_marcados'], 'required'],
            [['id_jogador', 'id_jogo', 'golos_marcados'], 'integer'],
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
            'golos_marcados' => 'Golos Marcados',
        ];
    }
}
