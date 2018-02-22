<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypZadania */

$this->title = 'Aktualizacja typu zadania: '.$model->nazwa;
$this->params['breadcrumbs'][] = ['label' => 'Typ zadania', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nazwa, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Aktualizacja';
?>
<div class="typ-zadania-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
