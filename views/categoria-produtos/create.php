<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CategoriaProdutos */

$this->title = 'Create Categoria Produtos';
$this->params['breadcrumbs'][] = ['label' => 'Categoria Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-produtos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
