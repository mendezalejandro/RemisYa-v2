<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Viajes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="viajes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ChoferID')->textInput() ?>

    <?= $form->field($model, 'VehiculoID')->textInput() ?>

    <?= $form->field($model, 'TarifaID')->textInput() ?>

    <?= $form->field($model, 'TurnoID')->textInput() ?>

    <?= $form->field($model, 'AgenciaID')->textInput() ?>

    <?= $form->field($model, 'UsuarioID')->textInput() ?>

    <?= $form->field($model, 'FechaEmision')->textInput() ?>

    <?= $form->field($model, 'FechaSalida')->textInput() ?>

    <?= $form->field($model, 'ViajeTipo')->textInput() ?>

    <?= $form->field($model, 'OrigenCoordenadas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DestinoCoordenadas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OrigenDireccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DestinoDireccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Comentario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ImporteTotal')->textInput() ?>

    <?= $form->field($model, 'Distancia')->textInput() ?>

    <?= $form->field($model, 'Estado')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
