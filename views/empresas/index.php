<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpresasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresas cadastradas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cadastrar Empresas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nome_empresa',
            'status',
            //'criado_por',
            //'alterado_por',
            //'data_criacao',
            //'data_alteracao',
            [
                'class' => ActionColumn::className(),
                'header' => 'Ações',
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
