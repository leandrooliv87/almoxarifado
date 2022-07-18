<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

/**
 * UsuariosSearch represents the model behind the search form of `app\models\Usuarios`.
 */
class UsuariosSearch extends Usuarios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nome_usuario', 'username', 'password', 'authkey', 'accessToken', 'status', 'criado_por', 'alterado_por', 'data_criacao', 'data_alteracao', 'empresa_id', 'departamento_id', 'funcao_id'], 'safe'],
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
        $query = Usuarios::find()->joinWith(['empresa', 'departamento', 'funcao']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['nome_usuario' => SORT_ASC]]
        ]);

        $dataProvider -> sort -> attributes['empresa_id'] = [
            'asc' => ['empresas.nome_empresa' => SORT_ASC],
            'desc' => ['empresas.nome_empresa' => SORT_DESC],
        ];

        $dataProvider -> sort -> attributes['departamento_id'] = [
            'asc' => ['departamentos.nome_departamento' => SORT_ASC],
            'desc' => ['departamentos.nome_departamento' => SORT_DESC],
        ];

        $dataProvider -> sort -> attributes['funcao_id'] = [
            'asc' => ['funcao_usuarios.funcao_usuario' => SORT_ASC],
            'desc' => ['funcao_usuarios.funcao_usuario' => SORT_DESC],
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
            //'departamento_id' => $this->departamento_id,
            //'funcao_id' => $this->funcao_id,
            'data_criacao' => $this->data_criacao,
            'data_alteracao' => $this->data_alteracao,
        ]);

        $query->andFilterWhere(['like', 'nome_usuario', $this->nome_usuario])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andfilterwhere(['like', 'empresas.nome_empresa', $this->empresa_id])
            ->andFilterWhere(['like', 'departamentos.nome_departamento', $this->departamento_id])
            ->andFilterWhere(['like', 'funcao_usuarios.funcao_usuario', $this->funcao_id])
            //->andFilterWhere(['like', 'password', $this->password])
            //->andFilterWhere(['like', 'authkey', $this->authkey])
            //->andFilterWhere(['like', 'accessToken', $this->accessToken])
            ->andFilterWhere(['like', 'usuario.status', $this->status])
            ->andFilterWhere(['like', 'criado_por', $this->criado_por])
            ->andFilterWhere(['like', 'alterado_por', $this->alterado_por]);

        return $dataProvider;
    }
}
