<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Rides';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-rides-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Rides', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'USER_ID',
            'RIDE_ID',
            'JOIN_DATE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
