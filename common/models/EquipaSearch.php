<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Equipa;

/**
 * EquipaSearch represents the model behind the search form of `app\models\Equipa`.
 */
class EquipaSearch extends Equipa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_jogo', 'id_jogador1', 'id_jogador2', 'id_jogador3', 'id_jogador4', 'id_jogador5', 'id_jogador6', 'id_jogador7', 'id_jogador8', 'id_jogador9', 'id_jogador10'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Equipa::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_jogo' => $this->id_jogo,
            'id_jogador1' => $this->id_jogador1,
            'id_jogador2' => $this->id_jogador2,
            'id_jogador3' => $this->id_jogador3,
            'id_jogador4' => $this->id_jogador4,
            'id_jogador5' => $this->id_jogador5,
            'id_jogador6' => $this->id_jogador6,
            'id_jogador7' => $this->id_jogador7,
            'id_jogador8' => $this->id_jogador8,
            'id_jogador9' => $this->id_jogador9,
            'id_jogador10' => $this->id_jogador10,
        ]);

        return $dataProvider;
    }
}
