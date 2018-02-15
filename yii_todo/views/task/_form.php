<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datefrom')->textInput() ?>
    
    <!-- XXX: MD TEST -->
    <!-- <?= $form->field($model, 'datefrom')->widget(\yii\jui\DatePicker::className(),[
        'language' => 'pl-PL',
        'dateFormat' => 'dd-MM-yyyy'
    ] 
            )
            
            ?>    -->

    <?= $form->field($model, 'dateto')->textInput() ?>

    <?= $form->field($model, 'timefrom')->textInput() ?>

    <?= $form->field($model, 'timeto')->textInput() ?>

    <?= $form->field($model, 'state')->textInput() ?>

    <?php
        $items = app\models\Type::find()->select(['name'])->indexBy('id')->column();
    ?>
    
    <?= $form->field($model, 'idtype')->dropDownList($items); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dodaj' : 'Zapisz', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
