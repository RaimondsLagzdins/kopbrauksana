<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'My Yii Application';
?>
<div class="site-index background-image">

    <div class="jumbotron main-font">
        <h1>Kopbraukšana!</h1>

    </div>

    <div class="body-content main-font">

        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <h2 class="main-font-heading">Atrodi braucienu!</h2>

                <p>Vēlies ietaupīt naudu un laiku, lai nokļūtu no vienas pilsētas uz citu? Spied uz pogas zemāk, lai atrastu braucienu.</p>

                <?= Html::a('Atrodi braucienu', ['/rides/search'], ['class'=>'btn btn-primary']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <h2 class="main-font-heading">Piedāvā braucienu!</h2>

                <p>Vēlies atrast kopbraucēju, lai
                    samazinātu sava ceļa izmaksas? </p>
                <?= Html::a('Piedāvā braucienu', ['/rides/create'], ['class'=>'btn btn-primary']) ?>
            </div>
        </div>

    </div>
</div>
