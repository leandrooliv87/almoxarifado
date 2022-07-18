<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Produtos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produtos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome_produto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigo_barras')->textInput() ?>

    <?= $form->field($model, 'qtd_estoque')->textInput() ?>

    <?= $form->field($model, 'categoria_id')->textInput() ?>

    <?= $form->field($model, 'unidade_medida_id')->textInput() ?>

    <?= $form->field($model, 'criado_por')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alterado_por')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_criacao')->textInput() ?>

    <?= $form->field($model, 'data_alteracao')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
