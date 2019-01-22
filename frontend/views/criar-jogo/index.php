<?php
/**
 * Created by PhpStorm.
 * User: rodas
* Date: 09/01/2019
* Time: 16:23
*/

use yii\helpers\Url;
use yii\helpers\html;
use frontend\assets\AppAsset;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */

$this->title = 'My Scores';
?>

<div class="criar-jogo">

<!--
    <?= Html::button('Criar a primeira equipa', ['value'=>Url::to(['/criar-jogo/criarequipa']),'class'=>'btn btn-primary btn-lg','id'=>'btnequipa1'])?>
    <?= Html::button('Criar a segunda equipa', ['value'=>Url::to('criar-jogo/criarequipa'),'class'=>'btn btn-primary btn-lg','id'=>'btnequipa2'])?>
    <?= Html::button('Criar a finalizar jogo', ['value'=>Url::to('criar-jogo/criarjogo'),'class'=>'btn btn-primary btn-lg','id'=>'btnfinalizar'])?>
-->

    <?= Html::a('Criar a primeira equipa', ['criar-jogo/criarequipa'], ['class' => 'btn btn-default'],['id'=>'btnequipa1'])?>
    <?= Html::a('Criar a segunda equipa', ['criar-jogo/criarequipa'], ['class' => 'btn btn-default'],['id'=>'btnequipa2'])?>
    <?= Html::a('Fininalizar o jogo', ['criar-jogo/criarjogo'], ['class' => 'btn btn-default'],['id'=>'btnfinalizar'])?>



    <?php
        Modal::begin([
            'header'=>'<h4>Criar Jogo</h4>',
            'id'=>'modal',
            'size'=>'modal-lg',
        ]);


        echo "<div id='modalContent'></div>";

        Modal::end();


    ?>

</div>

