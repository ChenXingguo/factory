<?php

namespace frontend\controllers;

use Yii;
use common\models\Product;
use common\models\ProductSearch;
use common\models\CompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models for a user's company.
     * @return mixed
     */
    public function actionIndex()
    {
        // get user's company id first
        $companySearchModel = new CompanySearch();
        $companyDataProvider = $companySearchModel->searchCompanyByContact(Yii::$app->user->id);
        $company = $companyDataProvider->query->one();

        $searchModel = new ProductSearch();
//        $dataProvider = $searchModel->searchByCompanyId($company->id);
        $dataProvider = $searchModel->search(['company_id'=>$company->id]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndexAll()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $product_id
     * @param string $lang
     * @return mixed
     */
    public function actionView($product_id, $lang)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_id, $lang),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $model->lang = 'CN';

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
        
            return $this->redirect(['view', 'product_id' => $model->product_id, 'lang' => $model->lang]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_id
     * @param string $lang
     * @return mixed
     */
    public function actionUpdate($product_id, $lang)
    {
        $model = $this->findModel($product_id, $lang);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'lang' => $model->lang]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product_id
     * @param string $lang
     * @return mixed
     */
    public function actionDelete($product_id, $lang)
    {
        $this->findModel($product_id, $lang)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product_id
     * @param string $lang
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id, $lang)
    {
        if (($model = Product::findOne(['product_id' => $product_id, 'lang' => $lang])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
