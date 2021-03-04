<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PassCh */

$this->title = 'Paroles atjaunošana';

?>
<div class="pass-ch-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
