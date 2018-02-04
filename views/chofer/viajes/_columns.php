<?php
use yii\helpers\Url;
include \Yii::$app->basePath.'/models/Constantes.php';
return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'VehiculoID',
        'value'=>'vehiculo.Marca',
        'label'=>'Vehiculo Marca',
    ],
     /*[
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'PersonaID',
         'value'=>'persona.Nombre',
         'label'=>'Cliente Nombre',
     ],*/
     [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'PersonaID',
        'value'=>'persona.Apellido',
        'label'=>'Cliente Apellido',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'FechaSalida',
     ],
     [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ViajeTipo',
        'value'=>function ($data){
             $value;
             switch($data->ViajeTipo) {
                case TipoViaje::Web:
                    $value = "Web";
                    break;
                case TipoViaje::Personal:
                    $value = "Personal";
                    break;
                case TipoViaje::Telefonico:
                    $value = "Telefonico";
                    break;
                }
             return $value;},
        'filter' => [ TipoViaje::Web => 'Web', TipoViaje::Personal => 'Personal', TipoViaje::Telefonico => 'Telefonico',],
         'label'=>'Tipo de viaje',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'DestinoDireccion',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'ImporteTotal',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'Distancia',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'Estado',
         'value'=>function ($data){
            $value;
            switch($data->Estado) {
               case ViajeEstado::En_viaje:
                   $value = "En viaje";
                   break;
               case ViajeEstado::Reservado:
                   $value = "Reservado";
                   break;
               case ViajeEstado::Cancelado:
                   $value = "Cancelado";
                   break;
                case ViajeEstado::Finalizado:
                   $value = "Finalizado";
                   break;
               }
            return $value;}  ,
            'filter' => [ViajeEstado::En_viaje => 'En viaje', ViajeEstado::Reservado => 'Reservado', ViajeEstado::Cancelado => 'Cancelado',ViajeEstado::Finalizado => 'Finalizado'],
     ],

];   