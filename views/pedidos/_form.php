<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pedidos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedidos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'qtd_solicitada')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'empresa_id')->textInput() ?>

    <?= $form->field($model, 'departamento_id')->textInput() ?>

    <?= $form->field($model, 'produto_id')->textInput() ?>

    <?= $form->field($model, 'criado_por')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alterado_por')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_criacao')->textInput() ?>

    <?= $form->field($model, 'data_alteracao')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
