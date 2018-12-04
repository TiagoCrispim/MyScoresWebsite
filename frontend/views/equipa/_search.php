<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EquipaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_jogo') ?>

    <?= $form->field($model, 'id_jogador1') ?>

    <?= $form->field($model, 'id_jogador2') ?>

    <?= $form->field($model, 'id_jogador3') ?>

    <?php // echo $form->field($model, 'id_jogador4') ?>

    <?php // echo $form->field($model, 'id_jogador5') ?>

    <?php // echo $form->field($model, 'id_jogador6') ?>

    <?php // echo $form->field($model, 'id_jogador7') ?>

    <?php // echo $form->field($model, 'id_jogador8') ?>

    <?php // echo $form->field($model, 'id_jogador9') ?>

    <?php // echo $form->field($model, 'id_jogador10') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
