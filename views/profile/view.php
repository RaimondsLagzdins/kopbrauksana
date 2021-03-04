<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\USER */

$this->title = $model->NAME;

\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Labot profila datus', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'USERNAME',
            'NAME',
            'SURNAME',
            'EMAIL:email',
            'PHONE',
        ],
    ]) ?>

</div>
