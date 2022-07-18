<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "{{%departamentos}}".
 *
 * @property int $id
 * @property string $nome_departamento
 * @property int|null $empresa_id
 * @property string $status
 * @property string|null $criado_por
 * @property string|null $alterado_por
 * @property string|null $data_criacao
 * @property string|null $data_alteracao
 *
 * @property Empresas $empresa
 * @property Pedidos[] $pedidos
 * @property Usuarios[] $usuarios
 */
class Departamentos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%departamentos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome_departamento'], 'required'],
            [['empresa_id'], 'integer'],
            [['data_criacao', 'data_alteracao'], 'safe'],
            [['nome_departamento', 'criado_por', 'alterado_por'], 'string', 'max' => 120],
            [['status'], 'string', 'max' => 60],
            [['empresa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empresas::className(), 'targetAttribute' => ['empresa_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome_departamento' => 'Nome do Departamento',
            'empresa_id' => 'Empresa ID',
            'status' => 'Status',
            'criado_por' => 'Criado Por',
            'alterado_por' => 'Alterado Por',
            'data_criacao' => 'Data Criacao',
            'data_alteracao' => 'Data Alteracao',
        ];
    }

    public function behaviors()
    {
        return[
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'data_criacao',
                'updatedAtAttribute' => 'data_alteracao',
                'value' => new Expression('NOW()')
            ],
        ];
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
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::className(), ['departamento_id' => 'id']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['departamento_id' => 'id']);
    }
}
