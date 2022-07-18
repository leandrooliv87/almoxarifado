<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CategoriaProdutos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categoria-produtos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoria_produto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'criado_por')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alterado_por')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_criacao')->textInput() ?>

    <?= $form->field($model, 'data_alteracao')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
