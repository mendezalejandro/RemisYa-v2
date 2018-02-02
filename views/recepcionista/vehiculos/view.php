<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\vehiculos */
?>
<div class="vehiculos-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'VehiculoID',
            'AgenciaID',
            'Matricula',
            'Modelo',
            'Marca',
            'Estado',
            'FechaAlta',
            'FechaBaja',
        ],
    ]) ?>

</div>
