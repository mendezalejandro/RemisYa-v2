<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Agencias */

$this->title = 'Update Agencias: ' . $model->AgenciaID;
$this->params['breadcrumbs'][] = ['label' => 'Agencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->AgenciaID, 'url' => ['view', 'id' => $model->AgenciaID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="agencias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
