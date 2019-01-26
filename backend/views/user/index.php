<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php \yii\widgets\Pjax::begin();?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'username',
            'nome',
            'email:email',



            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{Block}',
                'buttons'=>[
                    'Block' =>function($url,$user){
                        if(Yii::$app->authManager->getRolesByUser($user->id)=='blocked'){
                            return Html::a('Unblock',['block','id'=>$user->id],['class'=>'btn btn-primary']);

                        }else{
                            return Html::a('Block',['block','id'=>$user->id],['class'=>'btn btn-primary']);


                        }

                    }

            ],
        ],

      ]



  ]);?>
    <?php \yii\widgets\Pjax::end();?>
</div>
