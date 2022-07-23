<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A3f05861f3922288d85bd6b4489415bfe869abd32fb14ba9aab6f36305f4d7228&amp;source=constructor" width="600" height="400" frameborder="0"></iframe>
    </p>

    <code><?= __FILE__ ?></code>
</div>
