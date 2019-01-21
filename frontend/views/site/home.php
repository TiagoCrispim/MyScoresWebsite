<?php
use yii\helpers\html;

/* @var $this yii\web\View */

$this->title = 'Home';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-9">
                <h3>Registo de Jogos:</h3>

                <p>Ainda não existem registos</p>

                <p><?= Html::a('Criar Jogo', ['criar-jogo/index'], ['class' => 'btn btn-default']) ?></p>

            </div>
            <div class="col-lg-3">
                <h3>Páginas</h3>
              
                <p><?= Html::a('Criar Jogo', ['jogo/index'], ['class' => 'btn btn-default']) ?></p>
            </div>

        </div>

    </div>
</div>