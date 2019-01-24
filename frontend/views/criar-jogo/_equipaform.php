<?php
/**
 * Created by PhpStorm.
 * User: rodas
 * Date: 09/01/2019
 * Time: 17:12
 */

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Equipa */
/* @var $model app\models\EquipaUser */

/* @var $form yii\widgets\ActiveForm */
?>
    <?php $form = ActiveForm::begin(); ?>

<div>
    <?= $form->field($model, 'nome')->textInput(); ?>
    <?= Select2::widget([
            'id'=> 'select',
            'name' => 'state_10',
            'data' => $users,
            'maintainOrder'=>false,
            'options' => ['placeholder' => 'Escolha um jogador'],
            'pluginOptions' => [
                'allowClear' => true
            ],
    ]);?>
    <?= Html::button('adicionar',['value'=>"cona",'onclick' => '(function ( $event )})();', 'class'=>'btn btn-primary btn-lg','id'=>'btnadicionar']); ?>

    </div>
    <br>

    <?php foreach ($modeljogadores as $index => $models) {?>

    <?= $form->field($models, "[$index]id_user")->textInput(['id' => $index,'value'=>'','readonly'=>true]); ?>

    <?php } ?>

    <?= Html::submitButton('Save', ['class' => 'btn btn-success']); ?>

    <?php ActiveForm::end(); ?>

<div class="equipa-form">





    <div class="form-group"></div>



</div>