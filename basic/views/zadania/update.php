<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Zadania */

$this->title = "Aktualizacja zadania: {$model->opis}";
$this->params['breadcrumbs'][] = ['label' => 'Zadanie', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Aktualizacja';
?>
<div class="zadania-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'taskTypes' => $taskTypes,
        'taskStates' => $taskStates
    ]) ?>

</div>
