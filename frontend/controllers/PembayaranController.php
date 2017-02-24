<?php

namespace frontend\controllers;

use Yii;
use backend\models\Pembayaran;
use frontend\models\PembayaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


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
        								'actions' => ['index','view','update',],
        								'allow' => true,
        								'roles' => ['@'],
        						],
								[
										'actions' => ['index','view','create', 'update', 'delete'],
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

        if ($model->load(Yii::$app->request->post())) {
          $imageName = $model->No_transaksi;
         $gambar = UploadedFile::getInstance($model, 'gambar');
         if($model->validate()){
             $model->save();
             if (!empty($gambar)) {
                 $gambar->saveAs(Yii::getAlias('@backend/web/uploads/BuktiPembayaran' ) . $imageName.'.' . $gambar->extension);
                 $model->gambar = 'BuktiPembayaran'.$imageName.'.'.$gambar->extension;
                 $model->save(FALSE);
             }
         }
          $model->save();
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
    public function actionViewGambar($No_transaksi){
              $file = Yii::getAlias('@backend/web/uploads/BuktiPembayaran' . $No_transaksi);
              //var_dump($file);
              //exit();
              return Yii::$app->response->sendFile($file, NULL, ['inline' => TRUE]);

            }


}
