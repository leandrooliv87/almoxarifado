<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pedidos;

/**
 * PedidosSearch represents the model behind the search form of `app\models\Pedidos`.
 */
class PedidosSearch extends Pedidos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'qtd_solicitada', 'empresa_id', 'departamento_id', 'produto_id'], 'integer'],
            [['status', 'criado_por', 'alterado_por', 'data_criacao', 'data_alteracao'], 'safe'],
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
        $query = Pedidos::find();

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
            'qtd_solicitada' => $this->qtd_solicitada,
            'empresa_id' => $this->empresa_id,
            'departamento_id' => $this->departamento_id,
            'produto_id' => $this->produto_id,
            'data_criacao' => $this->data_criacao,
            'data_alteracao' => $this->data_alteracao,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'criado_por', $this->criado_por])
            ->andFilterWhere(['like', 'alterado_por', $this->alterado_por]);

        return $dataProvider;
    }
}
