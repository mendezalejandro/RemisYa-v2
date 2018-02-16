<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Usuarios;
include \Yii::$app->basePath.'/models/Constantes.php';
return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
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
                   $value = "Solicitado";
                   break;
               case ViajeEstado::Cancelado:
                   $value = "Cancelado";
                   break;
                case ViajeEstado::Finalizado:
                   $value = "Finalizado";
                   break;
               }
            return $value;}
     ],
     [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'template' => '{view} {Aprobar} {Desaprobar}',
        'buttons' => [
            'Aprobar' => function ($url, $model,$key) {
                return Html::a('<span class="glyphicon glyphicon-thumbs-up"></span>', Url::to(['aprobar','id'=>$key]), [
                    'role'=>'modal-remote',
                    'title' => 'Aprobar',
                    'data-pjax' => true,
                    'data-toggle' => 'tooltip',
                ]);
            },
            'Desaprobar' => function ($url, $model,$key) {
                return Html::a('<span class="glyphicon glyphicon-thumbs-down"></span>', Url::to(['desaprobar','id'=>$key]), [
                    'role'=>'modal-remote','title'=>'Desaprobar', 
                            'data-pjax' => true,
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Está seguro?',
                          'data-confirm-message'=>'Está seguro que desaprobar esta solicitud?'
                ]);
            },              
        ],
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
    ],

];   