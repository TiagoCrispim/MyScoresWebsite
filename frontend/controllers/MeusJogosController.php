<?php
namespace frontend\controllers;


use common\models\Equipa;
use common\models\GolosJogo;
use common\models\User;
use common\models\Jogo;
use Yii;

class MeusJogosController extends \yii\web\Controller
{
    public function actionIndex(){
        $user_id=Yii::$app->user->getId();
        $usernames1=array(array());
        $usernames2=array(array());


        $golos_user= GolosJogo::findBySql('SELECT * FROM golos_jogo where id_user='.$user_id.' ORDER BY ID')->all();

        for($i=0;$i<count($golos_user);$i++) {
            $golos_equipa1[$i] = GolosJogo::findBySql('SELECT * FROM golos_jogo where id_equipa=' . $golos_user[$i]->id_equipa)->all();
            $nome_equipa1[$i]= Equipa::findBySql('SELECT nome FROM equipa where  id=' . $golos_user[$i]->id_equipa)->all();

            for ($j = 0; $j < count($golos_equipa1); $j++) {
                $id_jogo = $golos_equipa1[$i][0]['id_jogo'];
                $golos_equipa2[$i] = GolosJogo::findBySql('SELECT * FROM golos_jogo where id_jogo=' . $id_jogo . ' and id_equipa<>' . $golos_user[$i]->id_equipa)->all();
                $nome_equipa2[$i]= Equipa::findBySql('SELECT nome FROM equipa where  id=' . $golos_equipa2[$i][0]['id_equipa'])->all();
            }

            for($j=0;$j<=4;$j++){
                $usernames1[$i][$j] = User::findOne($golos_equipa1[$i][$j]['id_user'])->username;
                $usernames2[$i][$j] = User::findOne($golos_equipa2[$i][$j]['id_user'])->username;
            }

        }



/*        $usernames3[0] = array();
        $usernames3[1] = array();

        for($i=0;$i<count($usernames1);$i++) {
            $usernames3[0][$i] = $usernames1[$i];
        }

        for($i=0;$i<count($usernames2);$i++) {
            $usernames3[1][$i] = $usernames2[$i];
        }*/

       /*     for($k=0;$k<=count($golos_user);$k++){
                return var_dump($golos_equipa1[$k]);
            }*/
        /*}*/
        return $this->render('index', [

                'nome_equipa1'=>$nome_equipa1,
                'nome_equipa2'=>$nome_equipa2,
                'golos_equipa1'=>$golos_equipa1,
                'golos_equipa2'=>$golos_equipa2,
                'usernames1'=>$usernames1,
                'usernames2'=>$usernames2



            ]
        );



    }


}