<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
include \Yii::$app->basePath.'/models/Constantes.php';
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

    <?= $form->field($model, 'RolID')->dropDownList(['prompt' => 'Seleccione un rol', TipoUsuario::Administrador => 'Administrador', TipoUsuario::Recepcionista => 'Recepcionista', TipoUsuario::Chofer => 'Chofer'])->label('Rol') ?>

    <?= $form->field($model, 'Estado')->dropDownList(['prompt' => 'Seleccione un estado',UsuarioEstado::Habilitado => 'Habilitado', UsuarioEstado::Deshabilitado => 'Deshabilitado']) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
