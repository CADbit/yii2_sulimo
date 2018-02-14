<?php

namespace app\controllers;

use Yii;
use app\models\Task;
use app\models\TaskSearch;
use app\models\Type;
use app\models\TypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WeekController displays tasks for whole week.
 */
 class WeekController extends Controller
{
	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
	
	/**
     * Lists all Type models.
     * @return mixed
     */
    public function actionIndex()
    {
		$connection = Yii::$app->db;
		$command = $connection->createCommand('SELECT * FROM yii_todo.task ta join `type` ty on ta.idtype = ty.id order by datefrom,timefrom;');
		
		$fulltasks = $command->queryAll();
		
        return $this->render('index', ['tasks' => $fulltasks]);
    }
}