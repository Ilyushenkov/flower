<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$this->title = 'Наши контактные данные';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A3f05861f3922288d85bd6b4489415bfe869abd32fb14ba9aab6f36305f4d7228&amp;source=constructor" width="60%" height="400px" style="min-width: 300px;" frameborder="0"></iframe>
<h3 class="text-primary">Адрес</h3>
    <p class="ml-5">197373, СПб, пр. Авиаконструкторов, д.28 лит. А, </p>
<h3 class="text-primary">Телефон</h3>
    <p class="ml-5">(812)576-06-75</p>
<h3 class="text-primary">E-mail</h3>
    <p class="ml-5">pkgh@pkgh.edu.ru</p>
</div>
