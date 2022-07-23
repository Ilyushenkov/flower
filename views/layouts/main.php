<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head class="bg">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header class="navbar">
    <?php
    NavBar::begin([
        'brandLabel' => 'Мир цветов',
        'brandUrl' => '/',
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    if (Yii::$app->user->isGuest){
        $items=            [
            ['label' => 'О нас', 'url' => ['/site/index']],
            ['label' => 'Каталог', 'url' => ['/article/index?sort=-date']],
            ['label' => 'Где нас найти?', 'url' => ['/site/contact']],
            ['label' => 'Регистрация', 'url' => ['/user/create']],
            ['label' => 'Авторизация', 'url' => ['/site/login']]
        ];
        $logout=null;
    }
    else{
        Yii::$app->user->identity->status=='администратор' ? (
                $items=[
                        ['label' => 'Панель администратора', 'url' => ['/admin']]
                 ]

        ) : (
              $items=[
                  ['label' => 'О нас', 'url' => ['/site/index']],
                  ['label' => 'Каталог', 'url' => ['/article/index?sort=-date']],
                  ['label' => 'Где нас найти?', 'url' => ['/site/contact']],
                  ['label' => 'Личный кабинет', 'url'=>['/user/view?id='. Yii::$app->user->identity->id]],
                  ['label' => 'Корзина', 'url'=>['/cart']]
              ]
        );
        $logout=
            '<li class="m-auto te">'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Выйти (' . Yii::$app->user->identity->login . ')',
                ['class' => 'btn btn-link logout ']
            )
            . Html::endForm()
            . '</li>';

    }
    echo Nav::widget([
        'options' => ['class' => 'text-info'],
        'items' => $items
    ]);
    echo $logout;
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">

        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; Мир цветов <?= date('Y') ?></p>
        <p class="float-right">Ильюшенков Л.В.</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
