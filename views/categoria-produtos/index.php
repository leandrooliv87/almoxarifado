<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriaProdutosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categoria Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-produtos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Categoria Produtos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'categoria_produto',
            'status',
            'criado_por',
            'alterado_por',
            //'data_criacao',
            //'data_alteracao',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CategoriaProdutos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
