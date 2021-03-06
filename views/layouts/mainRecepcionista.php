<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use app\assets\AppAsset;

raoul2000\bootswatch\BootswatchAsset::$theme = 'Sandstone';
AppAsset::register($this);
$this->title = 'Recepcionista';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title>
        <?= Html::encode($this->title) ?>
    </title>
    <?php $this->head() ?>
</head>
<body>
    <?php
    $this->beginBody();
    ?>
    <div class="wrap">
        <?php
        NavBar::begin([
                'brandLabel' => '<img src="img/LogoApp.png" style="display:inline; margin-top: -20px; vertical-align: top; width:120px; height:55px;">',
                'brandUrl' => ['recepcionista/index/index'],
                'options' => ['class' => 'navbar navbar-default navbar-fixed-top navbar-transparent'],
                    //'options' => [
                    //   'class' => 'navbar-inverse navbar-fixed-top',
                    //],
            ]);
            ;

            echo Nav::widget([
                'encodeLabels' => false,
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => '<span class="fa fa-home"  ></span> ' . Html::encode('Home'), 'url' => ['recepcionista/index/index']],

                    ['label' => '<span class="fa fa-globe"  ></span> ' . Html::encode('Carga de viajes'), 'url' => ['recepcionista/carga/index']],
                    [
                        'label' => '<span class="fa fa-suitcase"></span> ' . Html::encode('Viajes'),
                        'items' => [
                            ['label' => '<span class="fa fa-th-list"></span> ' . Html::encode('Viajes'), 'url' => ['recepcionista/viajes/index'], 'style' => 'background-color:blue;', 'class' => 'dropdown-toggle'],
                            ['label' => '<span class="fa fa-th-list"></span> ' . Html::encode('Reservas'), 'url' => ['recepcionista/reservas/index'], 'style' => 'background-color:blue;', 'class' => 'dropdown-toggle'],
                            ['label' => '<span class="fa fa-th-list"></span> ' . Html::encode('Solicitudes Online'), 'url' => ['recepcionista/solicitudes/index'], 'style' => 'background-color:blue;', 'class' => 'dropdown-toggle'],
                        ],
                    ],
                    [
                        'label' => '<span class="fa fa-users"></span> ' . Html::encode('Clientes'),
                        'items' => [
                            ['label' => '<span class="fa fa-th-list"></span> ' . Html::encode('Administrar'), 'url' => ['recepcionista/clientes/index'], 'style' => 'background-color:blue;', 'class' => 'dropdown-toggle'],
                        ],
                    ],
                    [
                        'label' => '<span class="fa fa-usd"></span> ' . Html::encode('Tarifas'),
                        'items' => [
                            ['label' => '<span class="fa fa-th-list"></span> ' . Html::encode('Administrar'), 'url' => ['recepcionista/tarifas/index'], 'style' => 'background-color:blue;', 'class' => 'dropdown-toggle'],
                        ],
                    ],
                    Yii::$app->user->isGuest ? (
                            ['label' => 'Login', 'url' => ['/site/login']]
                            ) : (
                            '<li>'
                            . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                            . Html::submitButton(
                                    'Logout (' . Yii::$app->user->identity->Usuario . ')', ['class' => 'btn btn-link']
                            )
                            . Html::endForm()
                            . '</li>'
                            )
                ],
            ]);
            NavBar::end();
        ?>
        <?=Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])
        ?>
        <?= $content ?>
    </div>

    <footer class="footer">
        <div class="container">
            <i class="fa fa-map-marker"></i>Contactenos:&nbsp; &nbsp; &nbsp; &nbsp;
            <i class="fa fa-phone-square"></i>&nbsp; 011-4369-4657 &nbsp; &nbsp; 011-4287-5324 &nbsp; &nbsp;
            <i class="fa fa-envelope"></i>&nbsp; administracion@remisya.com
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
