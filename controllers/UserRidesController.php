<?php

namespace app\controllers;

use Yii;
use app\models\UserRides;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserRidesController implements the CRUD actions for UserRides model.
 */
class UserRidesController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all UserRides models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UserRides::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserRides model.
     * @param integer $USER_ID
     * @param integer $RIDE_ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($USER_ID, $RIDE_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($USER_ID, $RIDE_ID),
        ]);
    }

    /**
     * Creates a new UserRides model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserRides();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'USER_ID' => $model->USER_ID, 'RIDE_ID' => $model->RIDE_ID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserRides model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $USER_ID
     * @param integer $RIDE_ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($USER_ID, $RIDE_ID)
    {
        $model = $this->findModel($USER_ID, $RIDE_ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'USER_ID' => $model->USER_ID, 'RIDE_ID' => $model->RIDE_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserRides model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $USER_ID
     * @param integer $RIDE_ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($USER_ID, $RIDE_ID)
    {

        $this->findModel($USER_ID, $RIDE_ID)->delete();

        return $this->redirect(['rides/index']);
    }
    public function actionCancel($USER_ID, $RIDE_ID)
    {

        $model = $this->findModel($USER_ID, $RIDE_ID);
        $model->CANCELLED = 1;
        $model->save();

        return $this->redirect(['rides/index']);
    }

    /**
     * Finds the UserRides model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $USER_ID
     * @param integer $RIDE_ID
     * @return UserRides the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($USER_ID, $RIDE_ID)
    {
        if (($model = UserRides::findOne(['USER_ID' => $USER_ID, 'RIDE_ID' => $RIDE_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
