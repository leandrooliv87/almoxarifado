<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%unidade_medidas}}".
 *
 * @property int $id
 * @property string $unidade_medida
 * @property string $status
 * @property string|null $criado_por
 * @property string|null $alterado_por
 * @property string|null $data_criacao
 * @property string|null $data_alteracao
 *
 * @property Produtos[] $produtos
 */
class UnidadeMedidas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%unidade_medidas}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unidade_medida'], 'required'],
            [['data_criacao', 'data_alteracao'], 'safe'],
            [['unidade_medida', 'criado_por', 'alterado_por'], 'string', 'max' => 120],
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
            'unidade_medida' => 'Unidade Medida',
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
        return $this->hasMany(Produtos::className(), ['unidade_medida_id' => 'id']);
    }
}
