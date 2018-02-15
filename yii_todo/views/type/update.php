<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Type */

$this->title = 'Aktualizowanie typu: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Typy zadań', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Aktualizowanie typu';
?>
<div class="type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
