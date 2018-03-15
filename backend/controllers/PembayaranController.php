<?php

namespace backend\controllers;

use Yii;
use backend\models\Pembayaran;
use backend\models\PembayaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
//use kartik\mpdf\pdf;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use mPDF;

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
							'actions' => ['index','view','create', 'update', 'delete','bayar','printlist','printdetail'],
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
		$url= 'http://localhost/inventory/web/index.php?r=wsbarang/barang'; //url server ws
		$ch= curl_init($url); //inisialisasi curl library 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		$barang=json_decode($result);
		#varDumper::dump(Yii::$app->request->post(),20,true);
        if ($model->load(Yii::$app->request->post()) ) {
			#varDumper::dump($model,20,true);
			$totalharga=0;
			$namabarang=null;
			if ($model->Barang!=null){

				foreach($model->Barang as $itembarang){
					$param['id']=$itembarang;
					$url= 'http://localhost/inventory/web/index.php?r=wsbarang/harga&id='.$itembarang;
					echo $url;
					$ch2= curl_init($url);
					curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
					#curl_setopt($ch2, CURLOPT_POSTFIELDS,$param);
					$result2 = curl_exec($ch2);
					$result2=json_decode($result2);
					#varDumper::dump($result2,20,true);

					#echo $result2->harga;
					$totalharga+=$result2->harga;
					$namabarang=$namabarang.' '.$result2->type.' '.$result2->nama.'(Rp '.$result2->harga.')';
          #varDumper::dump($result2,20,true);

				}
			}

			if ($model->Status_Kerusakan==1)
				$totalharga+=50000;
			else
			$totalharga+=100000;
			$model->Total_harga=$totalharga;
			$model->Barang=$namabarang;
			$model->save();

            return $this->redirect(['view', 'id' => $model->No_transaksi]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'barang'=>$barang,
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

    public function actionPrintlist()
      {
        $mpdf=new mPDF('','A4-P','','',20,20,20,20,2,2);
        //$pro=Project::find()->where(['code'=>$model->project])->one();
        $searchModel = new PembayaranSearch();
        $dataProvider = $searchModel->search($model->id);

        $stylesheet = file_get_contents('css/print.css');
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML(
           $this->renderAjax('printlistpembayaran', [
            'model' => $model,
            //'pro'=>$pro,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
          ])
        );
        $mpdf->Output('List Pembayaran.pdf','D');
      }

    public function actionPrintdetail($id) {
      //$cekorderan=Orders::find()->where(['no_servis'=>$id])->one();
      #$dp=Pembayaran::find()->where(['No_transaksi'=>$dp)->one();
    		$model = $this->findModel($id);
    		if ($model!=null){
    			#if ($model->status==3){
    				$mpdf=new mPDF('','A5-L','','',2,2,2,2,2,2);
            #$searchModel = new PembayaranSearch();
            #$dataProvider = $searchModel->search($model->id);


    				$stylesheet = file_get_contents('css/print.css');
    				$mpdf->WriteHTML($stylesheet,1);
    				$mpdf->WriteHTML(
    					 $this->renderAjax('printdetail', [
    						'model' => $model,
                #'searchModel' => $searchModel,
                #'dataProvider' => $dataProvider,

    					])
    				);
    				$mpdf->Output('Kuitansi.pdf','D');
    			}else {
      			\Yii::$app->getSession()->setFlash('error', 'Kuitansi tidak ditemukan');
      			return $this->redirect(['view', 'id' => $model->id]);
      		}
        }
        #}
      #}
    public function actionReport()  {


          $searchModel = new PembayaranSearch();
          $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

          /*return $this->render('index', [
              'searchModel' => $searchModel,
              'dataProvider' => $dataProvider,
          ]);*/


    //$searchModel = new Pembayaran();
    //$dataProvider = $searchModel->search(Yii::$app->request->$queryParams);

      // get your HTML raw content without any layouts or scripts
    $content = $this->renderPartial('cetak',[
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
      //'model' =>$this->findModel(12),
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
