<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpresasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nome_empresa') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'criado_por') ?>

    <?= $form->field($model, 'alterado_por') ?>

    <?php // echo $form->field($model, 'data_criacao') ?>

    <?php // echo $form->field($model, 'data_alteracao') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
