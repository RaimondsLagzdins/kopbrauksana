<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\UserRides;
use yii\web\UrlManager;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RidesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Braucieni';
?>
<div class="rides-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Piedāvā braucienu', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Atrast citu ', ['search'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['header' => 'Pilsēta no','attribute' => 'cITYFROM.name'],
            ['header' => 'Pilsēta uz','attribute' => 'cITYTO.name'],
            'DRIVER_ID' => 'driverName.NAME',
            'DATE',
            [
            'header' => 'Vietu skaits',
            'value' => function($model){
                            return $model->getSeatCount();
                        }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {myButton}',
                'buttons' => [
                    'myButton' => function($url, $dataProvider, $key) {

                        return Html::a('Apskatīt', ['view','id' => $dataProvider->ID], [
                            'class' => 'btn btn-success']);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
