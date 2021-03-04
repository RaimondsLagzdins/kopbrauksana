<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rides".
 *
 * @property int $ID
 * @property int $CITY_FROM_ID
 * @property int $CITY_TO_ID
 * @property int $DRIVER_ID
 * @property string $DATE
 * @property int $CAR_ID
 * @property string $NOTES
 *
 * @property Cities $cITYFROM
 * @property Cities $cITYTO
 * @property Car $cAR
 * @property UserRides[] $userRides
 * @property User $uSER
 */
class Rides extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rides';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CITY_FROM_ID', 'CITY_TO_ID', 'DRIVER_ID', 'DATE', 'CAR_ID', 'NOTES'], 'required', 'message' => '{attribute} lauks nedrīkst būt tukšs'],
            [['CITY_FROM_ID', 'CITY_TO_ID', 'DRIVER_ID', 'CAR_ID'], 'integer'],
            [['DATE'], 'safe'],
            [['NOTES'], 'string', 'max' => 400],
            [['CITY_FROM_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['CITY_FROM_ID' => 'id']],
            [['CITY_TO_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['CITY_TO_ID' => 'id']],
            [['CAR_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['CAR_ID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'CITY_FROM_ID' => 'Pilsēta no',
            'CITY_TO_ID' => 'Pilsēta uz',
            'DRIVER_ID' => 'Vadītājs',
            'DATE' => 'Izbraukšanas laiks',
            'CAR_ID' => 'Mašīna',
            'NOTES' => 'Piezīmes',
        ];
    }

    /**
     * Atgriež brīvo vietu skaitu mašīnā
     */
    public function getSeatCount()
    {
        $car = Car::find()->where(['id' => $this->CAR_ID])->one();

        $availableSeatCount = $car->seats;
        $takenSeatCount = UserRides::find()->where(['RIDE_ID' => $this->ID, 'CANCELLED' => 0])->count();
        return  $availableSeatCount - $takenSeatCount;
    }

    /**
     * Atgriež vai braucienam ir pieteicies kāds braucējs
     */
    public function hasRiders()
    {
        $takenSeatCount = UserRides::find()->where(['RIDE_ID' => $this->ID, 'CANCELLED' => 0])->count();
        if($takenSeatCount == 0){
            return 0;
        }else{
            return 1;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCITYFROM()
    {
        return $this->hasOne(Cities::className(), ['id' => 'CITY_FROM_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCITYTO()
    {
        return $this->hasOne(Cities::className(), ['id' => 'CITY_TO_ID']);
    }

    public function getCAR()
    {
        return $this->hasOne(Car::className(), ['id' => 'CAR_ID']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRides()
    {
        return $this->hasMany(UserRides::className(), ['RIDE_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(User::className(), ['ID' => 'DRIVER_ID']);
    }
    /*
     * atgriež vadītāja vārdu
     */
    public function getDriverName()
    {
        return $this->hasOne(USER::className(), ['ID' => 'DRIVER_ID']);
    }

    public static function findById($id)
    {
        return self::findOne(['ID' => $id]);
    }
}
