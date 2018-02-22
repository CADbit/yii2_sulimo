<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TypZadaniaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Typy zadań';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typ-zadania-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj nowy rodzaj zadań', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'nazwa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
