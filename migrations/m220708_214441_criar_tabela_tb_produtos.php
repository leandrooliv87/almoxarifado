<?php

use yii\db\Migration;

/**
 * Class m220708_214441_criar_tabela_tb_produtos
 */
class m220708_214441_criar_tabela_tb_produtos extends Migration
{   
    public function safeUp()
    {   
        $this -> createtable('{{%produtos}}',[
            'id' => $this -> primaryKey(),
            'nome_produto' => $this -> string(120) -> notNull(),
            'status' => $this -> string(60) -> defaultValue('ativo') -> notNull(),
            'codigo_barras' => $this -> integer() -> notNull(),
            'qtd_estoque' => $this -> integer() -> notNull(),
            'categoria_id' => $this -> integer(),
            'unidade_medida_id' => $this -> integer(),
            'criado_por' => $this -> string(120),
            'alterado_por' => $this -> string(120),
            'data_criacao' => $this -> dateTime(),
            'data_alteracao' => $this -> dateTime()
        ]);
        return true;
    }

    public function safeDown()
    {
        $this -> dropTable('{{%produtos}}');
        
        return true;
    }
}