<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Equipa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jogo')->textInput() ?>

    <?= $form->field($model, 'id_jogador1')->textInput() ?>

    <?= $form->field($model, 'id_jogador2')->textInput() ?>

    <?= $form->field($model, 'id_jogador3')->textInput() ?>

    <?= $form->field($model, 'id_jogador4')->textInput() ?>

    <?= $form->field($model, 'id_jogador5')->textInput() ?>

    <?= $form->field($model, 'id_jogador6')->textInput() ?>

    <?= $form->field($model, 'id_jogador7')->textInput() ?>

    <?= $form->field($model, 'id_jogador8')->textInput() ?>

    <?= $form->field($model, 'id_jogador9')->textInput() ?>

    <?= $form->field($model, 'id_jogador10')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
