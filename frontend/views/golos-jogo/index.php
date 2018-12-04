<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GolosJogoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Golos Jogos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="golos-jogo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Golos Jogo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_jogador',
            'id_jogo',
            'golos_marcados',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
