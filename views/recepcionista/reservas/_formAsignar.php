<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Usuarios;
use app\models\Vehiculos;
use kartik\select2\Select2;
/* @var $this yii\web\View */

/* @var $model app\models\Viajes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="viajes-form">

    <?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'ChoferID')->widget(Select2::classname(), [
    'data' => (\yii\helpers\ArrayHelper::map(Usuarios::getChoferesDisponibles(), 'UsuarioID', function($model) {return $model['Nombre'].' '.$model['Apellido'];})),
    'language' => 'es',
    'options' => ['placeholder' => 'Seleccione un vehiculo ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
])->label('Chofer'); ?>
<?= $form->field($model, 'VehiculoID')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(Vehiculos::getVehiculosDisponibles(), 'VehiculoID', function($model) {return $model['Marca'].' '.$model['Modelo'];}),
    'language' => 'es',
    'options' => ['placeholder' => 'Seleccione un vehiculo ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
])->label('Vehiculo'); ?>

    <?= $form->field($model, 'UsuarioID')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(Usuarios::getClientes(), 'UsuarioID', function($model) {
        return $model['Nombre'].' '.$model['Apellido'];}),
    'language' => 'es',
    'options' => ['placeholder' => 'Seleccione un cliente ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
])->label('Cliente'); ?>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Asignar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
