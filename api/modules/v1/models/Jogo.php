<?php

namespace api\modules\v1\models;

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
 * @property string $hora
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
     * @inheritdoc
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
            [['id_equipa1', 'id_equipa2', 'golosEquipa1', 'golosEquipa2', 'data', 'hora', 'local'], 'required'],
            [['id_equipa1', 'id_equipa2', 'golosEquipa1', 'golosEquipa2'], 'integer'],
            [['data', 'hora'], 'safe'],
            [['local'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    /*public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_equipa1' => 'Id Equipa1',
            'id_equipa2' => 'Id Equipa2',
            'golosEquipa1' => 'Golos Equipa1',
            'golosEquipa2' => 'Golos Equipa2',
            'data' => 'Data',
            'hora' => 'Hora',
            'local' => 'Local',
        ];
    }*/
}
