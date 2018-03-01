<?php

namespace app\controllers;

use Yii;
use app\models\Invoice;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Sort;

/**
 * InvoiceController implements the CRUD actions for Invoice model.
 */
class InvoiceController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Invoice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $sort = new Sort([
            'attributes' => [
                'client' => [
                    'asc' => ['client' => SORT_ASC ],
                    'desc' => ['client' => SORT_DESC],
                    'label' => 'Получатель'
                ],
                'from' => [
                    'asc' => ['from' => SORT_ASC ],
                    'desc' => ['from' => SORT_DESC],
                    'label' => 'Откуда'
                ],
                'in' => [
                    'asc' => ['in' => SORT_ASC ],
                    'desc' => ['in' => SORT_DESC],
                    'label' => 'Куда'
                ],
                'status_id' => [
                    'asc' => ['status_id' => SORT_ASC ],
                    'desc' => ['status_id' => SORT_DESC],
                    'label' => 'Статус'
                ],

            ],
        ]);

        $invoices = Invoice::find()
            ->orderBy($sort->orders)
            ->all();

        return $this->render('index', [
            'invoices' => $invoices,
            'sort' => $sort,
        ]);
    }


    /**
     * Creates a new Invoice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Invoice();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Invoice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
        }
        return $this->actionIndex();
    }

    /**
     * Deletes an existing Invoice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id = null)
    {

        if ($id !== null) {
            $this->findModel($id)->delete();
        }

        if (Yii::$app->request->post('delBtn')) {
            switch (Yii::$app->request->post('dropdown')) {
                case 'all':
                    Invoice::deleteAll();
                    break;
                case 'selected':
                    $ids = Yii::$app->request->post('ids');
                    if (!empty($ids)) {
                        foreach ($ids as $val) {
                            $this->findModel($val)->delete();
                        }

                    }
                    break;
            }
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Invoice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Invoice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Invoice::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
