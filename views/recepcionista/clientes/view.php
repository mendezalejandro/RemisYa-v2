<?php

use yii\widgets\DetailView;
include \Yii::$app->basePath.'/models/Constantes.php';
/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
?>
<div class="clientes-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Nombre',
            'Apellido',
            'Documento',
            'Codigo',
            'Telefono',
            'Email:email',
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
