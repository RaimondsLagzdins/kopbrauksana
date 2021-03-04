<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_rides".
 *
 * @property int $USER_ID
 * @property int $RIDE_ID
 * @property string $JOIN_DATE
 * @property int $CANCELLED
 *
 * @property User $uSER
 * @property Rides $rIDE
 */
class UserRides extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_rides';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['USER_ID', 'RIDE_ID'], 'required'],
            [['USER_ID', 'RIDE_ID', 'CANCELLED'], 'integer'],
            [['JOIN_DATE'], 'safe'],
            [['USER_ID', 'RIDE_ID'], 'unique', 'targetAttribute' => ['USER_ID', 'RIDE_ID']],
            [['USER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['USER_ID' => 'ID']],
            [['RIDE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Rides::className(), 'targetAttribute' => ['RIDE_ID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => 'User ID',
            'RIDE_ID' => 'Ride ID',
            'JOIN_DATE' => 'Join Date',
            'CANCELLED' => 'Atteicies',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(User::className(), ['ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRIDE()
    {
        return $this->hasOne(Rides::className(), ['ID' => 'RIDE_ID']);
    }

    /**
     * atgriež vai lietotājs ir pievienojies
     */
    public function isJoined()
    {
        return UserRides::find()->where(['RIDE_ID' => $this->RIDE_ID, 'USER_ID' => $this->USER_ID])->count();
    }
    /**
     * atgriež vai lietotājs ir iepriekš atteicies no brauciena
     */
    public function hasCancelled()
    {
        $model = UserRides::find()->where(['RIDE_ID' => $this->RIDE_ID, 'USER_ID' => $this->USER_ID])->one();
        if(isset($model)){
            return $model->CANCELLED;
        }
        return 0;
    }
}
