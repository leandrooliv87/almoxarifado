<?php

use app\models\Status;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome_usuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'authkey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accessToken')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'status')->radioList(Status::getSituacao()) ?>

    <?= $form->field($model, 'empresa_id')->dropDownList(Status::getEmpresa(),['prompt' => '::Selecione::']) ?>

    <?= $form->field($model, 'departamento_id')->dropDownList(Status::getDepartamento(),['prompt' => '::Selecione::']) ?>

    <?= $form->field($model, 'funcao_id')->dropDownList(Status::getFuncaoUsuario(), ['prompt' => '::Selecione::']) ?>

    <!-- <?= $form->field($model, 'criado_por')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alterado_por')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_criacao')->textInput() ?>

    <?= $form->field($model, 'data_alteracao')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
