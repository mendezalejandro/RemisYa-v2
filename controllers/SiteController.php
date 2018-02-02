<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\TipoUsuario;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'administrador', 'recepcionista', 'chofer', 'cliente', 'registro', 'contact', 'about', 'solicitud_registrar_agencia'], //solo debe aplicarse a las acciones login, logout , admin,recepcionista, chofer y cliente. Todas las demas acciones no estan sujetas al control de acceso
                'rules' => [                              //reglas
                    [
                        'actions' => ['login', 'registro', 'contact', 'about', 'solicitud_registrar_agencia'], //para la accion login
                        'allow' => true, //Todos los permisos aceptados
                        'roles' => ['?'], //Tienen acceso a esta accion todos los usuarios invitados
                    ],
                    [
                        //el administrador tiene permisos sobre las siguientes acciones
                        'actions' => ['logout', 'administrador'],
                        'allow' => true,
                        'roles' => ['@'], //El arroba es para el usuario autenticado
                        'matchCallback' => function ($rule, $action) {                    //permite escribir la l?gica de comprobaci?n de acceso arbitraria, las paginas que se intentan acceder solo pueden ser permitidas si es un...
                    return TipoUsuario::esAdministrador(Yii::$app->user->identity->RolID);
                    //Llamada al m?todo que comprueba si es un administrador
                    //Retorno el metodo del modelo que comprueba el tipo de usuario que es por el rol (1,2,3,4) etc y que devuelve true o false
                },
                    ],
                    [
                        //el recepcionista tiene permisos sobre las siguientes acciones
                        'actions' => ['logout', 'recepcionista'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                    return TipoUsuario::esRecepcionista(Yii::$app->user->identity->RolID);
                    //Llamada al m?todo que comprueba si es un recepcionista
                },
                    ],
                    [
                        //el chofer tiene permisos sobre las siguientes acciones
                        'actions' => ['logout', 'chofer'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                    return TipoUsuario::esChofer(Yii::$app->user->identity->RolID);
                    //Llamada al m?todo que comprueba si es un chofer
                },
                    ],
                    [
                        //el cliente tiene permisos sobre las siguientes acciones
                        'actions' => ['logout', 'cliente'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                    return TipoUsuario::esCliente(Yii::$app->user->identity->RolID);
                    //Llamada al m?todo que comprueba si es un cliente
                },
                    ],
                ],
            ],
            //Controla el modo en que se accede a las acciones, en este caso a la acci?n logout
            //s?lo se puede acceder a trav?s del m?todo post
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    // funciones para las vistas dependiendo el tipo de usuario
    public function actionAdministrador() {
        return $this->redirect(['administrador/index/index']);
    }

    public function actionRecepcionista() {
        return $this->redirect(['recepcionista/index']);
    }

    public function actionChofer() {
        return $this->redirect(['chofer/index/index']);
    }

    public function actionCliente() {
        return $this->redirect(['cliente/index']);
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->login()) { 
            if (Yii::$app->user->identity->Estado == 1) {                            //se evalua si la cuenta esta validada, si ==1 es invalidada
                Yii::$app->user->logout();                                          //se cierra la sesion y se muestra un mensaje
                return $this->render('VistaInvalidoUsuarioDesdeLogin');
                
            } else {
                if (TipoUsuario::esAdministrador(Yii::$app->user->identity->RolID)) {         //Se evalua el tipo de usuario enviandole el rolID del usuario logueado, que se almaceno en una variable de sesion de yii y se accede de esta manera Yii::$app->user->identity->RolID
                    return $this->redirect(['site/administrador']);
                } elseif (TipoUsuario::esRecepcionista(Yii::$app->user->identity->RolID)) {
                    return $this->redirect(['site/recepcionista']);
                } elseif (TipoUsuario::esChofer(Yii::$app->user->identity->RolID)) {
                    return $this->redirect(['site/chofer']);
                } elseif (TipoUsuario::esCliente(Yii::$app->user->identity->RolID)) {
                    return $this->redirect(['site/cliente']);
                } else {
                    return $this->goBack();
                }
            }
        }
        else{ return $this->goBack(); }
        }
        return $this->renderAjax('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
