<?php

use app\models\StanZadania;
use app\models\TypZadania;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ZadaniaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zadania';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zadania-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj zadanie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'typ',
                'value' => 'typrelation.nazwa',
                'filter' => ArrayHelper::map(TypZadania::find()->all(), 'id', 'nazwa')
            ],
            'opis',
            [
                'attribute' => 'stan',
                'value' => 'stanrelation.nazwa',
                'filter' => ArrayHelper::map(StanZadania::find()->all(), 'id', 'nazwa')
            ],
            'dataod',
            'datado',
            'godzinaod',
            'godzinado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
