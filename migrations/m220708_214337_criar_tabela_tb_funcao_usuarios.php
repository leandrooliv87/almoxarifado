<?php

use yii\db\Migration;

class m220708_214337_criar_tabela_tb_funcao_usuarios extends Migration
{
    public function safeUp()
    {
        $this -> createTable('{{%funcao_usuarios}}', [
            'id' => $this -> primaryKey(),
            'funcao_usuario' => $this -> string(120) -> notNull(),
            'status' => $this -> string(60) -> defaultValue('ativo') -> notNull(),
            'criado_por' => $this -> string(120),
            'alterado_por' => $this -> string(120),
            'data_criacao' => $this -> dateTime(),
            'data_alteracao' => $this -> dateTime()

        ]);
        return true;
    }

    public function safeDown()
    {
        $this -> dropTable('{{%funcao_usuarios}}');

        return true;
    }

}
