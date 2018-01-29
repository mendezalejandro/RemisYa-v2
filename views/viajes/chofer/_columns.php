<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'vehiculo.Marca',
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'persona.Nombre',
         'header'=>'Cliente',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'FechaSalida',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'ViajeTipo',
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
     ],

];   