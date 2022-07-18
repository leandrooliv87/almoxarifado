<?php

use yii\db\Migration;

/**
 * Class m220708_214348_criar_tabela_tb_usuarios
 */
class m220708_214348_criar_tabela_tb_usuarios extends Migration
{
    public function safeUp()
    {
        $this -> createTable('{{%usuarios}}', [
            'id' => $this -> primaryKey(),
            'nome_usuario' => $this -> string(120) -> notNull(),
            'username' => $this -> string(60) -> notNull(),
            'password' => $this -> string(60) -> notNull(),
            'authkey' => $this -> string(60) -> notNull(),
            'accessToken' => $this -> string(60) -> notNull(),
            'status' => $this -> string(60) -> defaultValue('ativo') -> notNull(),
            'empresa_id' => $this -> integer(),
            'departamento_id' => $this -> integer(),
            'funcao_id' => $this -> integer(),
            'criado_por' => $this -> string(120),
            'alterado_por' => $this -> string(120),
            'data_criacao' => $this -> dateTime(),
            'data_alteracao' => $this -> dateTime()

        ]);
        return true;
    }

    public function safeDown()
    {
        $this -> dropTable('{{%usuarios}}');

        return true;
    }

}