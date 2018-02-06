<?php
use yii\helpers\BaseHtml;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Modal;


Modal::begin([
    'id' => 'modal',
        //'size' => 'modal-lg',
]);
echo "<div id='modalContent'></div>";
Modal::end();
?>
<div class="container">
    <div class="jumbotron">
        <h1><b>Bienvenid@ <?php echo Yii::$app->user->identity->Nombre?></b></h1>
        <div class="row">
            <blockquote>
                <div>
                <p style="text-align: justify">
                Mediante la aplicaci&oacute;n usted podr&aacute; gestionar los viajes de una manera efectiva.
                Para ello usted cuenta con las posibilidad de agregar, actualizar y eliminar viajes, asignar choferes y vehiculos a solicitudes online y reservas.
                Adem&aacute;, usted podr&aacute; cargar un esquema de tarifas por cantidad kilometros y realizar la carga de Clientes de la agencia.
            </p>
                </div>
            </blockquote>
        </div>
    </div>
</div>