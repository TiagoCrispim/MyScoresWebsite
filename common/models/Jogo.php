<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jogo".
 *
 * @property int $id
 * @property int $id_equipa1
 * @property int $id_equipa2
 * @property int $golosEquipa1
 * @property int $golosEquipa2
 * @property string $data
 * @property string $local
 */
class Jogo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jogo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_equipa1', 'id_equipa2', 'local'], 'required'],
            [['id_equipa1', 'id_equipa2', 'golosEquipa1', 'golosEquipa2'], 'integer'],
            [['data'], 'safe'],
            [['local'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_equipa1' => 'Id Equipa1',
            'id_equipa2' => 'Id Equipa2',
            'golosEquipa1' => 'Golos Equipa1',
            'golosEquipa2' => 'Golos Equipa2',
            'data' => 'Data',
            'local' => 'Local',
        ];
    }

    /**
     * relação da tabela jogo com a tabela equipa
     */
    public function getEquipas()
    {
        return $this->hasMany(Equipa::classname(),['id'=>'id_equipa']);
    }
}
