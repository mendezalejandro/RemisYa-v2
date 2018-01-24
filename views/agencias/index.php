<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgenciasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agencias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Agencias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'AgenciaID',
            'Nombre',
            'Telefono',
            'Email:email',
            'Estado',
            // 'CUIT',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
