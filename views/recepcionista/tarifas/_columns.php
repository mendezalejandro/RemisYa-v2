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
        'attribute'=>'Comision',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ViajeMinimo',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'KmMinimo',
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'PrecioKM',
     ],
     [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Estado',
        'value'=>function ($model){
           switch($model->Estado) {
              case TarifaEstado::Habilitada:
                  $value = "Habilitada";
                  break;
                  case TarifaEstado::Deshabilitada:
                  $value = "Deshabilitada";
                  break;
              }
           return $value;},
        'filter' => [TarifaEstado::Habilitada => 'Habilitada', TarifaEstado::Deshabilitada => 'Deshabilitada'],
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
                          'data-confirm-title'=>'Está seguro?',
                          'data-confirm-message'=>'Está seguro que desea eliminar esta tarifa?'], 
    ],

];   