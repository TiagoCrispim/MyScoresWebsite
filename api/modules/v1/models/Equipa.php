<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "equipa".
 *
 * @property int $id
 * @property int $id_jogo
 * @property int $id_jogador1
 * @property int $id_jogador2
 * @property int $id_jogador3
 * @property int $id_jogador4
 * @property int $id_jogador5
 * @property int $id_jogador6
 * @property int $id_jogador7
 * @property int $id_jogador8
 * @property int $id_jogador9
 * @property int $id_jogador10
 */
class Equipa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipa';
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
            [['id_jogo', 'id_jogador1', 'id_jogador2', 'id_jogador3', 'id_jogador4', 'id_jogador5'], 'required'],
            [['id_jogo', 'id_jogador1', 'id_jogador2', 'id_jogador3', 'id_jogador4', 'id_jogador5', 'id_jogador6', 'id_jogador7', 'id_jogador8', 'id_jogador9', 'id_jogador10'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_jogo' => 'Id Jogo',
            'id_jogador1' => 'Id Jogador1',
            'id_jogador2' => 'Id Jogador2',
            'id_jogador3' => 'Id Jogador3',
            'id_jogador4' => 'Id Jogador4',
            'id_jogador5' => 'Id Jogador5',
            'id_jogador6' => 'Id Jogador6',
            'id_jogador7' => 'Id Jogador7',
            'id_jogador8' => 'Id Jogador8',
            'id_jogador9' => 'Id Jogador9',
            'id_jogador10' => 'Id Jogador10',
        ];
    }
}
