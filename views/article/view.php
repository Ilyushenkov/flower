<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Category;


/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$category=Category::findOne(['id'=>$model->category_id])->category;
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>Категория:
        <?php echo $category;?>
    </p>
    <img src="../../web/assets/upload/<?=$model->photo?>" alt="Изображение товара" class="img-thumbnail m-2"/>
    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'photo',
            'name',
            'price',
            'count',
            'country',
           // 'category_id',
            'color',
            'date',
        ],
    ]);
    if (!Yii::$app->user->isGuest) echo "<button class='btn btn-primary' onclick='add({$model->id}, 1)'>В корзину</button>";
    ?>

    <script src="../../web/js/site.js"></script>
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
</div>
