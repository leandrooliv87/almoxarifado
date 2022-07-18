<?php

use yii\db\Migration;

class m220711_133623_adicionar_fk_tb_departamento extends Migration
{
    public function safeUp()
    {
        $this -> addForeignKey('fk_departamento_empresa_id', '{{%departamentos}}', 'empresa_id', '{{%empresas}}', 'id');

        return true;
    }

    public function safeDown()
    {
        $this -> dropForeignKey('fk_departamento_empresa_id', '{{%departamentos}}');
        
        return true;
    }

}
