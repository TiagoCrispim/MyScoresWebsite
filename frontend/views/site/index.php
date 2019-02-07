<?php
use yii\helpers\html;

/* @var $this yii\web\View */

$this->title = 'My Scores';
?>
<div class="site-index">
    
    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <h1>MY SCORES</h1>

                <h3>Em que consiste o Website?</h3>

                <p>O Website tem como principal objetivo incentivar a prática de futsal entre grupos de amigos.
                    No website é possivel realizar todos os registos relacionados com cada jogo jogado como a data, hora e
                    local onde foi realizado o jogo. É ainda possivel registar os membros de cada equipa assim como quem
                    marcou os golos de cada uma das equipas.</p>
            </div>
            <div class="col-lg-4">
                <h3>Registe-se</h3>

                <p>Aqui poderá registar e gerir todos os seus jogos amigaveis! Basta entrar!</p>

                <p><?= Html::a('Entrar', ['site/login'], ['class' => 'btn btn-default']) ?></p>
                <p><?= Html::a('Registar', ['site/signup'], ['class' => 'btn btn-default']) ?></p>
            </div>

            <div class="col-lg-4">
                <h3>App Móvel</h3>

                <p>Descarregue a nossa aplicação e usufrua de uma aplicação que pode andar consigo para qualquer lugar!</p>


                <p><?= Html::a('Descarregar', ['site/login'], ['class' => 'btn btn-default']) ?></p>
            </div>
        </div>
    </div>
</div>
