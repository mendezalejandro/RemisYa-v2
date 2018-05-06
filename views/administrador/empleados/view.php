<?php

use yii\widgets\DetailView;
use app\models\Usuarios;
/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
?>
<div class="personas-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'UsuarioID',
            'Usuario',
            'Password',
            'Telefono',
            'Nombre',
            'Apellido',
            'Documento',
            'Email:email',
            ['label' => 'Rol','value' => $model->rol->Descripcion,],
            ['label' => 'Estado',
            
            'value'=>function ($model){
                    switch($model->Estado) {
                       case Usuarios::Estado_Habilitado:
                           $value = "Habilitado";
                           break;
                           case Usuarios::Estado_Deshabilitado:
                           $value = "Deshabilitado";
                           break;
                       }
                    return $value;},
            ],
        ],
    ]) ?>

</div>
