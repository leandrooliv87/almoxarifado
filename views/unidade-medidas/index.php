<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnidadeMedidasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unidade Medidas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidade-medidas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Unidade Medidas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'unidade_medida',
            'status',
            'criado_por',
            'alterado_por',
            //'data_criacao',
            //'data_alteracao',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, UnidadeMedidas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
