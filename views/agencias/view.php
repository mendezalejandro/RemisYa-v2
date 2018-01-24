<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Agencias */

$this->title = $model->AgenciaID;
$this->params['breadcrumbs'][] = ['label' => 'Agencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agencias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->AgenciaID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->AgenciaID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
