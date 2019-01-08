<?php
use yii\helpers\html;

/* @var $this yii\web\View */

$this->title = 'My Scores';
?>
<div class="site-index">
    
    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-6">
                <h2>Entre</h2>

                <p>Gere todos os teus jogos amigaveis! Basta entrar!</p>


                <p><?= Html::a('Entrar', ['site/login'], ['class' => 'btn btn-default']) ?></p>
                <p><?= Html::a('Registar', ['site/signup'], ['class' => 'btn btn-default']) ?></p>
            </div>
        </div>

    </div>
</div>
