<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FuncaoUsuarios */

$this->title = 'Cadastrar função do usuários';
$this->params['breadcrumbs'][] = ['label' => 'Funcções cadastradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcao-usuarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
