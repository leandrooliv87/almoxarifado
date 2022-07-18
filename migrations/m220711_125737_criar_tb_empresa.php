<?php

use yii\db\Migration;

/**
 * Class m220711_125737_criar_tb_empresa
 */
class m220711_125737_criar_tb_empresa extends Migration
{
    public function safeUp()
    {
        $this -> createtable('{{%empresas}}',[
            'id' => $this -> primaryKey(),
            'nome_empresa' => $this -> string(120) -> notNull(),
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
        $this -> dropTable('{{%empresas}}');
        
        return true;
    }

}
