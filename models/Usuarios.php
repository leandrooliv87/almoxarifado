<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "{{%usuarios}}".
 *
 * @property int $id
 * @property string $nome_usuario
 * @property string $username
 * @property string $password
 * @property string $authkey
 * @property string $accessToken
 * @property string $status
 * @property int|null $empresa_id
 * @property int|null $departamento_id
 * @property int|null $funcao_id
 * @property string|null $criado_por
 * @property string|null $alterado_por
 * @property string|null $data_criacao
 * @property string|null $data_alteracao
 *
 * @property Departamentos $departamento
 * @property Empresas $empresa
 * @property FuncaoUsuarios $funcao
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%usuarios}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome_usuario', 'username', 'password'], 'required'],
            [['data_criacao', 'data_alteracao', 'empresa_id', 'departamento_id', 'funcao_id', 'authkey', 'accessToken'], 'safe'],
            [['nome_usuario', 'criado_por', 'alterado_por'], 'string', 'max' => 120],
            [['username', 'password', 'authkey', 'accessToken', 'status'], 'string', 'max' => 60],
            [['departamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departamentos::className(), 'targetAttribute' => ['departamento_id' => 'id']],
            [['empresa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empresas::className(), 'targetAttribute' => ['empresa_id' => 'id']],
            [['funcao_id'], 'exist', 'skipOnError' => true, 'targetClass' => FuncaoUsuarios::className(), 'targetAttribute' => ['funcao_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome_usuario' => 'Nome do usuario',
            'username' => 'Username',
            'password' => 'Password',
            'authkey' => 'Authkey',
            'accessToken' => 'Access Token',
            'status' => 'Status',
            'empresa_id' => 'Empresa',
            'departamento_id' => 'Departamento',
            'funcao_id' => 'Função',
            'criado_por' => 'Criado Por',
            'alterado_por' => 'Alterado Por',
            'data_criacao' => 'Data Criação',
            'data_alteracao' => 'Data Alteração',
        ];
    }

    public function behaviors()
    {
        return[
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'createdAtAttribute'=> 'data_criacao',
                'updatedAtAttribute' => 'data_alteracao',
                'value' => new Expression('NOW()')
            ],
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
     * Gets query for [[Funcao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuncao()
    {
        return $this->hasOne(FuncaoUsuarios::className(), ['id' => 'funcao_id']);
    }
}
