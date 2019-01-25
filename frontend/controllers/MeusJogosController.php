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
        $usernames1=array();
        $usernames2=array();

        $golos_user= GolosJogo::findBySql('SELECT * FROM golos_jogo where id_user='.$user_id.' ORDER BY ID')->all();
/*
        for($i=0;$i<count($golos_user);$i++) {
            $golos_equipa1[$i] = GolosJogo::findBySql('SELECT * FROM golos_jogo where id_equipa=' . $golos_user[$i]->id_equipa)->all();

            for($j=0;$j<count($golos_equipa1);$j++) {
                $id_jogo=$golos_equipa1[$j]->id_jogo;
                $usernames1[$i][$j]=User::findOne($golos_equipa1[$j]->id_user)->username;
                $golos_equipa2=GolosJogo::findBySql('SELECT * FROM golos_jogo where id_jogo='.$id_jogo.' and id_equipa<>' . $golos_user[$i]->id_equipa)->all();
                $usernames2[$i][$j]=User::findOne($golos_equipa2[$j]->id_user)->username;
            }*/


       /*     for($k=0;$k<=count($golos_user);$k++){
                return var_dump($golos_equipa1[$k]);
            }*/
        /*}*/
        return var_dump($golos_user);









    }


}