<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode('Kopbraukšana') ?></title>
    <?php $this->head() ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167443930-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-167443930-1');
    </script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Kopbraukšana',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => ' navbar-inverse navbar-fixed-top',
        ],
    ]);
    $labels =[
        ['label' => 'Sākums', 'url' => ['/site/index']],
        ['label' => 'Saziņa', 'url' => ['/site/contact']],
    ];
    if(Yii::$app->user->isGuest){
        array_push($labels,['label' => 'Pieslēgties', 'url' => ['/site/login']],['label' => 'Reģistrēties', 'url' => ['/site/register']]);
    }else{
        array_push($labels, ['label' => 'Mani braucieni', 'url' => ['/rides/userrides']]);
        array_push($labels, ['label' => 'Mani transportlīzekļi', 'url' => ['/car/index']]);
        array_push($labels, ['label' => 'Profils', 'url' => ['/profile/view', 'id' => Yii::$app->user->getId()]]);
        if(Yii::$app->user->identity->ROLE == 20){
            array_push($labels,['label' => 'ADMIN PANELIS', 'url' => ['/admin/index']]);
        }
         array_push($labels,'<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Atslēgties (' . Yii::$app->user->identity->USERNAME . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>');

    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $labels
    ]
    );
    NavBar::end();

    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Raimonds Lagzdiņš <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
