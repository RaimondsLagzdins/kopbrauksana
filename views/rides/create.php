<?php

use yii\helpers\Html;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Rides */

$this->title = 'Pievieno braucienu';
?>
<div class="rides-create">

    <?= $this->render('_form', [
        'model' => $model,
        'cities' => $cities,
        'cars'  =>$cars,
    ]) ?>

</div>
