<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Usuarios;
use app\models\Vehiculos;
/* @var $this yii\web\View */

/* @var $model app\models\Viajes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="viajes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ChoferID')->dropDownList(\yii\helpers\ArrayHelper::map(Usuarios::getChoferesDisponibles(), 'UsuarioID', function($model) {
        return $model['Nombre'].' '.$model['Apellido'];
    })) ?>

    <?= $form->field($model, 'VehiculoID')->dropDownList(\yii\helpers\ArrayHelper::map(Vehiculos::getVehiculosDisponibles(), 'VehiculoID', function($model) {
        return $model['Marca'].' '.$model['Modelo'];
    })) ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Aprobar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
