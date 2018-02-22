<?php

use kartik\date\DatePicker;
use kartik\time\TimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Zadania */
/* @var $form yii\widgets\ActiveForm */

$dateLayout = <<<HTML
    <span class="input-group-addon">Od dnia</span>
    {input1}
    <span class="input-group-addon"></span>
    <span class="input-group-addon">do dnia</span>
    {input2}
HTML;


?>

<div class="zadania-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'typ')->dropDownList($taskTypes) ?>

    <?= $form->field($model, 'opis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stan')->dropDownList($taskStates) ?>

    <?= DatePicker::widget([
        'model' => $model,
        'attribute' => 'dataod',
        'attribute2' => 'datado',
        'form' => $form,
        'type' => DatePicker::TYPE_RANGE,
        'layout' => $dateLayout,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ]
    ]) ?>

    <?= $form->field($model, 'godzinaod')->widget(TimePicker::class,
        [
            'pluginOptions' => [
                'minuteStep' => 10
            ]
        ]
    ) ?>
    <?= $form->field($model, 'godzinado')->widget(TimePicker::class,
        [
            'pluginOptions' => [
                'minuteStep' => 10
            ]
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Zapisz', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
