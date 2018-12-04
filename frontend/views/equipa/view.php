<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equipa */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Equipas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_jogo',
            'id_jogador1',
            'id_jogador2',
            'id_jogador3',
            'id_jogador4',
            'id_jogador5',
            'id_jogador6',
            'id_jogador7',
            'id_jogador8',
            'id_jogador9',
            'id_jogador10',
        ],
    ]) ?>

</div>
