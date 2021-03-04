<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "password_change".
 *
 * @property int $ID
 * @property int $EMAIL
 * @property string $PASSKEY
 * @property string $TIME_CREATED
 */
class PassCh extends \yii\db\ActiveRecord
{
    public $verifyCode;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'password_change';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EMAIL'], 'string',  'max' => 50],
            [['TIME_CREATED'], 'safe'],
            [['PASSKEY'], 'string', 'max' => 30],
            [['EMAIL'], 'required', 'message' => '{attribute} nedrīkst būt tukšs'],
            ['EMAIL', 'email','message' => 'Nav norādīta korekta epasta adrese'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha', 'message' => '{attribute} CAPTCHA kods nav aizpildīts pareizi'],
            [['EMAIL'],'filter', 'filter'=>'strtolower'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'EMAIL' => 'Epasts',
            'PASSKEY' => 'Passkey',
            'TIME_CREATED' => 'Time Created',
        ];
    }

    /**
     * @param $passkey
     * @return int
     * Pārbaude vai paroles maiņas saite ir vēl aktīva, ja laiks beidzies, returno 0
     */
    public function validatePassKey()
    {
        return PassCh::find()->where(['PASSKEY' => $this->PASSKEY])->andWhere(['>','TIME_CREATED', new Expression('timestamp(DATE_SUB(NOW(), INTERVAL 10 MINUTE))')]
        )->count();

    }


    public static function findByPassKey($passKey)
    {
        return self::findOne(['PASSKEY' => $passKey]);
    }
}
