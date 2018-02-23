<?php

namespace app\controllers;

use app\models\StanZadania;
use app\models\TypZadania;
use Codeception\PHPUnit\ResultPrinter\Report;
use Yii;
use app\models\Zadania;
use app\models\ZadaniaSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ZadaniaController implements the CRUD actions for Zadania model.
 */
class ZadaniaController extends Controller
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
     * Lists all Zadania models.
     * @return mixed
     */
    public function actionIndex()
    {
        $month = Yii::$app->request->post('m');
        $year = Yii::$app->request->post('y');
        $model = Zadania::find()->all();

        return $this->render('index', [
            'month' => $month,
            'year' => $year,
            'model' => $model
        ]);
    }

    /**
     * Displays a single Zadania model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Zadania model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Zadania();
        $taskTypes = ArrayHelper::map(TypZadania::find()->all(), 'id', 'nazwa');
        $taskStates = ArrayHelper::map(StanZadania::find()->all(), 'id', 'nazwa');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'taskTypes' => $taskTypes,
            'taskStates' => $taskStates
        ]);
    }

    /**
     * Updates an existing Zadania model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $taskTypes = ArrayHelper::map(TypZadania::find()->all(), 'id', 'nazwa');
        $taskStates = ArrayHelper::map(StanZadania::find()->all(), 'id', 'nazwa');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'taskTypes' => $taskTypes,
            'taskStates' => $taskStates
        ]);
    }

    /**
     * Deletes an existing Zadania model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Zadania model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Zadania the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Zadania::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
