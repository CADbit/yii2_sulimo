<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TypZadania */

$this->title = '#'.$model->id.' '.$model->nazwa;
$this->params['breadcrumbs'][] = ['label' => 'Zadanie', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typ-zadania-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aktualizuj', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Jesteś pewien że chcesz usunąć ten wiersz?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nazwa',
        ],
    ]) ?>

</div>
