<?php
use yii\helpers\Url;
use app\models\Usuario;
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
         'attribute'=>'RolID',
         'value'=>'rol.Descripcion',
         'label'=>'Rol',
         'filter' => [ Usuarios::Rol_Administrador => 'Administrador', Usuarios::Rol_Recepcionista => 'Recepcionista', Usuarios::Rol_Chofer => 'Chofer'],
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
         'filter' => [ Usuarios::Estado_Habilitado => 'Habilitado', Usuarios::Estado_Deshabilitado => 'Deshabilitado'],
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