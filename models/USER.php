<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "USER".
 *
 * @property int $ID
 * @property string $USERNAME
 * @property string $NAME
 * @property string $SURNAME
 * @property string $PASSWORD
 * @property string $EMAIL
 * @property string $REG_DATE
 * @property string $AUTHKEY
 * @property string $ACCESSTOKEN
 * @property int $ROLE
 * @property int $BLOCKED
 * @property int $PHONE
 */
class USER extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $email;
    public $user;
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    public $oldPassword;
    public $newPassword;
    public $repeatPassword;

    const ROLE_USER = 10;
    const ROLE_ADMIN = 20;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'USER';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['USERNAME', 'NAME', 'SURNAME', 'EMAIL','PASSWORD', 'REG_DATE', 'PHONE'], 'required', 'message' => 'Lauks {attribute} nedrīkst būt tukšs'],
            [['REG_DATE'], 'safe'],
            [['EMAIL', 'USERNAME'], 'unique', 'message' => '{attribute} ir jau aizņemts, lūdzu mēģiniet citu'],
            [['USERNAME', 'NAME', 'SURNAME'], 'string', 'max' => 40],
            [['PASSWORD', 'oldPassword', 'newPassword', 'repeatPassword'], 'string', 'min' => 8, 'tooShort' => '{attribute} lauks nedrīkst būt īsāks par 8 simboliem'],
            [['EMAIL'], 'email', 'message' => '{attribute} nav pareiza epasta adrese'],
            [['AUTHKEY','ACCESSTOKEN'],'string',  'max' => 255],
            ['ROLE', 'default', 'value' => 10],
            ['ROLE', 'in', 'range' => [self::ROLE_USER, self::ROLE_ADMIN]],
            [['EMAIL', 'USERNAME'],'filter', 'filter'=>'strtolower'],
            ['USERNAME', 'match', 'pattern' => '/^[a-z0-9]+$/', 'message' => 'Izmantot tikai mazos burtus bez garuma un mīkstinājuma zīmēm'],
            ['newPassword', 'compare', 'compareAttribute' => 'repeatPassword', 'message' => 'parolēm jābūt vienādām'],
            ['repeatPassword', 'compare', 'compareAttribute' => 'newPassword', 'message' => 'parolēm jābūt vienādām'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'USERNAME' => 'Lietotājvārds',
            'NAME' => 'Vārds',
            'SURNAME' => 'Uzvārds',
            'PASSWORD' => 'Parole',
            'EMAIL' => 'Epasts',
            'REG_DATE' => 'Reģistrācijas datums',
            'PHONE' => 'Telefona numurs',
            'ROLE' => 'Lietotāja loma 10 - lietotājs 20- administrators',
            'oldPassword' => 'Vecā parole',
            'newPassword' => 'Jaunā parole',
            'repeatPassword' => 'Atkārtojiet paroli',
        ];
    }

    /**
     * {@inheritdoc}
     * @return USERQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new USERQuery(get_called_class());
    }

    public static function findByUsername($username)
    {

        return self::findOne(['USERNAME' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {


        return self::findOne(['ACCESSTOKEN' => $token]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->ID;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->AUTHKEY;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password){
        return password_verify($password, $this->PASSWORD);
    }

    public static function isUserAdmin($username)
    {
        if (static::findOne(['USERNAME' => $username, 'ROLE' => self::ROLE_ADMIN])){

            return true;
        } else {

            return false;
        }
    }
    public static function findByEmail($email)
    {
        return self::findOne(['EMAIL' => $email]);
    }

    public function updatePassword()
    {
        $this->PASSWORD = password_hash($this->PASSWORD, PASSWORD_ARGON2I);
        $this->save();

        return 1;
    }

    public function isBlocked()
    {
        return $this->BLOCKED;
    }

    public static function findById($id)
    {
        return self::findOne(['ID' => $id]);
    }
}
