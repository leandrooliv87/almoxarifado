<?php

use yii\db\Migration;

class m220711_143759_adicionar_fk_tb_produtos extends Migration
{
    public function safeUp()
    {
        $this -> addForeignKey('fk_produtos_categoria_id', '{{%produtos}}', 'categoria_id', '{{%categoria_produtos}}', 'id');

        $this -> addForeignKey('fk_produtos_unidade_medida_id', '{{%produtos}}', 'unidade_medida_id', '{{%unidade_medidas}}', 'id');

        return true;
    }

    public function safeDown()
    {
        $this -> dropForeignKey('fk_produtos_categoria_id', '{{%produtos}}');
        $this -> dropForeignKey('fk_produtos_unidade_medida_id', '{{%produtos}}');

        return true;
    }
}
