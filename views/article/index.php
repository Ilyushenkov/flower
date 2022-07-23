<?php

use yii\helpers\Html;
use app\models\Category;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearh */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Каталог товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1 class="text-success"><?= Html::encode($this->title) ?></h1>
    <div class="border border-primary p-3 m-3">
        <h5 class="text-primary">Сортировка</h5>
        <div class="d-flex flex-row flex-wrap justify-content-lg-start">
        <div style="min-width: 150px;" class="border text-center m-1"><a href="/article/index?sort=price" class="border-primary">▲</a> По цене <a href="/article/index?sort=-price" class="border-primary">▼</a></div>
        <div style="min-width: 150px;" class="border text-center m-1"><a href="/article/index?sort=date" class="border-primary">▲</a> По новизне <a href="/article/index?sort=-date" class="border-primary">▼</a></div>
        <div style="min-width: 150px;" class="border text-center m-1"><a href="/article/index?sort=country" class="border-primary">▲</a> По стране происхождения <a href="/article/index?sort=-country" class="border-primary">▼</a></div>
        <div style="min-width: 150px;" class="border text-center m-1"><a href="/article/index?sort=name" class="border-primary">▲</a> По наименованию<a href="/article/index?sort=-name" class="border-primary">▼</a></div>
        </div>
        <div class="btn-group mt-3">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Фильтры по категориям
            </button>
            <div class="dropdown-menu">
                <a class='dropdown-item' href='/article/index?sort=-date'>Все товары</a>
                <?php $categories=Category::find()->orderBy(['category'=>SORT_ASC])->all();
                foreach ($categories as $category){
                    echo "
                    <a class='dropdown-item' href='/article/index?ArticleSearh[category_id]={$category->id}'>{$category->category}</a>
                    ";
                }?>
            </div>
        </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
<?php

$models=$dataProvider->models;
foreach ($models as $model){
 if ($model->count>0) {
     echo "
    <div class='card col-lg-3 m-3 p-1' style='width: 18rem;'>
  <a href='/article/view?id={$model->id}'><img src='../../web/assets/upload/{$model->photo}' class='card-img-top' alt='...'></a>
  <div class='card-body'>
    <h5 class='card-title'>{$model->name}</h5>
    <p class='card-text'>Цена: <span class='text-xl-center text-danger'>{$model->price} руб</span></p>";
     if (Yii::$app->user->isGuest) {
         echo "<a href='/article/view?id={$model->id}' class='btn btn-primary'>Подробнее</a>";
     } else {
         echo "<button class='btn btn-primary' onclick='add({$model->id}, 1)'>
Добавить в корзину
</button>";
     }
     echo '</div> 
</div>';
 }
    } ?>
    </div>
    </div>
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
<script src="/js/site.js"></script>
