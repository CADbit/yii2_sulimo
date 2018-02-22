<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StanZadania */

$this->title = 'Dodawanie stanu zadania';
$this->params['breadcrumbs'][] = ['label' => 'Stan zadania', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stan-zadania-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
