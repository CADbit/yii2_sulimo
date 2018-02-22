<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Zadania */

$this->title = substr($model->opis, 0, 10);
if(strlen($model->opis) > 10){
    $this->title .= '...';
}
$this->params['breadcrumbs'][] = ['label' => 'Zadanie', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zadania-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aktualizuj', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Jesteś pewien że chcesz usunąć to zadanie?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([

        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'typ',
                'value' => $model->typrelation->nazwa,
            ],
            'opis',
            [
                'label' => 'stan',
                'value' => $model->stanrelation->nazwa
            ],
            'dataod',
            'datado',
            'godzinaod',
            'godzinado',
        ],
    ]) ?>

</div>
