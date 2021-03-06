<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\assets\LoginAsset;

LoginAsset::register($this);

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container" style="width: 100%;">

<div class="row">
    <div class="col-lg-15">
        <img src="img/avatarUser.png" id="img-avatar-login"/>
        <h4>
            <strong>
                <p id="label-login">Ingrese su usuario y contrase&ntilde;a</p>
            </strong>
        </h4>
        <br />
        <?php
        $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        'labelOptions' => ['class' => 'col-lg-2 control-label'],
                    ],
        ]);
        ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?=
        $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-4\">{input} {label}</div>\n<div class=\"col-lg-5\">{error}</div>", 'margin-left' => '50px'
        ])
        ?>
        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn input-block-level form-control btn-primary', 'name' => 'login-button', 'id' => 'btn-login-popup']) ?>
            <br>
            <h4>
                <p id="mesagge-login">
                    <strong>&#191No est&aacute; registrado o quer&eacute;s que tu remiser&iacute;a aparezca?</strong>
                </p>
            </h4>
            <br />
            <div id="btn-grupo-resgistrar">
                <?= Html::a('Registrarme como Usuario', [('/site/registro'), 'class' => 'btn btn-primary btn-lg']); ?>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <?= Html::a('Registrarme como Agencia', [('/site/solicitud_registrar_agencia'), 'class' => 'btn btn-primary btn-lg']); ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
        <div class="modal-footer" id="pie-modal">
            <b>
                <?= Html::a('&#191;Has olvidado la contrase&ntilde;a?', [('/site/recuperar_contrasenia'), 'class' => 'btn btn-primary btn-lg', 'id' => 'btn-cancelar']); ?>
            </b>
        </div>
    </div>
</div>
</div>