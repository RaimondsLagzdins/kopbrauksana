<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin panel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'USERNAME',
            'NAME',
            'SURNAME',
            'EMAIL:email',
            'REG_DATE',
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
