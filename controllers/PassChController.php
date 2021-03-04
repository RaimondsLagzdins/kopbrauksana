<?php

namespace app\controllers;

use app\models\USER;
use Yii;
use app\models\PassCh;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use yii\base\Security;

/**
 * PassChController implements the CRUD actions for PassCh model.
 */
class PassChController extends Controller
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

    public function actionRecover($passkey)
    {
        $model = PassCh::findByPassKey($passkey);
        $user = USER::findByEmail($model->EMAIL);

        if(!$model->validatePassKey()){
            Yii::$app->session->setFlash('linkExpired');
        }
        if ($user->load(Yii::$app->request->post())) {
            $user->updatePassword();
            Yii::$app->session->setFlash('successfulPasswordChange');
        }
        $user->PASSWORD = '';
        return $this->render('recover', [
            'model' => $user,
        ]);
    }

    /**
     * Creates a new PassCh model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PassCh();

        if ($model->load(Yii::$app->request->post())) {

            $model->PASSKEY = Yii::$app->security->generateRandomString(30);

            $emailBody = 'http://raimondsl.id.lv/pass-ch/recover?passkey='.$model->PASSKEY;

            $model->save();
            if($this->checkUser($model->EMAIL)){
                $this->contact($model->EMAIL, $emailBody);
            }

            Yii::$app->session->setFlash('passwordChangeRequest');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Finds the PassCh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PassCh the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PassCh::findOne($id)) !== null) {
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
            ->setSubject('Paroles atjaunošana')
            ->setTextBody($body)
            ->send();

        return true;
    }
    public function checkUser($email)
    {
        $userCount = USER::find()->where(['EMAIL' => $email])->count();
        return $userCount;
    }
}
