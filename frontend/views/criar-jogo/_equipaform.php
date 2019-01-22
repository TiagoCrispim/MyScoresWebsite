<?php
/**
 * Created by PhpStorm.
 * User: rodas
 * Date: 09/01/2019
 * Time: 17:12
 */


use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Equipa */
/* @var $model app\models\EquipaUser */

/* @var $form yii\widgets\ActiveForm */
    $form = ActiveForm::begin();
/*if(Yii::app()->user->getFlashes() as $key => $message) {
    echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}*/

    echo $form->field($model, 'nome')->textInput();

    foreach ($modeljogadores as $index => $models) {
    echo $form->field($models, "[$index]id_user")->textInput();
    }
    echo Html::submitButton('Save', ['class' => 'btn btn-success']);

    ActiveForm::end();
?>

<div class="equipa-form">





    <div class="form-group"></div>



</div>