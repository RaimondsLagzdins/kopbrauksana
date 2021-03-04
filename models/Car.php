<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property string $reg_nr
 * @property string $color
 * @property string $make
 * @property string $model
 * @property int $seats
 * @property int $owner_id
 * @property string $image_name
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reg_nr', 'color', 'make', 'model', 'seats'], 'required','message' => '{attribute} nedrīkst būt tukšs'],
            [['seats'], 'integer'],
            [['reg_nr', 'color'], 'string', 'max' => 11],
            [['make', 'model'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reg_nr' => 'Reģistrācijas numurs',
            'color' => 'Krāsa',
            'make' => 'Ražotājs',
            'model' => 'Modelis',
            'seats' => 'vietu skaits',
        ];
    }
}
