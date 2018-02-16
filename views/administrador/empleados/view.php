<?php

use yii\widgets\DetailView;
include \Yii::$app->basePath.'/models/Constantes.php';
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
                       case UsuarioEstado::Habilitado:
                           $value = "Habilitado";
                           break;
                           case UsuarioEstado::Deshabilitado:
                           $value = "Deshabilitado";
                           break;
                       }
                    return $value;},
            ],
        ],
    ]) ?>

</div>
