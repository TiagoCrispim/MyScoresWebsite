<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $nome
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $dataNascimento
 * @property string $nacionalidade
 * @property int $golosMarcados
 * @property int $jogosJogados
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
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
            [['username', 'nome', 'auth_key', 'password_hash', 'email', 'dataNascimento', 'nacionalidade', 'created_at', 'updated_at'], 'required'],
            [['dataNascimento'], 'safe'],
            [['golosMarcados', 'jogosJogados', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['nome'], 'string', 'max' => 100],
            [['auth_key'], 'string', 'max' => 32],
            [['nacionalidade'], 'string', 'max' => 20],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'nome' => 'Nome',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'dataNascimento' => 'Data Nascimento',
            'nacionalidade' => 'Nacionalidade',
            'golosMarcados' => 'Golos Marcados',
            'jogosJogados' => 'Jogos Jogados',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
