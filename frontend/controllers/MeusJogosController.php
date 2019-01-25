<?php
namespace frontend\controllers;


use common\models\GolosJogo;
use common\models\User;
use common\models\Jogo;
use Yii;

class MeusJogosController extends \yii\web\Controller
{
    public function actionIndex(){
        $user_id=Yii::$app->user->getId();

        $golos_user= GolosJogo::findBySql('SELECT * FROM golos_jogo where id_user='.$user_id.' ORDER BY ID')->one();
        $golos_equipa= GolosJogo::findBySql('SELECT * FROM golos_jogo where id_equipa='.$golos_user->id_equipa)->all();
        return var_dump($golos_user);








    }


}