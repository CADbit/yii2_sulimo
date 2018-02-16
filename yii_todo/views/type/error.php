<?php

use yii\helpers\Html;

$this->title = $name;
$this->params['breadcrumbs'][] = ['label' => 'Typy zadań', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="has-error"><?= $comment ?></p>

    <?= Html::a('Powrót', ['index'], ['class' => 'btn btn-primary']) ?>
</div>