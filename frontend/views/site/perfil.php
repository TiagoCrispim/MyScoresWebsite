<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Perfil';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h3><?= Html::encode($this->title) ?></h3>

    <p>Os seus dados:</p>

    <p>Username:</p>
    <p><?= $user->username ?></p>
    <p>Nome:</p>
    <p><?= $user->nome ?></p>
    <p>Email:</p>
    <p><?= $user->email ?></p>
    <p>Data de Nascimento:</p>
    <p><?= $user->dataNascimento ?></p>
    <p>Nacionalidade:</p>
    <p><?= $user->nacionalidade ?></p>
    <p>Golos Marcados:</p>
    <!-- Query SQL que calcula os golos marcados pelo utilizador -->
    <p><?php
        $golosMarcados = 0;
        echo $golosMarcados; ?></p>
    <p>Jogos Jogados:</p>
    <!-- Query SQL para ir calcular os golos marcados pelo utilizador -->
    <p><?php
        $jogosJogados = 0;
        echo $jogosJogados; ?></p>

    <p><?= Html::a('Alterar Palavra Passe', ['site/editarpassword'], ['class' => 'btn btn-default']) ?><?= Html::a('Editar Perfil', ['site/editarperfil'], ['class' => 'btn btn-default']) ?></p>

</div>