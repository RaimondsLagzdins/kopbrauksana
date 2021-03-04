<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserRides */

$this->title = 'Update User Rides: ' . $model->USER_ID;
$this->params['breadcrumbs'][] = ['label' => 'User Rides', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->USER_ID, 'url' => ['view', 'USER_ID' => $model->USER_ID, 'RIDE_ID' => $model->RIDE_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-rides-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
