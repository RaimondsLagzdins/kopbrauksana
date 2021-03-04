<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
    <?php
    Yii::$app->mailer->compose()
        ->setTo('raimondsl99@gmail.com')
        ->setFrom(Yii::$app->params['senderEmail'])
        ->setReplyTo(Yii::$app->params['senderEmail'])
        ->setSubject('Kļūda produkcijā')
        ->setTextBody('Kļūda produkcijā '.$this->title)
        ->send();
    ?>

    <div class="text-center">
        <?php echo Html::img('@web/error.png', [
                'alt' => 'pic not found',
                'width' => '400px',
                'height' => '400px'
            ]
        );?>
    </div>

</div>
