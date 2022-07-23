<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearh */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Панель администратора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <ul>
        <li><?= Html::a('Управление категориями', ['/category'], ['class' => '']) ?></li>
        <li><?= Html::a('Управление заказами', ['/order?sort=-date'], ['class' => '']) ?></li>
        <li><?= Html::a('Управление товарами', ['/article/admin?sort=-date'], ['class' => '']) ?></li>
    </ul>
