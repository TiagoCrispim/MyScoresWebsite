<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;


/* @var $this yii\web\View */

$this->title = 'Home';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12" style="text-align: center; margin-top: 20%">
                <?php $form = ActiveForm::begin(); ?>


                <?= $form->field($model, 'username')->widget(Select2::classname(), [
                    'id'=> 'select',
                    'name' => 'state_10',
                    'data' => $users,
                    'maintainOrder'=>true,
                    'options' => ['placeholder' => 'Username'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],

                ]);?>

                <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-success']); ?>

                <?php ActiveForm::end(); ?>

                <h1>Criar Jogos:</h1>



                <p><?= Html::a('Criar Jogo', ['criar-jogo/index'], ['class' => 'btn btn-default', 'name' => 'criarjogo-button', 'style' => 'padding: 30px 100px;']) ?></p>



            </div>


        </div>

    </div>
</div>