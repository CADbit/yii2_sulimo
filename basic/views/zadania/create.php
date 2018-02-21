<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Zadania */

$this->title = 'Create Zadania';
$this->params['breadcrumbs'][] = ['label' => 'Zadanias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zadania-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
