<?php

namespace app\controllers;

use app\models\Category;
use app\models\CategorySearh;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class AdminController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new CategorySearh();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function beforeAction($action)
    {
        if ((Yii::$app->user->isGuest) || (Yii::$app->user->identity->status=='клиент')){
            $this->redirect(['site/login']);
            return false;
        } else return true;
        }
}
