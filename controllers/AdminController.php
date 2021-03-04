<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\USER;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
class AdminController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','update','delete','view'],
                'rules' => [
                    [
                        'actions' => ['index','update','delete','view'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserAdmin(Yii::$app->user->identity->USERNAME);
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => USER::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->ID]);
        }
        return $this->render('update', [
            'model' => $model,
            'btnText' => 'aktualizēt'
        ]);
    }

    protected function findModel($id)
    {
        if (($model = USER::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionBlock($id)
    {
        $model = $this->findModel($id);
        $model->BLOCKED = 1;
        $model->save();

        return $this->render('view', [
            'model' => $model
        ]);
    }
    public function actionUnblock($id)
    {
        $model = $this->findModel($id);
        $model->BLOCKED = 0;
        $model->save();

        return $this->render('view', [
            'model' => $model
        ]);
    }
}
