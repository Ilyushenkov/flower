<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = 'Создать товар';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">

    <h1 class="text-success"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
