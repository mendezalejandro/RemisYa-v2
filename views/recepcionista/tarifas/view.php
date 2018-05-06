<?php

use yii\widgets\DetailView;
use app\models\Tarifas;
/* @var $this yii\web\View */
/* @var $model app\models\tarifas */
?>
<div class="tarifas-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Comision',
            'ViajeMinimo',
            'KmMinimo',
            'PrecioKM',
            ['label' => 'Estado',
            'value'=>function ($model){
                    switch($model->Estado) {
                       case Tarifas::Estado_Habilitada:
                           $value = "Habilitada";
                           break;
                           case Tarifas::Estado_Deshabilitada:
                           $value = "Deshabilitada";
                           break;
                       }
                    return $value;},
            ],
        ],
    ]) ?>

</div>
