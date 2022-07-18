<?php

use yii\db\Migration;

class m220711_134935_adicionar_fk_tb_usuarios extends Migration
{
    public function safeUp()
    {
        $this -> addForeignKey('fk_usuarios_empresa_id', '{{%usuarios}}', 'empresa_id', '{{%empresas}}', 'id');
        
        $this -> addForeignKey('fk_usuarios_departamento_id', '{{%usuarios}}', 'departamento_id', '{{%departamentos}}', 'id');

        $this -> addForeignKey('fk_usuarios_funcao_usuario_id', '{{%usuarios}}', 'funcao_id', '{{%funcao_usuarios}}', 'id');

        return true;
    }

    public function safeDown()
    {
        $this -> dropForeignKey('fk_usuarios_empresa_id', '{{%usuarios}}');

        $this -> dropForeignKey('fk_usuarios_departamento_id', '{{%usuarios}}');

        $this -> dropForeignKey('fk_usuarios_funcao_usuario_id', '{{%usuarios}}');

        return true;
    }
}
