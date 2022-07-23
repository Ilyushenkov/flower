<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Управление заказом ';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-update">

    <h1 class="text-success"><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'price',
            'count',
           // 'status',
            'user_id',
            'date',
          //  'reason',
        ],
    ]) ?>
    <div class="p-3 border border-primary">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
