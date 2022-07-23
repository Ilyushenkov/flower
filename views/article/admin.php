<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Article;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearh */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Редактировать товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
        'attribute' => 'photo',
        'format' => 'html',    
        'value' => function ($data) {
            return Html::img('/web/assets/upload/'. $data['photo'],
                ['width' => '70px']);
        },
    ],
            'name',
            'price',
            //'count',
            'country',
            //'category_id',
            'color',
            //'date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Article $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>