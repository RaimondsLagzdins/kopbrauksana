<?php

use app\models\Cities;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

use kartik\base\Module;
use kartik\datetime\DateTimePicker;

use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Rides */
/* @var $form yii\widgets\ActiveForm */
/* @var $cities */
/* @var $cars */
?>

<div class="rides-form col-lg-6">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CITY_FROM_ID')->widget(Select2::classname(), [
        'data' => $cities,
        'options' => ['placeholder' => 'Pilsēta no kuras dosies braucienā'],
    ]); ?>

    <?= $form->field($model, 'CITY_TO_ID')->widget(Select2::classname(), [
        'data' => $cities,
        'options' => ['placeholder' => 'Pilsēta uz kuru brauksi'],
    ]); ?>

    <?= $form->field($model, 'CAR_ID')->dropDownList($cars) ?>

    <?= $form->field($model, 'DATE')->widget(DateTimePicker::classname(), [
        'name' => 'dp_1',
        //'type' => DateTimePicker::DATE_,
        'options' => [
                'class' => 'form-control',
                 'autocomplete'=>'off',
                'readonly' => true
        ],
        'language' => 'lv',
        'pluginOptions' => [
            'autoclose'=>true,
            'startDate'=> date('d-m-Y H:i',time() + 7200), // + 2 stundas
            'autocomplete' => 'off',
            'format' => 'dd-mm-yyyy hh:ii',
            'timeZone' => 'Europe/Riga',
        ],

    ])?>

    <?= $form->field($model, 'NOTES')->textarea(['maxlength' => true,'placeholder' => 'Ieraksti precīzu izbraukšanas vietu, ja vēlies, tad arī atlīdzību par braucienu']) ?>

    <div class="form-group">
        <?= Html::submitButton('Pievienot', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>
