<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JogoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jogo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_equipa1') ?>

    <?= $form->field($model, 'id_equipa2') ?>

    <?= $form->field($model, 'golosEquipa1') ?>

    <?= $form->field($model, 'golosEquipa2') ?>

    <?php // echo $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'local') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
