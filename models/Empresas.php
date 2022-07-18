<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "{{%empresas}}".
 *
 * @property int $id
 * @property string $nome_empresa
 * @property string $status
 * @property string|null $criado_por
 * @property string|null $alterado_por
 * @property string|null $data_criacao
 * @property string|null $data_alteracao
 *
 * @property Departamentos[] $departamentos
 * @property Pedidos[] $pedidos
 * @property Usuarios[] $usuarios
 */
class Empresas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%empresas}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome_empresa'], 'required'],
            [['data_criacao', 'data_alteracao'], 'safe'],
            [['nome_empresa', 'criado_por', 'alterado_por'], 'string', 'max' => 120],
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
            'nome_empresa' => 'Nome da Empresa',
            'status' => 'Status',
            'criado_por' => 'Criado Por',
            'alterado_por' => 'Alterado Por',
            'data_criacao' => 'Data Criacao',
            'data_alteracao' => 'Data Alteracao',
        ];
    }

    public function behaviors()
    {
        return [
            [
            'class' => TimestampBehavior::class,
            'createdAtAttribute' => 'data_criacao',
            'updatedAtAttribute' => 'data_alteracao',
            'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * Gets query for [[Departamentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamentos()
    {
        return $this->hasMany(Departamentos::className(), ['empresa_id' => 'id']);
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::className(), ['empresa_id' => 'id']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['empresa_id' => 'id']);
    }
}
