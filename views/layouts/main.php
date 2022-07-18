<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\models\User;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    $usuario = Yii::$app->user->identity;
    NavBar::begin([
        // 'brandLabel' => Yii::$app->name,
        // 'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);

    $items = [];

    if(Yii::$app->user->isGuest)
    {
        $items[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $items = [
            ['label' => 'Empresas', 'url' => ['/empresas/index']],
                ['label' => 'Departamentos', 'url' => ['/departamentos/index']],
                ['label' => 'Função dos Usuários', 'url' => ['/funcao-usuarios/index']],
                ['label' => 'Usuários', 'url' => ['/usuarios/index']],
                ['label' => 'Categoria dos Produtos', 'url' => ['/categoria-produtos/index']],
                ['label' => 'Uni. Med. dos Produtos', 'url' => ['/unidade-medidas/index']],
                ['label' => 'Produtos', 'url' => ['/produtos/index']],
                ['label' => 'Pedidos', 'url' => ['/pedidos/index']],
                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout']]
        ];

    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $items
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
