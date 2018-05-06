<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Tarifas;
/* @var $this yii\web\View */
/* @var $model app\models\tarifas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarifas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Comision')->textInput() ?>

    <?= $form->field($model, 'ViajeMinimo')->textInput() ?>

    <?= $form->field($model, 'KmMinimo')->textInput() ?>

    <?= $form->field($model, 'PrecioKM')->textInput() ?>

    <?= $form->field($model, 'Estado')->dropDownList(['prompt' => 'Seleccione un estado',Tarifas::Estado_Habilitada => 'Habilitada', Tarifas::Estado_Deshabilitada => 'Deshabilitada']) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
