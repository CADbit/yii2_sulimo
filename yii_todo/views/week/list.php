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
			if($day != $task['Data']){
				$day = $task['Data'];
				echo "<h3>$day</h3>";
			}
			echo "<p>";
			echo $task['Godzina']."<br>&nbsp;&nbsp;&nbsp;&nbsp;".$task['Zadanie']." (".$task['Typ'].")";
                        echo "<br>".$task['Koniec'];
			echo "</p><hr>";
		}
	?>
</div>
