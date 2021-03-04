<?php

namespace app\controllers;

use Yii;
use app\models\USER;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegisterController implements the CRUD actions for USER model.
 */
class RegisterController extends Controller
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
     * Lists all USER models.
     * @return mixed
     */
//    public function actionIndex()
//    {
//        $dataProvider = new ActiveDataProvider([
//            'query' => USER::find(),
//        ]);
//
//        return $this->render('index', [
//            'dataProvider' => $dataProvider,
//        ]);
//    }

    /**
     * Displays a single USER model.
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
     * Creates a new USER model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed           actionCreate
     */
    public function actionIndex()
    {
        $model = new USER();
        $btnText = 'Reģistrēties';

        if ($model->load(Yii::$app->request->post()) ) {
            $model->REG_DATE = date("Y-m-d");

            if($model->validate()) {
                // paroles saglabāšana hash formātā

                $model->PASSWORD = Yii::$app->getSecurity()->generatePasswordHash($model->PASSWORD);
                $model->save();

                return $this->redirect(['site/login']);
            } 
            return $this->render('create', [
                'model' => $model,
                'btnText' => $btnText
            ]); 
        }
        return $this->render('create', [
            'model' => $model,
            'btnText' => $btnText
        ]);
    }

    /**
     * Updates an existing USER model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $session = Yii::$app->session;

        $model = $this->findModel($id);
        $model->PASSWORD = null;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->PASSWORD = Yii::$app->getSecurity()->generatePasswordHash($model->PASSWORD);

            $model->save();


            return $this->redirect(['view', 'id' => $model->ID]);
        }
        $btnText = 'Aktualizēt';
        return $this->render('update', [
            'model' => $model,
            'btnText' => $btnText
        ]);
    }

    /**
     * Deletes an existing USER model.
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
     * Finds the USER model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return USER the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = USER::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
