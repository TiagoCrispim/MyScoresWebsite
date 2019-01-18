<?php

namespace frontend\controllers;
use common\models\Equipa;
use common\models\EquipaUser;
use common\models\GolosJogo;
use common\models\Jogo;
use common\models\User;
use yii\base\Model;
use yii\db\Query;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Request;


class CriarJogoController extends \yii\web\Controller
{
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionCriarequipa()
    {


        $model = new Equipa();
        $modeljogadores = [new EquipaUser(), new EquipaUser(), new EquipaUser(),new EquipaUser(),new EquipaUser(),new EquipaUser(),new EquipaUser(),new EquipaUser(),new EquipaUser(),new EquipaUser()];


        if (Yii::$app->request->isPost && Model::loadMultiple($modeljogadores, Yii::$app->request->post())){
            $datajogadores=Yii::$app->request->bodyParams['EquipaUser'];

            foreach ($datajogadores as $index=>$jogadores){
                if (empty($jogadores['id_user'])) {
                    unset($datajogadores[$index]);
                }

            }

               if(count($datajogadores)>=5) {

                    $data = Yii::$app->request->bodyParams['Equipa'];
                    $model->nome = $data['nome'];
                    $criador = Yii::$app->user->getId();
                    $model->id_criador = $criador;
                    $model->load($model);
                    $model->save();


                    foreach ($datajogadores as $index => $jogadores) {



                    }
                }else{
                    $teste='esta merda nao esta a meter os erros bem';
                    return var_dump($teste);
               }


/*            for($i = 1;$i < count($data);$i++){*/


                //return var_dump(Yii::$app->request->bodyParams['Equipa']);
                //return json_encode($data['id_jogador'.$i]);
/*                $username= $data['id_jogador'.$i];
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

            }*/










        }else {
            return $this->render('_equipaform', [
                'model' => $model,
                'modeljogadores'=>$modeljogadores]);
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

        $data1 = ArrayHelper::toArray($equipa1, [
            'app\models\Post' => [
                'id',
                'nome',
                'id_criador',
                'id_jogador1',
                'id_jogador2',
                'id_jogador3',
                'id_jogador4',
                'id_jogador5',
                'id_jogador6',
                'id_jogador7',
                'id_jogador8',
                'id_jogador9',
                'id_jogador10'
                // the key name in array result => property name

                // the key name in array result => anonymous function

            ],
        ]);

        $data2 =ArrayHelper::toArray($equipa2, [
            'app\models\Post' => [
                'id',
                'nome',
                'id_criador',
                'id_jogador1',
                'id_jogador2',
                'id_jogador3',
                'id_jogador4',
                'id_jogador5',
                'id_jogador6',
                'id_jogador7',
                'id_jogador8',
                'id_jogador9',
                'id_jogador10'
                // the key name in array result => property name

                // the key name in array result => anonymous function

            ],
        ]);

        $i=0;
        foreach ($data1 as $value) {
            if ($value !=null) {
                $i++;
            }
        }
        $numerojogadores = $i-3;
        switch ($numerojogadores){
            case 1:
                $modelgolos1= [new GolosJogo()];
                break;
            case 2:
                $modelgolos1= [new GolosJogo(), new GolosJogo()];
                break;
            case 3:
                $modelgolos1= [new GolosJogo(), new GolosJogo(), new GolosJogo()];
                break;
            case 4:
                $modelgolos1= [new GolosJogo(), new GolosJogo(), new GolosJogo(),new GolosJogo()];
                break;
            case 5:
                $modelgolos1= [new GolosJogo(), new GolosJogo(), new GolosJogo(),new GolosJogo(),new GolosJogo()];
                break;
            case 6:
                $modelgolos1= [new GolosJogo(), new GolosJogo(), new GolosJogo(),new GolosJogo(), new GolosJogo(),new GolosJogo()];
                break;
            case 7:
                $modelgolos1= [new GolosJogo(), new GolosJogo(), new GolosJogo(),new GolosJogo(), new GolosJogo(),new GolosJogo(),new GolosJogo()];
                break;
            case 8:
                $modelgolos1= [new GolosJogo(), new GolosJogo(), new GolosJogo(),new GolosJogo(), new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo()];
                break;
            case 9:
                $modelgolos1= [new GolosJogo(), new GolosJogo(), new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo()];
                break;

            case 10:
                $modelgolos1= [new GolosJogo(), new GolosJogo(), new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo()];
                break;
            default:
                echo "error";
        }

        $i=0;
        foreach ($data2 as $value) {
            if ($value !=null) {
                $i++;
            }
        }
        $numerojogadores = $i-3;
        switch ($numerojogadores){
            case 1:
                $modelgolos2= [new GolosJogo()];
                break;
            case 2:
                $modelgolos2= [new GolosJogo(), new GolosJogo()];
                break;
            case 3:
                $modelgolos2= [new GolosJogo(), new GolosJogo(), new GolosJogo()];
                break;
            case 4:
                $modelgolos2= [new GolosJogo(), new GolosJogo(), new GolosJogo(),new GolosJogo()];
                break;
            case 5:
                $modelgolos2= [new GolosJogo(), new GolosJogo(), new GolosJogo(),new GolosJogo(),new GolosJogo()];
                break;
            case 6:
                $modelgolos2= [new GolosJogo(), new GolosJogo(), new GolosJogo(),new GolosJogo(), new GolosJogo(),new GolosJogo()];
                break;
            case 7:
                $modelgolos2= [new GolosJogo(), new GolosJogo(), new GolosJogo(),new GolosJogo(), new GolosJogo(),new GolosJogo(),new GolosJogo()];
                break;
            case 8:
                $modelgolos2= [new GolosJogo(), new GolosJogo(), new GolosJogo(),new GolosJogo(), new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo()];
                break;
            case 9:
                $modelgolos2= [new GolosJogo(), new GolosJogo(), new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo()];
                break;

            case 10:
                $modelgolos2= [new GolosJogo(), new GolosJogo(), new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo(),new GolosJogo()];
                break;
            default:
                echo "error";
        }

        $players1=array($data1['id_jogador1'],$data1['id_jogador2'],$data1['id_jogador3'],$data1['id_jogador4'],$data1['id_jogador5'],$data1['id_jogador6'],$data1['id_jogador7'],$data1['id_jogador8'],$data1['id_jogador9'],$data1['id_jogador10']);
        $players2=array($data2['id_jogador1'],$data2['id_jogador2'],$data2['id_jogador3'],$data2['id_jogador4'],$data2['id_jogador5'],$data2['id_jogador6'],$data2['id_jogador7'],$data2['id_jogador8'],$data2['id_jogador9'],$data2['id_jogador10']);

        for($i = 0;$i < 10;$i++){
            if($players1[$i] == null){
                unset($players1[$i]);
            }else{
                $user = User::findIdentity($players1[$i]);
                $players1[$i]=$user->username;
            }

        }
        for($i = 0;$i < 10;$i++){
            if($players2[$i] == null){
                unset($players2[$i]);
            }else{
                $user = User::findIdentity($players2[$i]);
                $players2[$i]=$user->username;
            }

        }



        if (Yii::$app->request->isPost && Model::loadMultiple($modelgolos1, Yii::$app->request->post()) && Model::loadMultiple($modelgolos2, Yii::$app->request->post()) ){
            $data=Yii::$app->request->bodyParams['Jogo'];
            return var_dump($data);


        }else{

            return $this->render('_golosform', [

                'players1'=>$players1,
                'players2'=>$players2,
                'model' => $model,
                'modelgolos1'=>$modelgolos1,
                'modelgolos2'=>$modelgolos2,
                'nome1'=>$nome1,
                'nome2'=>$nome2

                ]
            );

        }


    }




}
