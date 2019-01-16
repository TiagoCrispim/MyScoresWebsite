<?php

namespace frontend\controllers;
use common\models\Equipa;
use common\models\GolosJogo;
use common\models\Jogo;
use common\models\User;
use yii\db\Query;
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
            $model->nome = 'equipa1';
            //$model->id = 1;
            $model->load($model);
            //var_dump($model->save());
            $model->save();






                             //$equipa2 = Equipa::findBySql($equipa1)->one();

            //return var_dump($equipa1);
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

        $model= new Jogo();

        $id_criador=Yii::$app->user->getId();
        $equipas=Equipa::findBySql('SELECT * FROM equipa WHERE id_criador='.$id_criador.' ORDER BY ID DESC LIMIT 2')->all();
        $equipa1=$equipas[0];
        $equipa2=$equipas[1];
        $nome1=$equipa1->nome;
        $nome2=$equipa2->nome;



        if (Yii::$app->request->isPost){

        }else{




            return $this->render('_jogoform', [

                'equipa1'=> $nome1,
                'equipa2'=> $nome2,
                'model' => $model
                ]
            );

        }


    }



    public  function actionTeste(){

        $model= new GolosJogo();
        $model2= new GolosJogo();
        $model3=new GolosJogo();

        if (Yii::$app->request->isPost){

            var_dump(Yii::$app->request->bodyParams);


        }else {
            return $this->render('_golosjogoform', [

                'model' => $model,


            ]);
        }

    }
}
