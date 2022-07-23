<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1 class="text-success"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Просмотреть список заказов', '/order?sort=-date', ['class' => 'btn btn-info']) ?>
        <?= Html::a('Управление заказом', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить заказ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите заказ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'price',
            'count',
            'status',
            'user_id',
            'date',
            'reason',
        ],
    ]) ?>

</div>
