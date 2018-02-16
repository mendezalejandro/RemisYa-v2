<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use yii\grid\GridView;
use yii\helpers\BaseHtml;
use yii\widgets\ActiveForm;
use yii\bootstrap\Dropdown;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Button;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use app\models\Usuarios;
use app\models\Clientes;
use app\models\Vehiculos;
use app\models\Agencias;
use app\models\Tarifas;

$this->title = 'Viajes';
$this->params['breadcrumbs'][] = $this->title;
/* @var $this yii\web\View */
Modal::begin([
    'header' => '<h4>Mensaje</h4>',
    'id'=>'processmodal',
    'size'=>'modal-sm',
    'options'=>['class'=>'modal']]);echo "Procesando...";Modal::end();
?>



<div class="personas-index">
    <div id="ajaxCrudDatatable">
    <?php if (Yii::$app->session->hasFlash('viajeCreado')): ?>
    <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Operacion exitosa!</strong>
    <a href="#" class="alert-link">Viaje creado correctamente</a>.
    </div><?php endif ?>
            <?php $form = ActiveForm::begin(); ?>
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3>Seleccione Origen y Destino: </h3>
                    </div>
                    <div class="panel-body">
                        <fieldset>
                            <?= $form->field($model, 'OrigenDireccion')->input("text", ['id'=>'OrigenDireccion','readonly' => true])->label("Origen"); ?>
                            <?= $form->field($model, 'OrigenCoordenadas')->hiddenInput(['id' => 'OrigenCoordenadas'])->label(false); ?>
                            <?= $form->field($model, 'DestinoDireccion')->input("text", ['id' => 'DestinoDireccion','readonly' => true])->label("Destino"); ?>
                            <?= $form->field($model, 'DestinoCoordenadas')->hiddenInput(['id' => 'DestinoCoordenadas'])->label(false);?>
                            <div id="btn-bar">
                                <?=
                                $this->registerJs('$(document).ready(function () {$("#btn-ver-remiserias").on("click", function() {getRemiserias(true)});});', 
                                \yii\web\View::POS_READY);
                                $this->registerJs("var agenciaCoord = ". json_encode(Agencias::getDireccion()->DireccionCoordenada).";
                                var canal = ". json_encode(Yii::$app->user->identity->agencia).";
                                initializeCenteredMap(agenciaCoord);
                                hearTheEvent(canal);",\yii\web\View::POS_READY);
                                ?>
                            </div>
                            <div id="mapHome" style="width:100%">
                                <div id="map-Index">
                                    <div id="map"></div>
                                </div>
                                <input id="pac-input" class="controls" type="text" placeholder="Busca tu partido / barrio " />
                            </div>
                        </fieldset>
                    </div>
                </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Datos del viaje: </h3>
                        </div>
                        <div class="panel-body">
                            <fieldset>
                            <?=$form->field($model, 'ClienteID')->widget(Select2::classname(), [
                                'data' => \yii\helpers\ArrayHelper::map(Clientes::find()->all(), 'ClienteID', function($model) {
                                    return $model['Nombre'].' '.$model['Apellido'];}),
                                'language' => 'es',
                                'options' => ['placeholder' => 'Seleccione un cliente ...'],
                                'pluginOptions' => [
                                'allowClear' => true],])->label('Cliente'); ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <?= $form->field($model, 'Distancia')->input("text", ['id'=>'distancia','maxlength' => '50','readonly' => true])->label("Distancia"); ?>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">Tarifa automatica x Km</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" style="background-color:#325d88">$</span>
                                            <?= Html::input('text', 'PrecioKM', Agencias::getTarifaVigente()->PrecioKM, ['class' => 'form-control','id'=>'precioKM']) ?>
                                            <span class="input-group-btn">
                                                <?=
                                                Html::button('Calcular', ['class'=>'btn btn-primary', 'onclick' => '$("#importetotal").val((('.Agencias::getTarifaVigente()->PrecioKM.')*($("#distancia").val().replace(" Km",""))).toFixed(0));'])
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?= $form->field($model, 'ImporteTotal')->input("text", ['maxlength' => '50','id' => 'importetotal'])->label("Importe aproximado"); ?>
                            <?= $form->field($model, 'ChoferID')->dropDownList(\yii\helpers\ArrayHelper::map(Usuarios::getChoferesDisponibles(), 'UsuarioID', function($model) {return $model['Nombre'].' '.$model['Apellido'];}))->label('Chofer') ?>
                            <?= $form->field($model, 'VehiculoID')->dropDownList(\yii\helpers\ArrayHelper::map(Vehiculos::getVehiculosDisponibles(), 'VehiculoID', function($model) {return $model['Marca'].' '.$model['Modelo'];}))->label('Vehiculo') ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($model, 'ViajeTipo')->dropDownList([1 => 'Telefonico', 2 => 'Personal'],['options' => [ 2 => ['selected ' => true]]])->label("Canal de venta") ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($model, 'Estado')->dropDownList([0 => 'Viaje Normal', 4 => 'Reserva'],['options' => [ 0 => ['selected ' => true]]])->label("Tipo de viaje") ?>
                                </div>
                            </div>
                            <?= $form->field($model, 'Comentario')->textArea(['rows' => '4']) ?>
                            <?= Html::submitButton('Crear Viaje', ['class' => 'btn btn-lg btn-primary','onclick'=>'$("#processmodal").modal("show");$.post( "'.Url::to(['recepcionista/carga/index']).'", function() {$("#processmodal").modal("hide");});']); ?>
                            <?= Html::a('Ver Viajes', ['recepcionista/viajes/index'], ['class'=>'btn btn-lg btn-primary']) ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
    </div>
</div>