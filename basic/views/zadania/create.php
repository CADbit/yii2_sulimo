<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Zadania */

$this->title = 'Tworzenie zadania';
$this->params['breadcrumbs'][] = ['label' => 'Zadanie', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zadania-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'taskTypes' => $taskTypes,
        'taskStates' => $taskStates,
    ]) ?>

</div>
