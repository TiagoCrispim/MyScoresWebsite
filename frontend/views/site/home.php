<?php
use yii\helpers\html;

/* @var $this yii\web\View */

$this->title = 'Home';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12" style="text-align: center; margin-top: 20%">
                <h1>Criar Jogos:</h1>


                <p><?= Html::a('Criar Jogo', ['criar-jogo/index'], ['class' => 'btn btn-default', 'name' => 'criarjogo-button', 'style' => 'padding: 30px 100px;']) ?></p>



            </div>


        </div>

    </div>
</div>