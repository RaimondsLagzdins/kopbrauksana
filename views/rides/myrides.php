<?php

use yii\helpers\Html;
use yii\grid\GridView;
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
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['header' => 'pilsēta no','attribute' => 'cITYFROM.name'],
            ['header' => 'pilsēta uz','attribute'  => 'cITYTO.name'],
            'DATE',
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
        'emptyText' => 'Ups, izskatās, ka neesi pievienojis nevienu braucienu!',
    ]); ?>


</div>
