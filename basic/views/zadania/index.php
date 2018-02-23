<?php

use app\models\StanZadania;
use app\models\TypZadania;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ZadaniaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model \yii\base\Model*/
/* @var $month int*/
/* @var $year int*/

$this->title = 'Zadania';
$this->params['breadcrumbs'][] = $this->title;

$monthPrev = $monthNext = $month;
$yearPrev = $yearNext = $year;
if($month-1 == 0){
    $monthPrev = 12;
    $yearPrev -= 1;
}else{
    $monthPrev -= 1;
}

if($month+1 == 13){
    $monthNext = 1;
    $yearNext += 1;
}else{
    $monthNext += 1;
}


?>
<div class="zadania-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj zadanie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php $form = ActiveForm::begin()?>
    <?=Html::hiddenInput('m', $monthPrev)?>
    <?=Html::hiddenInput('y', $yearPrev)?>
    <?=Html::submitButton('Poprzedni miesiąc', ['class' => 'btn btn-success'])?>
    <?php ActiveForm::end()?>

    <?php $form = ActiveForm::begin()?>
    <?=Html::hiddenInput('m', $monthNext)?>
    <?=Html::hiddenInput('y', $yearNext)?>
    <?=Html::submitButton('Następny miesiąc', ['class' => 'btn btn-success'])?>
    <?php ActiveForm::end()?>

    <?=\app\widgets\WeekCalendar::widget([
        'model' => $model,
        'month' => $month,
        'year' => $year,
        'eventConfig' => [
            'title' => 'opis',
            'state' => 'stan',
            'description' => [
                'Rodzaj' => 'typrelation.nazwa'
            ],
            'stateCss' => [
                '1' => 'active',
                '2' => 'inactive',
                '3' => 'returned',
            ],
            'descriptionCss' => 'description',
            'dayFrom' => 'dataod',
            'dayTo' => 'datado',
            'timeFrom' => 'godzinaod',
            'timeTo' => 'godzinado',
        ]
    ])?>
</div>
