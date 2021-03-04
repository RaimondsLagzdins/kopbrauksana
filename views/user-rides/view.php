<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserRides */

$this->title = $model->USER_ID;
$this->params['breadcrumbs'][] = ['label' => 'User Rides', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-rides-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'USER_ID' => $model->USER_ID, 'RIDE_ID' => $model->RIDE_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'USER_ID' => $model->USER_ID, 'RIDE_ID' => $model->RIDE_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'USER_ID',
            'RIDE_ID',
            'JOIN_DATE',
        ],
    ]) ?>

</div>
