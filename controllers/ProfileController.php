<?php

namespace app\controllers;

use Yii;
use app\models\USER;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfileController implements the CRUD actions for USER model.
 */
class ProfileController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','index','update','view'],
                'rules' => [
                    [
                        'actions' => ['create','index','update','view'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return !Yii::$app->user->isGuest;
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Displays a single USER model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if($id != Yii::$app->user->getId()){
            return $this->redirect(['view', 'id' => Yii::$app->user->getId()]);
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
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
        if($id != Yii::$app->user->getId()){
            return $this->redirect(['view', 'id' => Yii::$app->user->getId()]);
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpdatepassword($id)
    {
        if($id != Yii::$app->user->getId()){
            return $this->redirect(['view', 'id' => Yii::$app->user->getId()]);
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            if(!$model->validatePassword($model->oldPassword)){
                return $this->redirect(['view', 'id' => $model->ID]);
            }

            $model->PASSWORD = $model->newPassword;
            $model->updatePassword();

            $model->save();
            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('updatepassword', [
            'model' => $model,
        ]);
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
