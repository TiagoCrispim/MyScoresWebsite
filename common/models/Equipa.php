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
 *
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
     * relação da tabela equipa com a tabela user (jogadores/utilizadores)
     */
    public function getUsers()
    {
        return $this->hasMany(User::classname(),['id'=>'id_user'])
            ->viaTable('equipa_user',['id_equipa'=>'id']);
    }
}
