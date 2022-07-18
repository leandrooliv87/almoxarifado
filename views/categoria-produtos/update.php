<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CategoriaProdutos */

$this->title = 'Update Categoria Produtos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Categoria Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categoria-produtos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
