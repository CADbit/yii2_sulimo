<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => 'Zadania', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aktualizuj', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Usuń', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Czy na pewno usunąć to zadanie?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'description',
            'datefrom',
            'dateto',
            'timefrom',
            'timeto',
                ['attribute' => 'state',
                'value' => $model->state ? "Tak" : "Nie",],
                [
                'attribute' => 'idtype',
                'value' => $model->idtype0->name,
                'widgetOptions' => [
                    'data' => ArrayHelper::map(app\models\Type::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
                ],
            ]
        ],
    ])
    ?>

</div>
