<?php


use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RegForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['id'=>'user-form']); ?>



    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_confirm')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')?>

    <?= $form->field($model, 'agree')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
