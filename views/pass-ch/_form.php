<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model app\models\PassCh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pass-ch-form col-lg-5">
    <?php if (Yii::$app->session->hasFlash('passwordChangeRequest')): ?>

        <div class="alert alert-success">
            Paroles atjaunošanas saite nosūtīta jums uz epastu
        </div>


    <?php else: ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'EMAIL')->textInput() ?>

    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton('Atjaunot paroli', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php endif; ?>
</div>
