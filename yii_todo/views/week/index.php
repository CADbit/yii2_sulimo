<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zadania';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php		
		$day = "";
		foreach ($tasks as $task){
			if($day != $task['datefrom']){
				$date = $task['datefrom'];
				echo "<h3>$date</h3>";
				$day = $task['datefrom'];
			}
			echo "<p>";
			echo $task['description'];
			echo "</p>";
		}
	?>
</div>
