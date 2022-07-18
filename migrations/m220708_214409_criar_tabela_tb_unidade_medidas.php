<?php

use yii\db\Migration;

/**
 * Class m220708_214409_criar_tabela_tb_unidade_medidas
 */
class m220708_214409_criar_tabela_tb_unidade_medidas extends Migration
{   
    public function safeUp()
    {   
        $this -> createtable('{{%unidade_medidas}}',[
            'id' => $this -> primaryKey(),
            'unidade_medida' => $this -> string(120) -> notNull(),
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
        $this -> dropTable('{{%unidade_medidas}}');
        
        return true;
    }
}
