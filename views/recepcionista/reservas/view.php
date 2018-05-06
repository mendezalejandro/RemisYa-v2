<?php

use yii\widgets\DetailView;
use app\models\Viajes;
/* @var $this yii\web\View */
/* @var $model app\models\Viajes */
?>
<div class="viajes-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ViajeID',

            ['label' => 'Chofer',
            'value'=>function ($model){if($model->chofer == null){return null;}else {return $model->chofer->Nombre. ' '. $model->chofer->Apellido;}},
            ],
            ['label' => 'Vehiculo',
            'value'=>function ($model){if($model->vehiculo == null){return null;}else {return $model->vehiculo->Marca. ' '. $model->vehiculo->Modelo;}},
            ],
            ['label' => 'Cliente',
            'value'=>function ($model){if($model->persona == null){return null;}else {return $model->persona->Nombre. ' '. $model->persona->Apellido;}},
            ],
            'FechaEmision',
            'FechaSalida',
            [
                'label'=>'Tipo de viaje',
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
             ],
             ['label' => 'Origen','value'=>function ($model){return $model->OrigenDireccion;},],
             ['label' => 'Destino','value'=>function ($model){return $model->DestinoDireccion;},],
            'Comentario',
            'ImporteTotal',
            'Distancia',
            [
                'label' => 'Estado',
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
            ],
        ],
    ]) ?>

</div>
