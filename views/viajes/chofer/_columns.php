<?php
use yii\helpers\Url;

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
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'PersonaID',
         'value'=>'persona.Nombre',
         'label'=>'Cliente Nombre',
     ],
     /*[
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'PersonaID',
        'value'=>'persona.Apellido',
        'label'=>'Cliente Apellido',
     ],*/
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
                case 0:
                    $value = "Web";
                    break;
                case 1:
                    $value = "Personal";
                    break;
                case 2:
                    $value = "Telefonico";
                    break;
                }
             return $value;}            
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
               case 0:
                   $value = "En viaje";
                   break;
               case 1:
                   $value = "Solicitado";
                   break;
               case 2:
                   $value = "Cancelado";
                   break;
                case 3:
                   $value = "Finalizado";
                   break;
               }
            return $value;}  
     ],

];   