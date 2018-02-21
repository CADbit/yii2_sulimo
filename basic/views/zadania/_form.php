<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Zadania */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zadania-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'typ')->textInput() ?>

    <?= $form->field($model, 'opis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stan')->textInput() ?>

    <?= $form->field($model, 'dataod')->textInput() ?>

    <?= $form->field($model, 'datado')->textInput() ?>

    <?= $form->field($model, 'godzinaod')->textInput() ?>

    <?= $form->field($model, 'godzinado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
