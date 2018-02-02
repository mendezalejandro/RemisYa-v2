<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Calificaciones */
?>
<div class="calificaciones-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ViajeID',
            ['label' => 'Cliente','value' => $model->quien->Apellido,],
            ['label' => 'Chofer','value' => $model->paraQuien->Apellido,],
            'Puntaje',
            'Fecha',
            'Comentario',
            ['label' => 'Agencia','value' => $model->agencia->Nombre,],
        ],
    ]) ?>

</div>
