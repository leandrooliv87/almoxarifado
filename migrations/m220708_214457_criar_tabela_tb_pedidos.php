<?php

use yii\db\Migration;

/**
 * Class m220708_214457_criar_tabela_tb_pedidos
 */
class m220708_214457_criar_tabela_tb_pedidos extends Migration
{   
    public function safeUp()
    {   
        $this -> createtable('{{%pedidos}}',[
            'id' => $this -> primaryKey(),
            'qtd_solicitada' => $this -> integer() -> notNull(),
            'status' => $this -> string(60) -> defaultValue('ativo') -> notNull(),
            'empresa_id' => $this -> integer(),
            'departamento_id' => $this -> integer(),
            'produto_id' => $this -> integer(),
            'criado_por' => $this -> string(120),
            'alterado_por' => $this -> string(120),
            'data_criacao' => $this -> dateTime(),
            'data_alteracao' => $this -> dateTime()
        ]);
        return true;
    }

    public function safeDown()
    {
        $this -> dropTable('{{%pedidos}}');
        
        return true;
    }
}
