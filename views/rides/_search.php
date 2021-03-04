<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\RidesSearch */
/* @var $form yii\widgets\ActiveForm */
/* @var $cityArray yii\widgets\ActiveForm */
?>

<div class="rides-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'post',
    ]); ?>

    <?= $form->field($model, 'CITY_FROM_ID')->widget(Select2::classname(), [
        'data' => $cityArray,
        'options' => ['placeholder' => 'Pilsēta no kuras vēlies doties (Atstāj tukšu, lai redzētu visus braucienus)'],
    ]); ?>

    <?= $form->field($model, 'CITY_TO_ID')->widget(Select2::classname(), [
        'data' => $cityArray,
        'options' => ['placeholder' => 'Pilsēta uz kuru vēlies doties (Atstāj tukšu, lai redzētu visus braucienus)'],
    ]); ?>
    <?= $form->field($model, 'DATE')->widget(DateTimePicker::classname(), [
        'options' => [
            'readonly' => true
        ],
        'language' => 'lv',
        'pluginOptions' => [
            'autoclose'=>true,
            'startDate'=> '+0d',
            'autocomplete' => 'off',
            'format' => 'dd-mm-yyyy',
            'timeZone' => 'Europe/Riga',
            'minView' => 2,
        ],
    ])?>

    <div class="form-group">
        <?= Html::submitButton('Atrast braucienu', ['class'=>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
