<?php

namespace api\modules\v1\controllers;

use api\modules\v1\models\Equipa;

use common\models\EquipaUser;
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
                $user_equipa->id_equipa=$equipa_atual->id;
                $user_equipa->save(false);

            }



        }
    }

    public function actionCriarjogo(){

    }

}
