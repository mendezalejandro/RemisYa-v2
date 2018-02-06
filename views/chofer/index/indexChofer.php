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
                       Mediante la aplicaci&oacute;n usted  puede ver la lista de viajes realizados, permitir calificar a un cliente y ver las calificaciones que le fueron realizadas.
                    </p>
                </div>
            </blockquote>
        </div>
    </div>
</div>