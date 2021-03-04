<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\USER */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ROLE')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($btnText, ['class' => 'btn btn-success', 'name'=>'register']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
