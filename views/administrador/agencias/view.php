<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Agencias */
?>
<div class="agencias-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'AgenciaID',
            'Nombre',
            'Telefono',
            'Email:email',
            'Estado',
            'CUIT',
        ],
    ]) ?>

</div>
