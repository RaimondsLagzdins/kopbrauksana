<?php

namespace app\controllers;

use app\models\USER;
use app\models\UserRides;
use Yii;
use app\models\Rides;
use app\models\RidesSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\Cities;
use app\models\Car;
/**
 * RidesController implements the CRUD actions for Rides model.
 */
class RidesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'userrides','join'],
                'rules' => [
                    [
                        'actions' => ['create','userrides', 'join', 'view'],
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
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /*
   * metode atgriež, vai ir vadītājs
   */
    public function isDriver($rideId)
    {
        $rides = Rides::find()->where(['ID' => $rideId])->one();

        if(Yii::$app->user->getId() == $rides->DRIVER_ID){
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * Opens rides search form
     * @return mixed
     */
    public function actionSearch()
    {
        $searchModel = new RidesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $cityArray = ArrayHelper::map(Cities::find()->orderBy("name ASC")->all(), 'id', 'name');


        return $this->render('_search', [
            'model' => $searchModel,
            'dataProvider' => $dataProvider,
            'cityArray' => $cityArray,
        ]);
    }

    public function actionIndex()
    {
        $searchModel = new RidesSearch();
        $filter = Yii::$app->request->post();

        if(!isset(Yii::$app->session['_RideFilter']) || Yii::$app->request->post()) {
            Yii::$app->session['_RideFilter'] = $filter;
        }

        $dataProvider = $searchModel->search(Yii::$app->session['_RideFilter']);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'filter' => $filter,
        ]);
    }

    public function actionUserrides()
    {
        $searchModel = new RidesSearch();

        $dataProvider = $searchModel->searchUserRides();
        return $this->render('myrides', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rides model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $car = $model->cAR;

        return $this->render('view', [
            'model' => $model,
            'car'   => $car,
        ]);
    }

    /**
     * Creates a new Rides model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rides();
        $cities = ArrayHelper::map(Cities::find()->orderBy("name ASC")->all(), 'id', 'name');
        $cars = ArrayHelper::map(Car::find()->where(['owner_id' => Yii::$app->user->getId()])->all(), 'id', 'reg_nr');


        if(empty($cars)){
            Yii::$app->session->setFlash('needCar');
            return $this->redirect(['car/create']);
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->DRIVER_ID = Yii::$app->user->getId();
            $model->DATE = date("Y-m-d H:i", strtotime($model->DATE));

            $model->save();
            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('create', [
            'model' => $model,
            'cities' => $cities,
            'cars'  => $cars
        ]);
    }

    /**
     * Pievieno cilvēku braucienam
     * join_date nenorādu, jo datubāzē tiek izmantota default vērtība
     */
    public function actionJoin($id)
    {
        $model = new UserRides();

        $rideModel = new Rides();

        $riderModel = new USER();
        $driverModel = new USER();

        $model->RIDE_ID = $id;
        $model->USER_ID = Yii::$app->user->getId();

        $model->save();

        $rideModel = $rideModel->findById($id);
        $riderModel = $riderModel->findById(Yii::$app->user->getId());
        $driverModel = $driverModel->findById($rideModel->DRIVER_ID);

        $emailBody = $this->setEmailBody($rideModel, $riderModel);
        $this->contact($driverModel->EMAIL,$emailBody);

        return $this->redirect(['view','id' => $model->RIDE_ID]);
    }


    /**
     * Updates an existing Rides model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Rides model.
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
     * Finds the Rides model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rides the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rides::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function contact($email, $body)
    {
        Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom(Yii::$app->params['senderEmail'])
            ->setReplyTo(Yii::$app->params['senderEmail'])
            ->setSubject('Jauna informācija par braucienu!')
            ->setTextBody($body)
            ->send();
        return true;
    }
    public function setEmailBody(Rides $rideModel, USER $userModel)
    {
        $emailBody = 'Tavam braucienam no ' . $rideModel->cITYFROM->name . ' uz ' . $rideModel->cITYTO->name . ' ir jauns līdzbraucējs!  
Ja vēlies sakontaktēties, tava līdzbraucēja telefona numurs - ' . $userModel->PHONE;
        return $emailBody;
    }
}
