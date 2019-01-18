<?php

namespace common\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "equipa".
 *
 * @property int $id
 * @property string $nome
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
            [['nome','id_criador'], 'required', 'message' => 'Este campo não pode ser deixado em branco.'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome da Equipa (Opcional):',
            'id_criador' => 'Id Criador',

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
    public function getUser()
    {
        return $this->hasMany(\common\models\User::className(),['id'=>'id_equipa'])
            ->viaTable(EquipaUser::tableName(),['id_user'=>'id']);
    }
}
