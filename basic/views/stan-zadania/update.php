<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StanZadania */

$this->title = 'Aktualizacja: '.$model->nazwa;
$this->params['breadcrumbs'][] = ['label' => 'Stan zadania', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nazwa, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Aktualizacja';
?>
<div class="stan-zadania-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
