<?php

namespace common\models;

use Yii;
//use app\models\Equipa;

/**
 * This is the model class for table "jogo".
 *
 * @property int $id
 * @property int $id_equipa1
 * @property int $id_equipa2
 * @property \data $data
 * @property \time $hora
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
            [['id_equipa1', 'id_equipa2'], 'integer'],
             /*[['data'], 'date','format' => 'php:Y-m-d'],
            [['hora'], 'time','format' => 'php:H:i'],
            [['local'], 'string', 'max' => 255],*/
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
            'data' => 'Data (AAAA-MM-DD)',
            'hora' => 'Hora (HH:mm)',
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
