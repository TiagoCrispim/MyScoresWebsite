<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Perfil';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Os seus dados:</p>

    <p>Username:</p>
    <p><?= Yii::$app->user->identity->username ?></p>
    <p>Nome:</p>
    <p><?= Yii::$app->user->identity->nome ?></p>
    <p>Email:</p>
    <p><?= Yii::$app->user->identity->email ?></p>
    <p>Data de Nascimento:</p>
    <p><?= Yii::$app->user->identity->dataNascimento ?></p>
    <p>Nacionalidade:</p>
    <p><?= Yii::$app->user->identity->nacionalidade ?></p>
    <p>Golos Marcados:</p>
    <p><?= Yii::$app->user->identity->golosMarcados ?></p>
    <p>Jogos Jogados:</p>
    <p><?= Yii::$app->user->identity->jogosJogados ?></p>

    <p><a class="btn btn-default" href="">Alterar Palavra-Passe</a><a class="btn btn-default" url="">Editar Perfil</a></p>

</div>