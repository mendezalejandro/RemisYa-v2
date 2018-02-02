<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Personas */
?>
<div class="personas-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'PersonaID',
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
