<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Departamentos */

$this->title = 'Alterar Departamento: ' . $model->nome_departamento;
$this->params['breadcrumbs'][] = ['label' => 'Departamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome_departamento, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="departamentos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
