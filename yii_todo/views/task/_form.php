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

    <div class="row">
        <div class="col-lg-4">
            <?=
            $form->field($model, 'datefrom')->widget(\yii\jui\DatePicker::className(), [
                'language' => 'pl-PL',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['style' => 'width:250px;', 'class' => 'form-control']
                    ]
            )
            ?>    

            <?=
            $form->field($model, 'dateto')->widget(\yii\jui\DatePicker::className(), [
                'language' => 'pl-PL',
                'dateFormat' => 'yyyy-MM-dd',
                'options' => ['style' => 'width:250px;', 'class' => 'form-control']
                    ]
            )
            ?>
        </div>
        <div class="col-lg-4">    
            <?=
            $form->field($model, 'timefrom')->widget(kartik\time\TimePicker::className(), [
                'pluginOptions' => [
                    'minuteStep' => '15',
                    'showMeridian' => false,
                ]
                    ]
            )
            ?>

            <?=
            $form->field($model, 'timeto')->widget(kartik\time\TimePicker::className(), [
                'pluginOptions' => [
                    'minuteStep' => '15',
                    'showMeridian' => false,
                ]
                    ]
            )
            ?>
        </div>
    </div>

    <?php
    $states = array(
        '0' => 'Aktywny',
        '1' => 'Zakończony',
            )
    ?>

    <?= $form->field($model, 'state')->dropDownList($states) ?>

    <?php
    $items = app\models\Type::find()->select(['name'])->indexBy('id')->column();
    ?>

    <?= $form->field($model, 'idtype')->dropDownList($items); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dodaj' : 'Zapisz', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
