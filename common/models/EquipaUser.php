<?php
/**
 * Created by PhpStorm.
 * User: rodas
 * Date: 17/01/2019
 * Time: 12:38
 */

namespace common\models;

use Yii;
/**
 * This is the model class for table "golos_jogo".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_equipa
 */
class EquipaUser extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'equipauser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_equipa'], 'required','message'=>'Este campo não ser deixado em branco'],
            [['id_equipa'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Username:',
            'id_equipa' => 'Id equipa',

        ];
    }

    /**
     * relação da tabela equipa_user com a tabela user
     */
    public function getUser()
    {
        return $this->hasOne(User::classname(),['id'=>'id_user']);
    }

    /**
     * relação da tabela equipa_user com a tabela equipa (jogador/utilizador)
     */
    public function getEquipa()
    {
        return $this->hasOne(Equipa::className(),['id'=>'id_equipa']);

    }


}