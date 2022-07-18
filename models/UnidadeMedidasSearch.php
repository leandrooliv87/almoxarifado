<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UnidadeMedidas;

/**
 * UnidadeMedidasSearch represents the model behind the search form of `app\models\UnidadeMedidas`.
 */
class UnidadeMedidasSearch extends UnidadeMedidas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['unidade_medida', 'status', 'criado_por', 'alterado_por', 'data_criacao', 'data_alteracao'], 'safe'],
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
        $query = UnidadeMedidas::find();

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
            'data_criacao' => $this->data_criacao,
            'data_alteracao' => $this->data_alteracao,
        ]);

        $query->andFilterWhere(['like', 'unidade_medida', $this->unidade_medida])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'criado_por', $this->criado_por])
            ->andFilterWhere(['like', 'alterado_por', $this->alterado_por]);

        return $dataProvider;
    }
}
