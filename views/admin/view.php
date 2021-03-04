<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\USER */

$this->title = $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aktualizēt', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Dzēst', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Vai jūs tiešām vēlieties dzēst lietotāju?',
                'method' => 'post',
            ],
        ]) ?>

        <?php
            if($model->isBlocked()){
                echo Html::a('Atbloķēt!', ['unblock', 'id' => $model->ID], [
                    'class' => 'btn btn-success',
                    'data' => [
                        'confirm' => 'Vai jūs tiešām vēlieties atbloķēt lietotāju?',
                        'method' => 'post',
                    ],
                ]);
            }else{
                echo Html::a('Bloķēt!', ['block', 'id' => $model->ID], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Vai jūs tiešām vēlieties bloķēt lietotāju?',
                        'method' => 'post',
                    ],
                ]);
            }
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'USERNAME',
            'NAME',
            'SURNAME',
            'EMAIL:email',
            'REG_DATE',
        ],
    ]) ?>

</div>
