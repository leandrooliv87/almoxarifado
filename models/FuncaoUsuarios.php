<?php

namespace app\models;

use ValueError;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "{{%funcao_usuarios}}".
 *
 * @property int $id
 * @property string $funcao_usuario
 * @property string $status
 * @property string|null $criado_por
 * @property string|null $alterado_por
 * @property string|null $data_criacao
 * @property string|null $data_alteracao
 *
 * @property Usuarios[] $usuarios
 */
class FuncaoUsuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%funcao_usuarios}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['funcao_usuario'], 'required'],
            [['data_criacao', 'data_alteracao'], 'safe'],
            [['funcao_usuario', 'criado_por', 'alterado_por'], 'string', 'max' => 120],
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
            'funcao_usuario' => 'Função do usuário',
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
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'data_criacao',
                'updatedAtAttribute' => 'data_alteracao',
                'value' => new Expression('NOW()')
            ],
        ];
    }



    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['funcao_id' => 'id']);
    }
}
