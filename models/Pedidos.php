<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pedidos}}".
 *
 * @property int $id
 * @property int $qtd_solicitada
 * @property string $status
 * @property int|null $empresa_id
 * @property int|null $departamento_id
 * @property int|null $produto_id
 * @property string|null $criado_por
 * @property string|null $alterado_por
 * @property string|null $data_criacao
 * @property string|null $data_alteracao
 *
 * @property Departamentos $departamento
 * @property Empresas $empresa
 * @property Produtos $produto
 */
class Pedidos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pedidos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['qtd_solicitada'], 'required'],
            [['qtd_solicitada', 'empresa_id', 'departamento_id', 'produto_id'], 'integer'],
            [['data_criacao', 'data_alteracao'], 'safe'],
            [['status'], 'string', 'max' => 60],
            [['criado_por', 'alterado_por'], 'string', 'max' => 120],
            [['departamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departamentos::className(), 'targetAttribute' => ['departamento_id' => 'id']],
            [['empresa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empresas::className(), 'targetAttribute' => ['empresa_id' => 'id']],
            [['produto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Produtos::className(), 'targetAttribute' => ['produto_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'qtd_solicitada' => 'Qtd Solicitada',
            'status' => 'Status',
            'empresa_id' => 'Empresa ID',
            'departamento_id' => 'Departamento ID',
            'produto_id' => 'Produto ID',
            'criado_por' => 'Criado Por',
            'alterado_por' => 'Alterado Por',
            'data_criacao' => 'Data Criacao',
            'data_alteracao' => 'Data Alteracao',
        ];
    }

    /**
     * Gets query for [[Departamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento()
    {
        return $this->hasOne(Departamentos::className(), ['id' => 'departamento_id']);
    }

    /**
     * Gets query for [[Empresa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresas::className(), ['id' => 'empresa_id']);
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produtos::className(), ['id' => 'produto_id']);
    }
}
