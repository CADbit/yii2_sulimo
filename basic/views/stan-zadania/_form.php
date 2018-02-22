<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StanZadania */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stan-zadania-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nazwa')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Zapisz', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
