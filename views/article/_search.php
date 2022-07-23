<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArticleSearh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'photo') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'count') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
