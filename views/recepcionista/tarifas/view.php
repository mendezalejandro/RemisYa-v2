<?php

use yii\widgets\DetailView;
include \Yii::$app->basePath.'/models/Constantes.php';
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
                       case TarifaEstado::Habilitada:
                           $value = "Habilitada";
                           break;
                           case TarifaEstado::Deshabilitada:
                           $value = "Deshabilitada";
                           break;
                       }
                    return $value;},
            ],
        ],
    ]) ?>

</div>
