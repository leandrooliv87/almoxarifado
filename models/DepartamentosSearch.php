<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Departamentos;

/**
 * DepartamentosSearch represents the model behind the search form of `app\models\Departamentos`.
 */
class DepartamentosSearch extends Departamentos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nome_departamento', 'empresa_id', 'status', 'criado_por', 'alterado_por', 'data_criacao', 'data_alteracao'], 'safe'],
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
        $query = Departamentos::find()->joinWith('empresa');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder'=>['nome_departamento'=>SORT_ASC]]
        ]);

        $dataProvider->sort->attributes['empresa_id'] = [
            'asc' => ['empresas.nome_empresa' => SORT_ASC],
            'asc' => ['empresas.nome_empresa' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'empresa_id' => $this->empresa_id,
            'data_criacao' => $this->data_criacao,
            'data_alteracao' => $this->data_alteracao,
        ]);

        $query->andFilterWhere(['like', 'nome_departamento', $this->nome_departamento])
            ->andFilterWhere(['like', 'empresas.nome_empresa', $this -> empresa_id])
            ->andFilterWhere(['like', 'departamentos.status', $this->status])
            ->andFilterWhere(['like', 'departamentos.criado_por', $this->criado_por])
            ->andFilterWhere(['like', 'departamentos.alterado_por', $this->alterado_por]);

        return $dataProvider;
    }
}
