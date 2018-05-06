<?php
use yii\helpers\Url;
use app\models\Vehiculos;
return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Matricula',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Modelo',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Marca',
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'FechaAlta',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'FechaBaja',
     ],
     [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Estado',
        'value'=>function ($model){
           switch($model->Estado) {
              case Usuarios::Estado_Habilitado:
                  $value = "Habilitado";
                  break;
                  case Usuarios::Estado_Deshabilitado:
                  $value = "Deshabilitado";
                  break;
              }
           return $value;},
        'filter' => [Vehiculos::Estado_Habilitado => 'Habilitado', Vehiculos::Estado_Deshabilitado => 'Deshabilitado'],
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   