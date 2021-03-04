<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model app\models\PassCh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pass-ch-form col-lg-5">
    <?php if (Yii::$app->session->hasFlash('linkExpired')): ?>

        <div class="alert alert-danger">
            Šī saite vairs nav derīga, lūdzu pieprasiet paroles atjaunošanu vēlreiz!
        </div>

    <?php else: ?>
        <?php if (Yii::$app->session->hasFlash('successfulPasswordChange')): ?>

            <div class="alert alert-success">
                Parole veiksmīgi nomainīta, varat pieteikties sitēmā!
            </div>

        <?php else: ?>
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'PASSWORD')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Saglabāt', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        <?php endif; ?>
    <?php endif; ?>
</div>
