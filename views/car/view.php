<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = $model->reg_nr;
\yii\web\YiiAsset::register($this);
?>
<div class="car-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aktualizēt', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Dzēst', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Vai jūs tiešām vēlaties dzēst šo mašīnu?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'reg_nr',
            'color',
            'make',
            'model',
            'seats',
        ],
    ]) ?>
    <?php echo Html::img('@web/uploads/'.$model->image_name, [
            'alt' => 'pic not found',
            'width' => '800px',
            'height' => '600px'
        ]
    );?>
</div>
