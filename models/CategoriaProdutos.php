<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%categoria_produtos}}".
 *
 * @property int $id
 * @property string $categoria_produto
 * @property string $status
 * @property string|null $criado_por
 * @property string|null $alterado_por
 * @property string|null $data_criacao
 * @property string|null $data_alteracao
 *
 * @property Produtos[] $produtos
 */
class CategoriaProdutos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%categoria_produtos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoria_produto'], 'required'],
            [['data_criacao', 'data_alteracao'], 'safe'],
            [['categoria_produto', 'criado_por', 'alterado_por'], 'string', 'max' => 120],
            [['status'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria_produto' => 'Categoria Produto',
            'status' => 'Status',
            'criado_por' => 'Criado Por',
            'alterado_por' => 'Alterado Por',
            'data_criacao' => 'Data Criacao',
            'data_alteracao' => 'Data Alteracao',
        ];
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produtos::className(), ['categoria_id' => 'id']);
    }
}
