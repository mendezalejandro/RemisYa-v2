<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AgenciasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agencias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'AgenciaID') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Telefono') ?>

    <?= $form->field($model, 'Email') ?>

    <?= $form->field($model, 'Estado') ?>

    <?php // echo $form->field($model, 'CUIT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
