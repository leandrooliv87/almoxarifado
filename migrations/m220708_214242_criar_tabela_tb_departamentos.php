<?php

use yii\db\Migration;

class m220708_214242_criar_tabela_tb_departamentos extends Migration
{

    public function safeUp()
    {
        $this -> createTable('{{%departamentos}}', [
            'id' => $this -> primaryKey(),
            'nome_departamento' => $this -> string(120) -> notNull(),
            'empresa_id' => $this -> integer(),
            'status' => $this -> string(60) -> defaultValue('ativo') -> notNull(),
            'criado_por' => $this -> string(120),
            'alterado_por' => $this -> string(120),
            'data_criacao' => $this -> dateTime(),
            'data_alteracao' => $this -> dateTime(),
        ]);
        return true;
    }

    public function safeDown()
    {
        $this -> dropTable('{{%departamentos}}');

        return true;
    }
}
