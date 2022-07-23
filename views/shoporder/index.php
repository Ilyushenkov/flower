<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ShopOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shop Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Shop Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'status',
            'user_id',
            'cart_id',
            'reason',
            //'date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ShopOrder $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
