<?php

namespace api\modules\v1\controllers;

use api\modules\v1\models\Equipa;
use common\models\EquipaUser;
use common\models\GolosJogo;
use common\models\Jogo;
use common\models\User;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use Yii;

class EquipaController extends ActiveController
{

    public $modelClass = 'common\models\Equipa';

    /*public function actionIndex()
    {
        return $this->render('index');
    }*/


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className()
        ];
        return $behaviors;
    }

    public function actionCriarequipa(){
        $equipa = new \common\models\Equipa();
        $equipa->id_criador=Yii::$app->request->post('id_criador');
        $equipa->nome = Yii::$app->request->post('name');
        $equipa->save();

        for($i=1;$i<10;$i++){
        	
            if(Yii::$app->request->post('username'.$i.'')  ){
                $user_equipa= new EquipaUser();
                $user= User::findByUsername(Yii::$app->request->post('username'.$i));
                $user_equipa->id_user=$user->id;
                $equipa_atual=Equipa::findBySql('SELECT * FROM equipa WHERE id_criador=' . $equipa->id_criador . ' ORDER BY ID DESC LIMIT 1')->all();
                $user_equipa->id_equipa=$equipa_atual[0]->id;
                $user_equipa->save(false);

            }



        }
    }

    public function actionCriarjogo(){

        $id_criador=Yii::$app->request->post('id_criador');
        $equipas=Equipa::findBySql('SELECT * FROM equipa WHERE id_criador='.$id_criador.' ORDER BY ID DESC LIMIT 2')->all();

        $equipa1=$equipas[0];
        $id_equipa1=$equipa1->id;

        $equipa2=$equipas[1];
        $id_equipa2=$equipa2->id;

        $jogo= new Jogo();
        $jogo->local=Yii::$app->request->post('local');
        $jogo->hora=Yii::$app->request->post('hora');
        $jogo->data=Yii::$app->request->post('data');
        $jogo->id_equipa1=$id_equipa1;
        $jogo->id_equipa2=$id_equipa2;
        $jogo->save(false);

        $players_1=EquipaUser::find()
            ->select(['id_user'])
            ->where (['id_equipa'=>$id_equipa1])
            ->all();

        $players_2=EquipaUser::find()
            ->select(['id_user'])
            ->where (['id_equipa'=>$id_equipa2])
            ->all();

        $jogo = Jogo:: findBySql('SELECT id FROM jogo ORDER BY ID DESC LIMIT 1')->one();

        for($i=0;$i<10;$i++){
            if(Yii::$app->request->post('jogagorA'.$i.'') ){
                $golos_jogo=new GolosJogo();
                $golos_jogo->id_equipa=$id_equipa1;
                $golos_jogo->id_jogo=$jogo->id;
                $golos_jogo->id_user=$players_1[$i]['id_user'];
                $golos_jogo->golosMarcados=Yii::$app->request->post('jogagorA'.$i);
                $golos_jogo->save();

            }
        }

        for($i=0;$i<10;$i++){
            if(Yii::$app->request->post('jogagorB'.$i.'') ){
                $golos_jogo=new GolosJogo();
                $golos_jogo->id_equipa=$id_equipa2;
                $golos_jogo->id_jogo=$jogo->id;
                $golos_jogo->id_user=$players_2[$i]['id_user'];
                $golos_jogo->golosMarcados=Yii::$app->request->post('jogagorB'.$i);
                $golos_jogo->save();


            }
        }



    }

}
