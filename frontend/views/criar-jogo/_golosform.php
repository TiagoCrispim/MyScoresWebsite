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
/* @var $model app\models\Jogo */
/* @var $form yii\widgets\ActiveForm */

$form = ActiveForm::begin();

echo Html::tag('h1',Html::encode($nome1), ['class'=>'username']);
foreach ($modelgolos1 as $index => $models) {
    echo Html::tag('p',Html::encode($players1[$index]), ['class'=>'username']);
    echo $form->field($models, "[$index]golosMarcados")->textInput();

}
echo Html::tag('h1',Html::encode($nome2), ['class'=>'username']);

foreach ($modelgolos2 as $index => $models) {
    echo Html::tag('p',Html::encode($players2[$index]), ['class'=>'username']);
    echo $form->field($models, "[$index]golosMarcados")->textInput();

}
echo $form->field($model, 'data')->textInput();
echo $form->field($model, 'hora')->textInput();
echo $form->field($model, 'local')->textInput(['maxlength' => true]);

echo Html::submitButton('Save', ['class' => 'btn btn-success']);



ActiveForm::end();
?>



<div class="golos-jogo-form">







</div>