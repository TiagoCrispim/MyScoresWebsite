<?php

namespace common\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "equipa".
 *
 * @property int $id
 * @property string nome
 * @property int $id_criador
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
    public function rules()
    {
        return [
            [['nome','id_criador','id_jogador1', 'id_jogador2', 'id_jogador3', 'id_jogador4', 'id_jogador5'], 'required'],
            //[['id_jogador1', 'id_jogador2', 'id_jogador3', 'id_jogador4', 'id_jogador5', 'id_jogador6', 'id_jogador7', 'id_jogador8', 'id_jogador9', 'id_jogador10']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            //'id_jogo' => 'Id Jogo',
            'id_criador' => 'Id Criador',
            'id_jogador1' => 'jogador1',
            'id_jogador2' => 'jogador2',
            'id_jogador3' => 'jogador3',
            'id_jogador4' => 'jogador4',
            'id_jogador5' => 'jogador5',
            'id_jogador6' => 'jogador6',
            'id_jogador7' => 'jogador7',
            'id_jogador8' => 'jogador8',
            'id_jogador9' => 'jogador9',
            'id_jogador10' => 'jogador10',
        ];
    }

    /**
     * relação da tabela equipa com a tabela jogo

    public function getJogo()
    {
        return $this->hasOne(Jogo::classname(),['id'=>'id_jogo']);
    }*/

    /**
     * relação da tabela equipa com a tabela user (jogadores/utilizadores)
     */
    public function getJogadores()
    {
        return $this->hasMany(User::classname(),['id'=>'id_jogador']);
    }
}
