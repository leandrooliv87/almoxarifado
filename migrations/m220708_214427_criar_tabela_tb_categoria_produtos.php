<?php

use yii\db\Migration;

/**
 * Class m220708_214427_criar_tabela_tb_categoria_produtos
 */
class m220708_214427_criar_tabela_tb_categoria_produtos extends Migration
{   
    public function safeUp()
    {   
        $this -> createtable('{{%categoria_produtos}}',[
            'id' => $this -> primaryKey(),
            'categoria_produto' => $this -> string(120) -> notNull(),
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
        $this -> dropTable('{{%categoria_produtos}}');
        
        return true;
    }
}