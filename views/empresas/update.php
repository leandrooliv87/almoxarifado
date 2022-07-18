<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Empresas */

$this->title = 'Alterar Empresa: ' . $model->nome_empresa;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome_empresa, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Alterar';
?>
<div class="empresas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
