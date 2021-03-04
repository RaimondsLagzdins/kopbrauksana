<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = 'Pievienot transportlīdzekli';
?>
<div class="car-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (Yii::$app->session->hasFlash('needCar')): ?>

    <div class="alert alert-danger">
        Pirms brauciena pievienošanas lūdzu pievienojiet mašīnu ar kuru veiksiet braucienu!
    </div>
    <?php endif;?>
    <?= $this->render('_form', [
        'model' => $model,
        'upload' => $upload,
    ]) ?>

</div>
