<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Viajes */
?>
<div class="viajes-asignar">

    <?= $this->render('_formAsignar', [
        'model' => $model,
    ]) ?>

</div>

<script type="text/javascript">
  $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
