<?php

namespace app\models;

use app\models\Usuarios;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $nome_usuario;
    public $username;
    public $password;
    public $authkey;
    public $accessToken;
    public $status;
    public $empresa_id;
    public $departamento_id;
    public $funcao_id;
    public $criado_por;
    public $alterado_por;
    public $data_criacao;
    public $data_alteracao;

    public static function findIdentity($id)
    {
        //$user = Usuarios::find()->andWhere(['id' => $id])->one();
        $user = Usuarios::findOne($id);

        if($user){
            return new static($user);
        }
        return null;
        
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public static function findByUsername($username)
    {
        $user = Usuarios::find()->where(['username'=>$username])->one();
        //$user = Usuarios::findOne(['username'=>$username]);

        if($user){
            return new static($user);
        }

        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {                
        return $this->authkey;
    }

    public function validateAuthKey($authkey)
    {
        return $this->authkey === $authkey;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
