<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StanZadaniaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Statusy zadań';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stan-zadania-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj nowy stan zadania', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nazwa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
