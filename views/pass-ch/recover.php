<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PassCh */

$this->title = 'Paroles atjaunošana';

?>
<div class="pass-ch-recover">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('recoveryForm', [
        'model' => $model,
    ]) ?>

</div>
