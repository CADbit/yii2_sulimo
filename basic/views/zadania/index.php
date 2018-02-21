<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ZadaniaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zadanias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zadania-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Zadania', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'typ',
            'opis',
            'stan',
            'dataod',
            //'datado',
            //'godzinaod',
            //'godzinado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
