<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GolosJogo */

$this->title = 'Update Golos Jogo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Golos Jogos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="golos-jogo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
