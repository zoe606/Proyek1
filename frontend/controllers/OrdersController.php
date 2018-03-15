<?php

namespace frontend\controllers;

use Yii;
use backend\models\Orders;
use backend\models\Servis;
use frontend\models\OrdersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\helpers\VarDumper;


/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
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
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        /*$model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }*/

        $model = $this->findModel($id);
        $url= 'http://localhost/inventory/web/index.php?r=wsbarang/barang';
        $ch= curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $barang=json_decode($result);
        #varDumper::dump($barang,20,true);

        if ($model->load(Yii::$app->request->post())) {
          #varDumper::dump($model,20,true);

          $totalharga=0;
    			$namabarang=null;

    			if ($model->barang!=null){

            foreach($model->barang as $itembarang){
              $param['id']=$itembarang;
              $url= 'http://localhost/inventory/web/index.php?r=wsbarang/lihat&id='.$itembarang;
              echo $url;
              $ch2= curl_init($url);
    					curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
              $result2 = curl_exec($ch2);
    					$result2=json_decode($result2);
              #varDumper::dump($result2,20,true);

              $totalharga+=$result2->harga;
              #varDumper::dump($result2,20,true);

    					$namabarang=$namabarang.' '.$result2->type.' '.$result2->nama.'(Rp '.$result2->harga.')';
            }

          }
          $model->totalharga=$totalharga;
    			$model->barang=$namabarang;
          $model->status_id=3;
    			$model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }else {
            return $this->render('update', [
              'model' => $model,
            'barang'=>$barang,
          ]);
      }
    }

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionProses($id)
      {
        #$stat = Servis::find()->joinWith('orders')->asArray()->all();
        $model = $this->findModel($id);
        #$stat=Servis::find()->where(['No_Servis'=>$model->no_servis])->one();
        #varDumper::dump($stat,20,true);

  			$model->status_id='2';
        #$stat->Status_servis='2';
        $model->tanggal=Date('Y-m-d H:i:s');
  			#$model->Tanggal_Bayar=Date('Y-m-d H:i:s');
  			$model->save();
        Yii::$app->session->setFlash('warning', 'Servis diproses harap segera menuju tempat pelanggan');
  			return $this->redirect(['view', 'id' => $model->id]);
      }
      public function actionBatal($id)
        {
          $model = $this->findModel($id);
    			$model->status_id='4';
          $model->tanggal=Date('Y-m-d H:i:s');
          $model->barang=null;
          $model->totalharga=null;
          $model->keterangan="Dibatalkan";
    			#$model->Tanggal_Bayar=Date('Y-m-d H:i:s');
    			$model->save();
    			return $this->redirect(['view', 'id' => $model->id]);
        }
}
