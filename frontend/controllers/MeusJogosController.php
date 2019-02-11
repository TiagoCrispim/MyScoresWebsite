<?php
namespace frontend\controllers;


use common\models\Equipa;
use common\models\GolosJogo;
use common\models\User;
use common\models\Jogo;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class MeusJogosController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex(){
        $user_id=Yii::$app->user->getId();
        $usernames1=array(array());
        $usernames2=array(array());


        $golos_user= GolosJogo::findBySql('SELECT * FROM golos_jogo where id_user='.$user_id.' ORDER BY ID')->all();


        for($i=0;$i<count($golos_user);$i++) {
            //$jogos= Jogo::findBySql('SELECT * FROM jogos where ')
            $golos_equipa1[$i] = GolosJogo::findBySql('SELECT * FROM golos_jogo where id_equipa=' . $golos_user[$i]->id_equipa)->all();
            $nome_equipa1[$i]= Equipa::findBySql('SELECT nome FROM equipa where  id=' . $golos_user[$i]->id_equipa)->all();

            for ($j = 0; $j < count($golos_equipa1); $j++) {
                $id_jogo = $golos_equipa1[$i][0]['id_jogo'];
                $golos_equipa2[$i]= GolosJogo::findBySql('SELECT * FROM golos_jogo where id_jogo=' . $id_jogo . ' and id_equipa<>' . $golos_user[$i]->id_equipa)->all();
                $nome_equipa2[$i]= Equipa::findBySql('SELECT nome FROM equipa where  id=' . $golos_equipa2[$i][0]['id_equipa'])->all();
            }

            for($j=0;$j<=4;$j++){
                $usernames1[$i][$j] = User::findOne($golos_equipa1[$i][$j]['id_user'])->username;
                $usernames2[$i][$j] = User::findOne($golos_equipa2[$i][$j]['id_user'])->username;
            }



        }






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