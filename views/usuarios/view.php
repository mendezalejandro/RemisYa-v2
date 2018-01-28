<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
?>
<div class="usuarios-view">
 
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
            'RolID',
            'Estado',
        ],
    ]) ?>

</div>
