<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mani transportlīdzekļi';
?>
<div class="car-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Pievienot transportlīdzekli', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'reg_nr',
            'color',
            'make',
            'model',
            'seats',
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'emptyText' => 'Ups, izskatās, ka neesi pievienojis nevienu transportlīdzekli!',
    ]); ?>


</div>
