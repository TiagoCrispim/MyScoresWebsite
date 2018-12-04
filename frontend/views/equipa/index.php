<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquipaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Equipa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_jogo',
            'id_jogador1',
            'id_jogador2',
            'id_jogador3',
            //'id_jogador4',
            //'id_jogador5',
            //'id_jogador6',
            //'id_jogador7',
            //'id_jogador8',
            //'id_jogador9',
            //'id_jogador10',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
