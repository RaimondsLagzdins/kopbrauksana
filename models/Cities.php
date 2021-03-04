<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property string $name
 * @property int $id
 * @property int $level
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'level'], 'required'],
            [['level'], 'integer'],
            [['name'], 'string', 'max' => 22],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'id' => 'ID',
            'level' => 'Level',
        ];
    }
}
