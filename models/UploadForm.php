<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $imageName;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function upload()
    {


        if ($this->validate()) {
            $this->imageFile->saveAs('../web/uploads/' . $this->imageName);
            return true;
        } else {
            return false;
        }
    }
    public function attributeLabels()
    {
        return [
            'imageFile' => 'Attēls',
        ];
    }

}
