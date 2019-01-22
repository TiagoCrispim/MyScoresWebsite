<?php
/**
 * Created by PhpStorm.
 * User: rodas
* Date: 09/01/2019
* Time: 16:23
*/
use yii\bootstrap\Modal;
<<<<<<< HEAD
use yii\web\View;
=======
>>>>>>> parent of d2a2e5e... hgvjhv
use yii\helpers\Url;
use yii\helpers\html;

/* @var $this yii\web\View */

$this->title = 'My Scores';
<<<<<<< HEAD




=======
>>>>>>> parent of d2a2e5e... hgvjhv
?>

<div class="criar-jogo">

<<<<<<< HEAD
    <!--
   <?/*= Html::button('Criar a primeira equipa', ['value'=>Yii::$app->urlManager->createUrl('/criar-jogo/criarequipa'),'class'=>'btn btn-primary btn-lg','id'=>'btnequipa1'])*/?>
    <?/*= Html::button('Criar a segunda equipa', ['value'=>Yii::$app->urlManager->createUrl('/criar-jogo/criarequipa'),'class'=>'btn btn-primary btn-lg','id'=>'btnequipa2'])*/?>
    <?/*= Html::button('Criar a finalizar jogo', ['value'=>Yii::$app->urlManager->createUrl('/criar-jogo/criarjogo'),'class'=>'btn btn-primary btn-lg','id'=>'btnfinalizar'])*/?>
-->
    <?= Html::a('Criar a primeira equipa', ['criar-jogo/criarequipa'], ['class' => 'btn btn-default'])?>
    <?= Html::a('Criar a segunda equipa', ['criar-jogo/criarequipa'], ['class' => 'btn btn-default'])?>
    <?= Html::a('Fininalizar o jogo', ['criar-jogo/criarjogo'], ['class' => 'btn btn-default'])?>

=======
    <?= Html::button('Criar a primeira equipa', ['value'=>Url::to('index.php?r=criar-jogo%2Fcriarequipa'),'class'=>'btn btn-primary btn-lg','id'=>'btnequipa1'])?>
    <?= Html::button('Criar a segunda equipa', ['value'=>Url::to('index.php?r=criar-jogo%2Fcriarequipa'),'class'=>'btn btn-primary btn-lg','id'=>'btnequipa2'])?>
    <?= Html::button('Criar a finalizar jogo', ['value'=>Url::to('index.php?r=criar-jogo%2Fcriarjogo'),'class'=>'btn btn-primary btn-lg','id'=>'btnfinalizar'])?>
>>>>>>> parent of d2a2e5e... hgvjhv


    <?php
        Modal::begin([
                'header'=>'<h4>Criar Jogo</h4>',
                'id'=>'modal',
                'size'=>'modal-lg',
        ]);

     echo Html::tag('div', ['id' => ['modalContent']]);
        Modal::end();


    ?>
</div>

