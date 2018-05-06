<?php
use yii\helpers\Url;
use app\models\Usuarios;
use app\models\Vehiculos;
use app\models\Viajes;
return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'VehiculoID',
        'value'=>function ($model){
            if($model->vehiculo == null)
            {return null;}
                else {return $model->vehiculo->Marca. ' '. $model->vehiculo->Modelo;}
            },
        'label'=>'Vehiculo',
        'filter' => \yii\helpers\ArrayHelper::map(Vehiculos::getVehiculos(), 'VehiculoID', function($model) {return $model['Marca'].' '.$model['Modelo'];}),
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'ChoferID',
         'value'=>function ($model){
            if($model->chofer == null)
        {return null;}
            else {return $model->chofer->Nombre. ' '. $model->chofer->Apellido;}},
         'label'=>'Chofer',
         'filter' => \yii\helpers\ArrayHelper::map(Usuarios::getChoferes(), 'UsuarioID', function($model) {return $model['Nombre'].' '.$model['Apellido'];}),
     ],
     [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nombreCompleto',
        /*'value'=>'persona.Apellido',*/
        'label'=>'Cliente',
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
     [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{view}',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
    ],

];   