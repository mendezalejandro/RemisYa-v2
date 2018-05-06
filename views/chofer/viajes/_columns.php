<?php
use yii\helpers\Url;
use app\models\Viajes;
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
         'attribute'=>'UsuarioID',
         'value'=>'persona.Nombre',
         'label'=>'Cliente Nombre',
     ],*/
     [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'UsuarioID',
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
                case Viajes::Tipo_Web:
                    $value = "Web";
                    break;
                case Viajes::Tipo_Personal:
                    $value = "Personal";
                    break;
                case Viajes::Tipo_Telefonico:
                    $value = "Telefonico";
                    break;
                }
             return $value;},
        'filter' => [ Viajes::Tipo_Web => 'Web', Viajes::Tipo_Personal => 'Personal', Viajes::Tipo_Telefonico => 'Telefonico',],
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
               case Viajes::Estado_EnViaje:
                   $value = "En viaje";
                   break;
               case Viajes::Estado_Reservado:
                   $value = "Reservado";
                   break;
               case Viajes::Estado_Cancelado:
                   $value = "Cancelado";
                   break;
                case Viajes::Estado_Finalizado:
                   $value = "Finalizado";
                   break;
               }
            return $value;}  ,
            'filter' => [Viajes::Estado_EnViaje => 'En viaje', Viajes::Estado_Reservado => 'Reservado', Viajes::Estado_Cancelado => 'Cancelado',Viajes::Estado_Finalizado => 'Finalizado'],
     ],

];   