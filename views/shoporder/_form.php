<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ShopOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'cart_id')->textInput() ?>

    <?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
