<?php

use yii\db\Migration;

class m220711_205425_adicionar_fk_tb_pedidos extends Migration
{
    public function safeUp()
    {
        $this -> addForeignKey('fk_pedidos_empresa_id', '{{%pedidos}}', 'empresa_id', '{{%empresas}}', 'id');
        $this -> addForeignKey('fk_pedidos_departamento_id', '{{%pedidos}}', 'departamento_id', '{{%departamentos}}', 'id');
        $this -> addForeignKey('fk_pedidos_produto_id', '{{%pedidos}}', 'produto_id', '{{%produtos}}', 'id');

        return true;
    }

    public function safeDown()
    {
        $this -> dropForeignKey('fk_pedidos_empresa_id', '{{%pedidos}}');
        $this -> dropForeignKey('fk_pedidos_departamento_id', '{{%pedidos}}');
        $this -> dropForeignKey('fk_pedidos_produto_id', '{{%pedidos}}');

        return true;
    }
}
