<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\UserRides;



use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRequest;

/* @var $this yii\web\View */
/* @var $model app\models\Rides */
/* @var $car app\models\Car */

\yii\web\YiiAsset::register($this);
?>
<div class="rides-view col-lg-6">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
                $userRides = new UserRides();
                $userRides->USER_ID = Yii::$app->user->getId();
                $userRides->RIDE_ID = $model->ID;

                if($model->DRIVER_ID != Yii::$app->user->getId()){
                    if ($userRides->isJoined() == 0){
                        if($model->getSeatCount() > 0){
                            echo Html::a('Pieteikties', ['join','id' => $model->ID], [
                                'class' => 'btn btn-success']);
                        }
                    }else{
                        if(!$userRides->hasCancelled()){
                            echo Html::a('Atteikties', ['/user-rides/cancel','RIDE_ID' => $model->ID, 'USER_ID' => Yii::$app->user->getId()], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Vai tiešām vēlies atteikties no brauciena?
Pēc tam vairs nevarēsi pievienoties!',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                    }
                }else{
                    if(!$model->hasRiders()){
                        echo Html::a('Dzēst braucienu', ['delete', 'id' => $model->ID], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]);
                    }

                }
        ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                [
                    'label' => 'Pilsēta no',
                    'attribute'  => 'cITYFROM.name',
                ],
                [
                    'label' => 'Pilsēta uz',
                    'attribute'  => 'cITYTO.name',
                ],
                [
                    'label' => 'Epasts',
                    'attribute'  => 'uSER.EMAIL',
                ],
            'DATE',
            'NOTES',
        ],
    ]) ?>

        <?php echo Html::img('@web/uploads/'.$car->image_name, [
                'alt' => 'pic not found',
                'width' => '500px',
                'height' => '400px'
            ]
        );?>
    </div>


<?php

$geo_coding_client = new \dosamigos\google\maps\services\GeocodingClient();

$map = new \dosamigos\google\maps\Map([
    'center' => new \dosamigos\google\maps\LatLng(['lat' => 52.1326, 'lng' => 5.2913]),
    'zoom'   => 7,
]);

$lookup_response = $geo_coding_client->lookup([
    'address' => $model->cITYFROM->name,
    'region'  => 'Latvia',
]);

$lat_from = isset($lookup_response['results'][0]['geometry']['location']['lat']) ? $lookup_response['results'][0]['geometry']['location']['lat'] : null;
$lng_from = isset($lookup_response['results'][0]['geometry']['location']['lng']) ? $lookup_response['results'][0]['geometry']['location']['lng'] : null;

$lookup_response = $geo_coding_client->lookup([
    'address' => $model->cITYTO->name,
    'region'  => 'Latvia',
]);

$lat_to = isset($lookup_response['results'][0]['geometry']['location']['lat']) ? $lookup_response['results'][0]['geometry']['location']['lat'] : null;
$lng_to = isset($lookup_response['results'][0]['geometry']['location']['lng']) ? $lookup_response['results'][0]['geometry']['location']['lng'] : null;

$lat = isset($lookup_response['results'][0]['geometry']['location']['lat']) ? $lookup_response['results'][0]['geometry']['location']['lat'] : null;



$coord = new LatLng(['lat' => $lat_from, 'lng' => $lat_from]);
$map = new Map([
    'center' => $coord,
    'zoom' => 7,
]);

// lets use the directions renderer
$from = new LatLng(['lat' => $lat_from, 'lng' => $lng_from]);
$to = new LatLng(['lat' => $lat_to, 'lng' => $lng_to]);

$directionsRequest = new DirectionsRequest([
    'origin' => $from,
    'destination' => $to,
    'travelMode' => TravelMode::DRIVING
]);

// Lets configure the polyline that renders the direction
$polylineOptions = new PolylineOptions([
    'strokeColor' => '#FFAA00',
    'draggable' => true
]);

// Now the renderer
$directionsRenderer = new DirectionsRenderer([
    'map' => $map->getName(),
    'polylineOptions' => $polylineOptions
]);

// Finally the directions service
$directionsService = new DirectionsService([
    'directionsRenderer' => $directionsRenderer,
    'directionsRequest' => $directionsRequest
]);

// Thats it, append the resulting script to the map
$map->appendScript($directionsService->getJs());

// Lets add a marker now
$marker = new Marker([
    'position' => $coord,
    'title' => 'My Home Town',
]);


// Display the map -finally :)
echo $map->display();
?>

</div>

