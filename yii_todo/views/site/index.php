<?php

/* @var $this yii\web\View */

$this->title = 'TODO Lista';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Gratulacje!</h1>

        <p class="lead">Aplikacja się uruchomiła</p>
    </div>

    <div class="body-content">

        <div class="row">
			
			<h2>TODO Lista</h2>
			<div id="md-content">
				<a class="btn btn-default" href="http://localhost/<?php echo Yii::$app->homeUrl; ?>?r=task/index">Zadania &raquo;</a>
				<br>
				<br>
				<a class="btn btn-default" href="http://localhost/<?php echo Yii::$app->homeUrl; ?>?r=type/index">Typy Zadań &raquo;</a>
				<br>
				<br>
				<a class="btn btn-default" href="http://localhost/<?php echo Yii::$app->homeUrl; ?>?r=week/index">Lista Zadań wg dat &raquo;</a>
				<br>
				<br>
				<a class="btn btn-default" href="http://localhost/<?php echo Yii::$app->homeUrl; ?>?r=week/list">Lista Zadań wg dat z AQ &raquo;</a>
            </div>
        </div>

    </div>
</div>
