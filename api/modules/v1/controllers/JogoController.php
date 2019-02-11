<?php

namespace api\modules\v1\controllers;

use common\models\Equipa;
use common\models\GolosJogo;
use common\models\User;
use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

/**
 * JogoController implements the CRUD actions for Jogo model.
 */
class JogoController extends ActiveController
{

    public $modelClass = 'api\modules\v1\models\Jogo';

    /**
     * @return array|void
     */

    /*public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className()
        ];
        return $behaviors;
    }*/

    public function actionMeusjogos(){

        $user=User::findByUsername(Yii::$app->request->post('username'));
        $user_id=$user->id;
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

        return [
            'nome_equipa1'=>$nome_equipa1,
            'nome_equipa2'=>$nome_equipa2,
            'golos_equipa1'=>$golos_equipa1,
            'golos_equipa2'=>$golos_equipa2,
            'usernames1'=>$usernames1,
            'usernames2'=>$usernames2

        ];


    }

}
