<?php

use yii\widgets\DetailView;
include \Yii::$app->basePath.'/models/Constantes.php';
/* @var $this yii\web\View */
/* @var $model app\models\Personas */
?>
<div class="personas-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Usuario',
            'Password',
            'Telefono',
            'Nombre',
            'Apellido',
            'Documento',
            'Email:email',
            ['label' => 'Estado',
            'value'=>function ($model){
                    switch($model->Estado) {
                       case PersonaEstado::Habilitado:
                           $value = "Habilitado";
                           break;
                           case PersonaEstado::Deshabilitado:
                           $value = "Deshabilitado";
                           break;
                       }
                    return $value;},
            ],
        ],
    ]) ?>

</div>
