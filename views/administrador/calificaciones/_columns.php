<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ViajeID',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Quien',
        'value'=>'quien.Apellido',
        'label'=>'Cliente Apellido',
     ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Puntaje',
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'Fecha',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'Comentario',
     ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{view}',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'Ver','data-toggle'=>'tooltip'],
    ],

];   