<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Order;
/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1 class="text-success"><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
           // 'status',
            'name',
            'surname',
            'patronymic',
            'login',
           // 'password',
            'email:email',
        ],
    ]) ?>
<h1 class="text-success">Список заказов</h1>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Наименование</th>
            <th scope="col">Цена</th>
            <th scope="col">Количество</th>
            <th scope="col">Дата оформления</th>
            <th scope="col">Статус заказа</th>
            <th scope="col">Сообщение продавца</th>
            <th scope="col">Управление</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $orders=Order::find()->where(['user_id'=>Yii::$app->user->identity->id])->orderBy(['date'=>SORT_DESC])->all();
        foreach ($orders as $order){
            if($order->status=='new') {
                $control=Html::a('Удалить', '/order/delete_user?id='.$order->id, [
                    'class' => 'btn btn-danger',
                    'data' => [
                      //  'confirm' => 'Подтвердите удаление этого заказа?',
                        'method' => 'post',
                    ],
                ]) ;
            } else $control='';
            echo "    <tr>
      <th scope=>{$order->name}</th>
      <td>{$order->price}</td>
      <td>{$order->count}</td>
      <td>{$order->date}</td>
      <td>{$order->status}</td>
      <td>{$order->reason}</td>
      <td>{$control}</td>
    </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
