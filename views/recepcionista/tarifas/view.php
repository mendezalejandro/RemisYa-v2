<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tarifas */
?>
<div class="tarifas-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'TarifaID',
            'Comision',
            'AgenciaID',
            'ViajeMinimo',
            'KmMinimo',
            'PrecioKM',
            'Estado',
        ],
    ]) ?>

</div>
