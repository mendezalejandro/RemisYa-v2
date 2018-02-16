<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Usuarios;
use app\models\Vehiculos;
include \Yii::$app->basePath.'/models/Constantes.php';
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
        'value'=>function ($model){if($model->chofer == null){return null;}else {return $model->chofer->Nombre. ' '. $model->chofer->Apellido;}},
        'label'=>'Chofer',
        'filter' => \yii\helpers\ArrayHelper::map(Usuarios::getChoferes(), 'UsuarioID', function($model) {return $model['Nombre'].' '.$model['Apellido'];}),
    ],
     [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nombreCompleto',
        'label'=>'Cliente',
     ],
     [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'FechaEmision',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'FechaSalida',
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'OrigenDireccion',
         'label'=>'Origen'
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'DestinoDireccion',
         'label'=>'Destino'
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
              case ViajeEstado::Cancelado:
                  $value = "Cancelado";
                  break;
               case ViajeEstado::Finalizado:
                  $value = "Finalizado";
                  break;
              }
           return $value;}  ,
           'filter' => [ViajeEstado::En_viaje => 'En viaje', ViajeEstado::Cancelado => 'Cancelado',ViajeEstado::Finalizado => 'Finalizado'],
    ],
     [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'template' => '{view} {Asignar} {Finalizar}',
        'buttons' => [
            'Asignar' => function ($url, $model,$key) {
                return Html::a('<span class="glyphicon glyphicon-thumbs-up"></span>', Url::to(['asignar','id'=>$key]), [
                    'role'=>'modal-remote',
                    'title' => 'Asignar',
                    'data-pjax' => true,
                    'data-toggle' => 'tooltip',
                ]);
            },
            'Finalizar' => function ($url, $model,$key) {
                return Html::a('<span class="glyphicon glyphicon-thumbs-down"></span>', Url::to(['finalizar','id'=>$key]), [
                    'role'=>'modal-remote','title'=>'Finalizar', 
                            'data-pjax' => true,
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Finalizar viaje',
                          'data-confirm-message'=>'Desea marcar este viaje como finalizado?'
                ]);
            },              
        ],
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
    ],

];   