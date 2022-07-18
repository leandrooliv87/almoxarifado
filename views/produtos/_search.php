<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProdutosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produtos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nome_produto') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'codigo_barras') ?>

    <?= $form->field($model, 'qtd_estoque') ?>

    <?php // echo $form->field($model, 'categoria_id') ?>

    <?php // echo $form->field($model, 'unidade_medida_id') ?>

    <?php // echo $form->field($model, 'criado_por') ?>

    <?php // echo $form->field($model, 'alterado_por') ?>

    <?php // echo $form->field($model, 'data_criacao') ?>

    <?php // echo $form->field($model, 'data_alteracao') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
