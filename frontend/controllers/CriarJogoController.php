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
                for($i=0;$i < count($datajogadores);$i++){
                    $username = $datajogadores[$i]['id_user'];
                    $user = User::findByUsername($username);
                    $modeljogadores[$i]->id_user = $user->getId();
                    $equipa = Equipa::findBySql('SELECT * FROM equipa WHERE id_criador=' . $criador . ' ORDER BY ID DESC LIMIT 1')->all();
                    $modeljogadores[$i]->id_equipa = $equipa[0]->id;
                    $modeljogadores[$i]->save();
                    $model->id=$equipa[0]->id;
                    $model->nome=$equipa[0]->nome;
                    $model->id_criador=$equipa[0]->id_criador;
                    $user->link('equipa',$model);
                }
                return $this->render('index');
            }else{
                $teste='esta merda nao esta a meter os erros bem';
                return var_dump($teste);
            }
        }else{
            return $this->render('_equipaform', [
                'model' => $model,
                'modeljogadores'=>$modeljogadores]);
        }
    }
    public function actionCriarjogo(){
        $model= new Jogo();
        $id_criador=Yii::$app->user->getId();
        $equipas=Equipa::findBySql('SELECT * FROM equipa WHERE id_criador='.$id_criador.' ORDER BY ID DESC LIMIT 2')->all();
        if(empty($equipas)){
            echo "cona";

        }else{
            $equipa1=$equipas[0];
            $id_equipa1=$equipa1->id;

            $numerousers1=EquipaUser::find()
                ->select(['COUNT(*) AS id_user'])
                ->where (['id_equipa'=>$id_equipa1])
                ->all();


            $equipa2=$equipas[1];
            $id_equipa2=$equipa2->id;


            $numerousers2=EquipaUser::find()
                ->select(['COUNT(*) AS id_user'])
                ->where (['id_equipa'=>$id_equipa2])
                ->all();

            $nome1=$equipa1->nome;
            $nome2=$equipa2->nome;

            switch ($numerousers1[0]['id_user']){
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


            switch ($numerousers2[0]['id_user']){
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


            $players1=EquipaUser::find()
                ->select(['id_user'])
                ->where (['id_equipa'=>$id_equipa1])
                ->all();

            $players2=EquipaUser::find()
                ->select(['id_user'])
                ->where (['id_equipa'=>$id_equipa2])
                ->all();

            for($i = 0;$i <$numerousers1[0]['id_user'];$i++){
                $user = User::findIdentity($players1[$i]);
                $players1[$i]=$user->username;

            }
            for($i =0;$i <$numerousers2[0]['id_user'];$i++){

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





