<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\swiftmailer\Message;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $mensagem;
    public $id_user;



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['mensagem'], 'required', 'message' => 'Este campo não pode ser deixado em branco.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mensagem' => 'Mensagem:',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }
}
