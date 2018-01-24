<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Agencias */

$this->title = 'Create Agencias';
$this->params['breadcrumbs'][] = ['label' => 'Agencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agencias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
