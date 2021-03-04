<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pass Ches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pass-ch-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pass Ch', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'USER_ID',
            'PASSKEY',
            'TIME_CREATED',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
