<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ZadaniaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zadania-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'typ') ?>

    <?= $form->field($model, 'opis') ?>

    <?= $form->field($model, 'stan') ?>

    <?= $form->field($model, 'dataod') ?>

    <?php // echo $form->field($model, 'datado') ?>

    <?php // echo $form->field($model, 'godzinaod') ?>

    <?php // echo $form->field($model, 'godzinado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
