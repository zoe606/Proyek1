<?php

namespace backend\controllers;

use Yii;
use backend\models\Pembayaran;
use backend\models\PembayaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use kartik\mpdf\pdf;
use yii\helpers\Url;

/**
 * PembayaranController implements the CRUD actions for Pembayaran model.
 */
class PembayaranController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

			'access' => [
				'class' => \yii\filters\AccessControl::className(),
				#'only' => ['index', 'view','create', 'update', 'delete'],
				'rules' => [
					[
							'actions' => ['index','view','create', 'update', 'delete','bayar','report'],
							'allow' => true,
							'roles' => ['@'],
							'matchCallback' => function ($rule, $action) {
								return Yii::$app->user->identity->isAdmin;
							}
					],

				],
			],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pembayaran models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PembayaranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pembayaran model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pembayaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pembayaran();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->No_transaksi]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pembayaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->No_transaksi]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pembayaran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pembayaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pembayaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pembayaran::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

	public function actionBayar($id)
    {
        $model = $this->findModel($id);
			$model->Status_bayar='Sudah';
			$model->Tanggal_Bayar=Date('Y-m-d H:i:s');
			$model->save();
			return $this->redirect(['view', 'id' => $model->No_transaksi]);
    }

    public function actionReport()  {


          /*$searchModel = new PembayaranSearch();
          $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

          return $this->render('index', [
              'searchModel' => $searchModel,
              'dataProvider' => $dataProvider,
          ]);*/


    //$searchModel = new Pembayaran();
    //$dataProvider = $searchModel->search(Yii::$app->request->$queryParams);

      // get your HTML raw content without any layouts or scripts
    $content = $this->renderPartial('cetak',[
      //'searchModel' => $searchModel,
      //'dataProvider' => $dataProvider,
      'model' =>$this->findModel(12),
    ]);

    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_CORE,
        // A4 paper format
        'format' => Pdf::FORMAT_A4,
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT,
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER,
        // your html content input
        'content' => $content,
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting
        'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
        'cssInline' => '.kv-heading-1{font-size:18px}',
         // set mPDF properties on the fly
        'options' => ['title' => 'Specta Servis'],
         // call mPDF methods on the fly
        'methods' => [
            'SetHeader'=>['Specta Servis'],
            'SetFooter'=>['{PAGENO}'],
        ]
    ]);

    // return the pdf output as per the destination setting
    return $pdf->render();
  }
}
