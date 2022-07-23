<?php

namespace app\controllers;

use app\models\Order;
use app\models\OrderSearch;
use yii\web\Controller;
use app\models\Article;
use app\models\Cart;
use app\models\User;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use function Symfony\Component\String\u;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Order models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $id=$_GET['id'];
        $password=$_GET['password'];
        $carts=Cart::find()->where(['user_id'=>$id])->all();
        die($carts);
        $user=\Yii::$app->user->identity;
        if ($password!=User::findOne($id)->password) return 0;
        $carts=Cart::find()->where(['user_id'=>$id])->all();
        foreach ($carts as $cart){
            $order=new Order();
            $article=Article::find()->where(['id'=>$cart->article_id])->one();
            $order->name=$article->name;
            $order->price=$article->price;
            $order->count=$cart->count;
            $order->user_id=$id;
            $order->save();
            $cart->delete();
        }
        return 1;
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $article=Article::find()->where(['name'=>$this->findModel($id)->name]);
        $article->count+=$this->findModel($id)->count;
        $article->save();
        $this->findModel($id)->delete();

        return $this->redirect(['/user/view?id='.\Yii::$app->user->identity->id]);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
