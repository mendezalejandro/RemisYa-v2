<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
include \Yii::$app->basePath.'/models/Constantes.php';
/* @var $this yii\web\View */
/* @var $model app\models\vehiculos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Matricula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Estado')->dropDownList(['prompt' => 'Seleccione un estado', VehiculoEstado::Habilitado => 'Habilitado', VehiculoEstado::Deshabilitado => 'Deshabilitado']) ?>
    <?= $form->field($model, 'FechaAlta')->widget(
    DatePicker::className(), [
        //'inline' => false, 
        'language' => 'es',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
