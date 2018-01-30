<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use app\assets\AppAsset;

raoul2000\bootswatch\BootswatchAsset::$theme = 'Sandstone';
AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
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
        /* include('testMaps.php'); */
        ?>
        <div class="wrap" >
<?php
    NavBar::begin([
        'brandLabel' => '<img src="img/LogoApp.png" style="display:inline; margin-top: -20px; vertical-align: top; width:120px; height:55px;">',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => ['class' => 'navbar navbar-default navbar-fixed-top navbar-transparent'],
        /*'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],*/
    ]);
            echo Nav::widget([
                'encodeLabels' => false,
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => '<span class="fa fa-home"></span> ' . Html::encode('Home'), 'url' => ['/site/index']],
                    ['label' => '<span class="fa fa-users"></span> ' . Html::encode('Quiénes Somos'), 'url' => ['/site/about']],
                    ['label' => '<span class="fa fa-comment-o"></span> ' . Html::encode('Contactarnos'), 'url' => ['/site/contact']],
                    ['label' => '<span class="fa fa-user-plus"></span> ' . Html::encode('Registrar'),
                        'items' => [
                            ['label' => '<span class="fa fa-user"></span> ' . Html::encode('Usuario'), 'url' => ['/site/registro'],],
                            '<li class="divider"></li>',
                            ['label' => '<span class="fa fa-industry"></span> ' . Html::encode('Remiseria'), 'url' => ['/site/solicitud_registrar_agencia'],],
                        ],],
                        Yii::$app->user->isGuest ? (
                            ['label' => '<span class="glyphicon glyphicon-user"></span> ' . Html::encode('Sign in'), 'url' => ['/site/login'],'options' => ['id' => 'modalButtonLogin'],]
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
            <?=
            Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ])
            ?>
            <?= $content ?>
        </div>

        <footer class="footer">
            <div class="container">
                <!--<hr style="border:1px solid gray;">-->

                <span id="footer-copy-right" style="text-align:center"> 
                     <p class="copyright"><i class="fa fa-phone-square"></i> Contactenos: 001-000001010 &nbsp; &nbsp; &nbsp; &nbsp;&nbsp &nbsp;<i class="fa fa-envelope"></i> EmpresaRemisYa@gmail.com;
&nbsp;&nbsp; P&aacute;gina de prueba &nbsp;- &nbsp;&nbsp;</p>
               <!--     <i class="fa fa-phone-square"></i> -->-
                </span>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
