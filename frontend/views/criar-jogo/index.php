<?php
/**
 * Created by PhpStorm.
 * User: rodas
* Date: 09/01/2019
* Time: 16:23
*/
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\html;

/* @var $this yii\web\View */

$this->title = 'My Scores';
?>

<div class="criar-jogo">

    <?= Html::button('Criar a primeira equipa', ['value'=>Url::to('index.php?r=criar-jogo%2Fcriarequipa'),'class'=>'btn btn-primary btn-lg','id'=>'btnequipa1'])?>
    <?= Html::button('Criar a segunda equipa', ['value'=>Url::to('index.php?r=criar-jogo%2Fcriarequipa'),'class'=>'btn btn-primary btn-lg','id'=>'btnequipa2'])?>
    <?= Html::button('Criar a finalizar jogo', ['value'=>Url::to('index.php?r=criar-jogo%2Fcriarjogo'),'class'=>'btn btn-primary btn-lg','id'=>'btnfinalizar'])?>


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

