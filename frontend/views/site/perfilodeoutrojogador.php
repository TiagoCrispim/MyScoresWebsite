<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Perfil do Jogador';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h3><?= Html::encode($this->title) ?></h3>

    <p>Perfil do Jogador:</p>

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
    <p><?= $golosM ?></p>
    <p>Jogos Jogados:</p>
    <p><?= $jogosJogados ?></p>

</div>