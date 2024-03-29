<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * JogoSearch represents the model behind the search form of `app\models\Jogo`.
 */
class JogoSearch extends Jogo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_equipa1', 'id_equipa2', 'golosEquipa1', 'golosEquipa2'], 'integer'],
            [['data', 'local'], 'safe'],
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
        $query = Jogo::find();

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
            'id_equipa1' => $this->id_equipa1,
            'id_equipa2' => $this->id_equipa2,
            'golosEquipa1' => $this->golosEquipa1,
            'golosEquipa2' => $this->golosEquipa2,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'local', $this->local]);

        return $dataProvider;
    }
}
