<?php
use yii\widgets\DetailView;
include \Yii::$app->basePath.'/models/Constantes.php';
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
                       case VehiculoEstado::Habilitado:
                           $value = "Habilitado";
                           break;
                           case VehiculoEstado::Deshabilitado:
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
