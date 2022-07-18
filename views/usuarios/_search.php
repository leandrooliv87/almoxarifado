<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nome_usuario') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'authkey') ?>

    <?php // echo $form->field($model, 'accessToken') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'empresa_id') ?>

    <?php // echo $form->field($model, 'departamento_id') ?>

    <?php // echo $form->field($model, 'funcao_id') ?>

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
