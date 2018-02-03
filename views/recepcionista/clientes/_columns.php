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
        'attribute'=>'Usuario',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Nombre',
    ],
    [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'Apellido',
     ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Telefono',
    ],
    [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'Email',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'Documento',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'Estado',
         'value'=>function ($model){
            switch($model->Estado) {
               case PersonaEstado::Habilitado:
                   $value = "Habilitado";
                   break;
                   case PersonaEstado::Deshabilitado:
                   $value = "Deshabilitado";
                   break;
               }
            return $value;},
         'filter' => [ PersonaEstado::Habilitado => 'Habilitado', PersonaEstado::Deshabilitado => 'Deshabilitado'],
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
                          'data-confirm-message'=>'Está seguro que desea eliminar este cliente? Tenga en cuenta que si el mismo tiene viajes realizados no podrá realizar esta operación.'], 
    ],

];   