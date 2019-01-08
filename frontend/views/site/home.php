<?php
use yii\helpers\html;

/* @var $this yii\web\View */

$this->title = 'Home';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <h2>Criar Jogo</h2>


                <p><?= Html::a('Criar Jogo', ['jogo/index'], ['class' => 'btn btn-default']) ?></p>
            </div>
            <div class="col-lg-6">
                <h2>Entre</h2>

                <p>Texto aleatorio</p>

            </div>
        </div>

    </div>
</div>