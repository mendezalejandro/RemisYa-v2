<?php
use yii\widgets\DetailView;
use app\models\Vehiculos;
/* @var $this yii\web\View */
/* @var $model app\models\vehiculos */
?>
<div class="vehiculos-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Matricula',
            'Modelo',
            'Marca',
            ['label' => 'Estado',
            
            'value'=>function ($model){
                    switch($model->Estado) {
                       case Vehiculos::Estado_Habilitado:
                           $value = "Habilitado";
                           break;
                           case Vehiculos::Estado_Deshabilitado:
                           $value = "Deshabilitado";
                           break;
                       }
                    return $value;},
            ],
            'FechaAlta',
            'FechaBaja',
        ],
    ]) ?>

</div>
