<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UnidadeMedidas */

$this->title = 'Create Unidade Medidas';
$this->params['breadcrumbs'][] = ['label' => 'Unidade Medidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidade-medidas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
