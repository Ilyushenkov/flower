<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Order;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Управление заказами';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1 class="text-success"><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'name',
            'price',
            'count',
            'status',
            //'user_id',
            'date',
            'reason',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Order $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
