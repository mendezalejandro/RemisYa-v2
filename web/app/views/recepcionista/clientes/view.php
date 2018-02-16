<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Clientes */
?>
<div class="clientes-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ClienteID',
            'Nombre',
            'Apellido',
            'Documento',
            'Telefono',
            'Email:email',
            'Estado',
            'Codigo',
        ],
    ]) ?>

</div>
