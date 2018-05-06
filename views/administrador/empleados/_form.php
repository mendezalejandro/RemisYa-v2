<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Usuarios;
/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Usuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Documento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RolID')->dropDownList(['prompt' => 'Seleccione un rol', Usuarios::Rol_Administrador => 'Administrador', Usuarios::Rol_Recepcionista => 'Recepcionista', Usuarios::Rol_Chofer => 'Chofer'])->label('Rol') ?>

    <?= $form->field($model, 'Estado')->dropDownList(['prompt' => 'Seleccione un estado',Usuarios::Estado_Habilitado => 'Habilitado', Usuarios::Estado_Deshabilitado => 'Deshabilitado']) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
