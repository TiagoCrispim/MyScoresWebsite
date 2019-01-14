<?php

namespace frontend\controllers;
use common\models\Equipa;
use common\models\User;
use Yii;
use yii\web\Request;

class CriarJogoController extends \yii\web\Controller
{
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionCriarequipa()
    {


        $model = new Equipa();

        if (Yii::$app->request->isPost){
            $data = Yii::$app->request->bodyParams['Equipa'];

            for($i = 1;$i <= count($data);$i++){


                //return var_dump(Yii::$app->request->bodyParams['Equipa']);
                //return json_encode($data['id_jogador'.$i]);
                $username= $data['id_jogador'.$i];
                $user = User::findByUsername($username);
                switch ($i){
                    case 1:
                        if(  strlen ( $data['id_jogador'.$i] )!=0)
                        $model->id_jogador1 = $user->getId();
                        break;
                    case 2:
                        if(  strlen ( $data['id_jogador'.$i] )!=0)
                        $model->id_jogador2 = $user->getId();
                        break;
                    case 3:
                        if(  strlen ( $data['id_jogador'.$i] )!=0)
                        $model->id_jogador3 = $user->getId();
                        break;
                    case 4:
                        if(  strlen ( $data['id_jogador'.$i] )!=0)
                        $model->id_jogador4 = $user->getId();
                        break;
                    case 5:
                        if(  strlen ( $data['id_jogador'.$i] )!=0)
                        $model->id_jogador5 = $user->getId();
                        break;
                    case 6:
                        if(  strlen ( $data['id_jogador'.$i] )!=0)
                        $model->id_jogador6= $user->getId();
                        break;
                    case 7:
                        if(  strlen ( $data['id_jogador'.$i] )!=0)
                            $model->id_jogador7= $user->getId();
                        break;
                    case 8:
                        if(  strlen ( $data['id_jogador'.$i] )!=0)
                        $model->id_jogador8= $user->getId();
                        break;
                    case 9:
                        if(  strlen ( $data['id_jogador'.$i] )!=0)
                        $model->id_jogador9= $user->getId();
                        break;

                    case 10:
                        if(  strlen ( $data['id_jogador'.$i] )!=0)
                        $model->id_jogador10= $user->getId();
                        break;
                    default:
                        echo "error";
                }

            }


            $criador=Yii::$app->user->getId();
            $model->id_criador= $criador;
            var_dump($model->save());
            $model->save();
            //return json_encode($model->id_criador);



            // return var_dump(Yii::$app->request->bodyParams['Equipa']);


           /* foreach (Yii::$app->request->bodyParams['Equipa'] as ){

            }*/
            //return var_dump($model);


        }else {
            return $this->render('_equipaform', [
                'model' => $model]);
        }
    }


    public function actionCriarjogo(){

    }


}
