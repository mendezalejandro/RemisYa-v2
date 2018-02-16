<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Viajes */
?>
<div class="viajes-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ViajeID',
            'ChoferID',
            'VehiculoID',
            'TarifaID',
            'TurnoID',
            'AgenciaID',
            'UsuarioID',
            'FechaEmision',
            'FechaSalida',
            'ViajeTipo',
            'OrigenCoordenadas',
            'DestinoCoordenadas',
            'OrigenDireccion',
            'DestinoDireccion',
            'Comentario',
            'ImporteTotal',
            'Distancia',
            'Estado',
        ],
    ]) ?>

</div>
