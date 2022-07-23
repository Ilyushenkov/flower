<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Cart;
use app\models\Article;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CartSearh */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-index">

    <h1 class="text-success"><?= Html::encode($this->title) ?></h1>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Наимменование</th>
            <th scope="col">Цена</th>
            <th scope="col">Количество</th>
            <th scope="col">Управление</th>
        </tr>
        </thead>
<?php
$user=Yii::$app->user;
$carts=Cart::findAll(['user_id'=>\Yii::$app->user->id]);
foreach ($carts as $cart){
    $article=Article::find()->where(['id'=>$cart->article_id])->one();
    $name=$article->name;
    $price=$article->price;

    echo "    
    <tr>
      <th scope='row'>{$name}</th>
      <td>{$price}</td>
      <td>{$cart->count}</td>
      <td><button class='btn btn-outline-primary mr-3' onclick='update(this.parentNode.parentNode.rowIndex, {$cart->article_id}, 1)'>+</button>
      <button class='btn btn-outline-primary mr-3' onclick='update(this.parentNode.parentNode.rowIndex, {$cart->article_id}, -1)'>-</button>
      </td>
    </tr>
    ";
}
?>
    </table>
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
    <div id="confirm">
    <h1 class="text-success m-3">Оформление заказа</h1>
    <div class="d-flex flex-row flex-wrap border border-success m-3">
        <div style="min-width: 300px;" class="m-4"><p>Введите пароль</p></div>
        <div style="min-width: 300px;" class="m-4"><input class="form-control" type="password" id="password"/></div>
    </div>
    <button class="btn btn-primary btn-lg" onclick="order_confirm(<?= $user->id ?>, document.getElementById('password').value)">Подтвердить заказ</button>
</div>
<script src="/js/site.js"></script>
