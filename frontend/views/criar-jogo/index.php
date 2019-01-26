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

<div class="criar-jogo" style="text-align: center; margin-top: 20%">


    <?= Html::a('Criar a primeira equipa', ['criar-jogo/criarequipa'],[ 'class' => 'btn btn-default','id'=>'btnequipa1', 'style' => 'padding: 40px 120px;'])?>
    <?= Html::a('Criar a segunda equipa', ['criar-jogo/criarequipa'],[ 'class' => 'btn btn-default','id'=>'btnequipa2', 'style' => 'padding: 40px 120px;'])?>
    <?= Html::a('Finalizar o jogo', ['criar-jogo/criarjogo'], ['class' => 'btn btn-default','id'=>'btnfinalizar', 'style' => 'padding: 40px 120px;'])?>



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

