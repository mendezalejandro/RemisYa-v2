<?php

namespace app\controllers\recepcionista;

use Yii;
use app\models\Roles;
use app\models\SearchRoles;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * IndexController implements the CRUD actions for Roles model.
 */
class IndexController extends Controller
{
    public $layout = "mainRecepcionista";
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Index models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('indexRecepcionista');
    }
}
