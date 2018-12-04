<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GolosJogo */

$this->title = 'Create Golos Jogo';
$this->params['breadcrumbs'][] = ['label' => 'Golos Jogos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="golos-jogo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
