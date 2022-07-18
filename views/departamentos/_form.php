<?php

use app\models\Status;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Departamentos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departamentos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome_departamento')->textInput(['maxlength' => true, 'placeholder' => 'Digite o nome do novo departamento', 'autofocus'=>true]) ?>

    <?= $form->field($model, 'empresa_id')->dropDownList(Status::getEmpresa(),[
        'prompt' => 'Selecione'
    ]) ?>

    <?= $form->field($model, 'status')->radioList(Status::getSituacao(), ['prompt' => 'Selecione']) ?>

    <!-- <?= $form->field($model, 'criado_por')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alterado_por')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_criacao')->textInput() ?>

    <?= $form->field($model, 'data_alteracao')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
