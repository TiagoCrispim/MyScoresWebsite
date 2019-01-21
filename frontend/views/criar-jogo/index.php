<?php
/**
 * Created by PhpStorm.
 * User: rodas
* Date: 09/01/2019
* Time: 16:23
*/
use yii\bootstrap\Modal;
use yii\web\view;
use yii\helpers\Url;
use yii\helpers\html;
use frontend\assets\AppAsset;


/* @var $this yii\web\View */

$this->title = 'My Scores';

?>

<div class="criar-jogo">

    <?= Html::button('Criar a primeira equipa', ['value'=>Yii::$app->urlManager->createUrl('/criar-jogo/criarequipa'),'class'=>'btn btn-primary btn-lg','id'=>'btnequipa1'])?>
    <?= Html::button('Criar a segunda equipa', ['value'=>Yii::$app->urlManager->createUrl('/criar-jogo/criarequipa'),'class'=>'btn btn-primary btn-lg','id'=>'btnequipa2'])?>
    <?= Html::button('Criar a finalizar jogo', ['value'=>Yii::$app->urlManager->createUrl('/criar-jogo/criarjogo'),'class'=>'btn btn-primary btn-lg','id'=>'btnfinalizar'])?>


    <?php
        Modal::begin([
            'header'=>'<h4>Criar Jogo</h4>',
            'id'=>'modal',
            'size'=>'modal-lg',
        ]);

        echo "<div='modalContent'></div>";
        Modal::end();


    ?>

</div>

