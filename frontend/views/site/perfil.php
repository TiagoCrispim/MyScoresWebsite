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
    <p><?= $model->username ?></p>
    <p>Nome:</p>
    <p><?= $model->nome ?></p>
    <p>Email:</p>
    <p><?= $model->email ?></p>
    <p>Data de Nascimento:</p>
    <p><?= $model->dataNascimento ?></p>
    <p>Nacionalidade:</p>
    <p><?= $model->nacionalidade ?></p>
    <p>Golos Marcados:</p>
    <p><?= $model->golosMarcados ?></p>
    <p>Jogos Jogados:</p>
    <p><?= $model->jogosJogados ?></p>

    <p><a class="btn btn-default" href="">Editar Perfil</a></p>

</div>