<?php
use yii\helpers\html;
/* @var $this yii\web\View */

$this->title = 'My Scores';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Área de Administradores</h1>

        <p class="lead">Fully Acess</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4" style="text-align: center">
                <h2>Gerir Utilizadores</h2>

                <p>Visualizar o perfil do utilizador pretendido.</p>
                <p>Bloquear/Desbloquear utilizadores.</p>

                <p><?= Html::a('Gerir Utilizadores', ['user/index'], ['class' => 'btn btn-default']) ?></p>
            </div>
            <div class="col-lg-4" style="text-align: center">
                <h2>Caixa de Sugestões</h2>

                <p>Visualizar sugestões/críticas enviadas pelos utilizadores.</p>

                <p><?= Html::a('Visualizar Sugestões', ['sugestao/index'], ['class' => 'btn btn-default']) ?></p>
            </div>
            <div class="col-lg-4" style="text-align: center">
                <h2>Criar Adminstradores</h2>

                <p>Criar utilizadores que podem realizar operaçóes no backend</p>

                <p><?= Html::a('Criar Admins', ['criar-admins/index'], ['class' => 'btn btn-default']) ?></p>
            </div>
        </div>

    </div>
</div>
