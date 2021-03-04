<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserRides */

$this->title = 'Create User Rides';
$this->params['breadcrumbs'][] = ['label' => 'User Rides', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-rides-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
