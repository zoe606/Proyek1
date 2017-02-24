<?php

namespace backend\controllers;

use Yii;
use backend\models\Servis;
use backend\models\ServisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\History_log;

/**
 * ServisController implements the CRUD actions for Servis model.
 */
class ServisController extends Controller
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
     * Lists all Servis models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Servis model.
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
     * Creates a new Servis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Servis();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->No_Servis]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Servis model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
			$pos=Yii::$app->request->post();
			if ($model->save()){
				$log=new History_log();
				$log->No_Servis=$model->No_Servis;
				$log->Tanggal=Date('Y-m-d H:i:s');
				$log->Status_servis=$model->Status_servis;
        $log->Teknisi_id=$model->Teknisi_id;
				$log->Keterangan=$pos['Servis']['keterangan'];
				$log->save();
				$model->Tanggal=Date('Y-m-d H:i:s');
				$model->save();
			}
            return $this->redirect(['view', 'id' => $model->No_Servis]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Servis model.
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
     * Finds the Servis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Servis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Servis::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
