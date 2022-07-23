<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use app\models\Category;


/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php
    $li=[];
    $categories=Category::find()->all();
    foreach ($categories as $category){
        $li[$category->id]=$category->category;
    }

    ?>

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'photo')->fileInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList($li) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
