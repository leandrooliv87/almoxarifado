<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%produtos}}".
 *
 * @property int $id
 * @property string $nome_produto
 * @property string $status
 * @property int $codigo_barras
 * @property int $qtd_estoque
 * @property int|null $categoria_id
 * @property int|null $unidade_medida_id
 * @property string|null $criado_por
 * @property string|null $alterado_por
 * @property string|null $data_criacao
 * @property string|null $data_alteracao
 *
 * @property CategoriaProdutos $categoria
 * @property Pedidos[] $pedidos
 * @property UnidadeMedidas $unidadeMedida
 */
class Produtos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%produtos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome_produto', 'codigo_barras', 'qtd_estoque'], 'required'],
            [['codigo_barras', 'qtd_estoque', 'categoria_id', 'unidade_medida_id'], 'integer'],
            [['data_criacao', 'data_alteracao'], 'safe'],
            [['nome_produto', 'criado_por', 'alterado_por'], 'string', 'max' => 120],
            [['status'], 'string', 'max' => 60],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => CategoriaProdutos::className(), 'targetAttribute' => ['categoria_id' => 'id']],
            [['unidade_medida_id'], 'exist', 'skipOnError' => true, 'targetClass' => UnidadeMedidas::className(), 'targetAttribute' => ['unidade_medida_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome_produto' => 'Nome Produto',
            'status' => 'Status',
            'codigo_barras' => 'Codigo Barras',
            'qtd_estoque' => 'Qtd Estoque',
            'categoria_id' => 'Categoria ID',
            'unidade_medida_id' => 'Unidade Medida ID',
            'criado_por' => 'Criado Por',
            'alterado_por' => 'Alterado Por',
            'data_criacao' => 'Data Criacao',
            'data_alteracao' => 'Data Alteracao',
        ];
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(CategoriaProdutos::className(), ['id' => 'categoria_id']);
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::className(), ['produto_id' => 'id']);
    }

    /**
     * Gets query for [[UnidadeMedida]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnidadeMedida()
    {
        return $this->hasOne(UnidadeMedidas::className(), ['id' => 'unidade_medida_id']);
    }
}
