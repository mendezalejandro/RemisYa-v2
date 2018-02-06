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
                Mediante la aplicaci&oacute;n usted podr&aacute; gestionar su remiser&iacute;a de manera m&aacute;s eficiente y efectiva.
                Para ello usted cuenta con las posibilidad de agregar, actualizar y eliminar un empleado sea, un chofer o un/a telefonista.
                Adem&aacute;, usted podr&aacute; lsitar el historial de calificaciones y viajes de su agencia.
            </p>
                </div>
            </blockquote>
        </div>
    </div>
</div>