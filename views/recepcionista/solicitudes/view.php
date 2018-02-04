<?php

use yii\widgets\DetailView;
include \Yii::$app->basePath.'/models/Constantes.php';
/* @var $this yii\web\View */
/* @var $model app\models\Viajes */
?>
<div class="viajes-ver">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ViajeID',

            ['label' => 'Chofer','value'=>function ($model){return $model->chofer->Nombre. ' '. $model->chofer->Apellido;},],
            ['label' => 'Vehiculo','value'=>function ($model){return $model->vehiculo->Marca. ' '. $model->vehiculo->Modelo;},],
            ['label' => 'Cliente','value'=>function ($model){return $model->persona->Nombre. ' '. $model->persona->Apellido;},],
            'FechaEmision',
            'FechaSalida',
            [
                'label'=>'Tipo de viaje',
                'value'=>function ($data){
                     $value;
                     switch($data->ViajeTipo) {
                        case TipoViaje::Web:
                            $value = "Web";
                            break;
                        case TipoViaje::Personal:
                            $value = "Personal";
                            break;
                        case TipoViaje::Telefonico:
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
                      case ViajeEstado::En_viaje:
                          $value = "En viaje";
                          break;
                      case ViajeEstado::Reservado:
                          $value = "Reservado";
                          break;
                      case ViajeEstado::Cancelado:
                          $value = "Cancelado";
                          break;
                       case ViajeEstado::Finalizado:
                          $value = "Finalizado";
                          break;
                      }
                   return $value;}  ,
            ],
        ],
    ]) ?>

</div>
