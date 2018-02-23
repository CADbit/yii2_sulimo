<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \yii\base\Model */
/* @var $month int */
/* @var $year int */

$this->title = 'Zadania';
$this->params['breadcrumbs'][] = $this->title;

$months = [
    'styczeń', 'luty', 'marzec',
    'kwiecień', 'maj', 'czerwiec',
    'lipiec', 'sierpień', 'wrzesień',
    'październik', 'listopad', 'grudzień'
];
$years = [];//2 w przód i 2 w tyl
array_unshift($months, '');
unset($months[0]);
for($i = $year-2; $i <= $year+2; $i++){
    $years[$i] = $i;
}


?>
<div class="zadania-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj zadanie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php $form = ActiveForm::begin() ?>
    <?= Html::dropDownList('m', $month, $months, ['onchange' => 'this.form.submit()'])?>
    <?= Html::dropDownList('y', $year, $years, ['onchange' => 'this.form.submit()'])?>
    <?php ActiveForm::end() ?>

    <?= \app\widgets\WeekCalendar::widget([
        'model' => $model,
        'month' => $month,
        'year' => $year,
        'eventConfig' => [
            'title' => 'opis',
            'state' => 'stan',
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
            'detailLink' => [
                'controller' => 'zadania',
                'action' => 'view',
                'idParam' => 'id'
            ]
        ]
    ]) ?>
</div>
