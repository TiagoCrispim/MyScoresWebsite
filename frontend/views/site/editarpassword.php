<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Editar Palavra Passe';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Alteração de Palavra Passe:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-editpassword']); ?>

            <?= $form->field($model, 'atualPassword')->passwordInput() ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'confirmacaoPassword')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Guardar Alterações', ['class' => 'btn btn-primary', 'name' => 'guardaralteracoes-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <p><?= Html::a('Cancelar', ['site/perfil'], ['class' => 'btn btn-default']) ?></p>

</div>