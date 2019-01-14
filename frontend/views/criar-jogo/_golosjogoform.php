<?php
/**
 * Created by PhpStorm.
 * User: rodas
 * Date: 09/01/2019
 * Time: 17:06
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GolosJogo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="golos-jogo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jogador')->textInput() ?>

    <?= $form->field($model, 'id_jogo')->textInput() ?>

    <?= $form->field($model, 'golos_marcados')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>