<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TypZadania */

$this->title = 'Tworzenie nowego rodzaju zadań';
$this->params['breadcrumbs'][] = ['label' => 'Typ Zadanias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typ-zadania-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
