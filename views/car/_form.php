<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Car */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="col-lg-12">
            <div class="col-lg-6">
                <?= $form->field($model, 'reg_nr')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'make')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'seats')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-lg-6">
                <?= $form->field($upload, 'imageFile')->widget(FileInput::classname(), [
                    'options' => [
                        'accept' => 'image/*',
                        'multiple'=>false,
                    ],
                    'pluginOptions' => [
                        'showUpload' => false,
                    ]
                ]);?>
            </div>
        </div>
            <div class="form-group">
                <?= Html::submitButton('Saglabāt', ['class' => 'btn btn-success','style' => 'margin-left: 30px;'] ) ?>
            </div>


    <?php ActiveForm::end(); ?>

</div>
