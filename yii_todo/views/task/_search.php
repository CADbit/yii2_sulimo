<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'datefrom') ?>

    <?= $form->field($model, 'dateto') ?>

    <?= $form->field($model, 'timefrom') ?>

    <?php // echo $form->field($model, 'timeto') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'idtype') ?>

    <div class="form-group">
        <?= Html::submitButton('Wyszukaj', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Wyczyść', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
