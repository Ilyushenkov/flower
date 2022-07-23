<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ShopOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'cart_id') ?>

    <?= $form->field($model, 'reason') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
