<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use app\modules\todo\models\Task;

/* @var $this yii\web\View */
/* @var $model app\modules\todo\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">
    <?php $defaultDate = date('Y-m-d'); ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList(Task::TYPES) ?>

    <?= $form->field($model, 'start_date')->widget(DatePicker::className(), [
            'clientOptions' => [
                'defaultDate' => $defaultDate
            ],
            'dateFormat' => 'yyyy-MM-dd'
        ]) ?>

    <?= $form->field($model, 'end_date')->widget(DatePicker::className(), [
            'clientOptions' => [
                'defaultDate' => $defaultDate
            ],
            'dateFormat' => 'yyyy-MM-dd'
        ]) ?>

    <?= $form->field($model, 'start_time')->dropDownList(Task::$TIMES) ?>

    <?= $form->field($model, 'end_time')->dropDownList(Task::$TIMES) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
