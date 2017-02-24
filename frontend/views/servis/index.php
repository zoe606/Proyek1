<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Teknisi;
use backend\models\Pelanggan;
use backend\models\StatusServis;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\ServisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Servis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servis-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Servis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'No_Servis',
            'Deskripsikan_kerusakan:ntext',

			//'Status_servis',
			/*[
				'label'=>'Status',
				'value'=>'status.Status'
			],*/
			[
				'label'=>'Status',
				'attribute'=>'Status_servis',
				#'value'=>'user.email',
				'value' => function($model){
                      return $model->status->Status;
                   },
				'filter' => \yii\helpers\ArrayHelper::map(StatusServis::find()->all(), 'Status_id', 'Status'),
			],

            //'Teknisi_id',
			[
				'label'=>'Teknisi',
				'value'=>'teknisi.Nama'
			],
      /*[
				'label'=>'Teknisi',
				'attribute'=>'Teknisi_id',
				#'value'=>'user.email',
				'value' => function($model){
                      return $model->teknisi->Nama;
                   },
				'filter' => \yii\helpers\ArrayHelper::map(Teknisi::find()->all(), 'id_teknisi', 'Nama'),
			],*/

            //'Pelanggan_id',
			/*[
				'label'=>'Pelanggan',
				'value'=>'nama.Nama'
			],*/
			[
				'label'=>'Pelanggan',
				'attribute'=>'Pelanggan_id',
				#'value'=>'user.email',
				'value' => function($model){
                      return $model->nama->Nama;
                   },
				'filter' => \yii\helpers\ArrayHelper::map(Pelanggan::find()->all(), 'id', 'Nama'),
			],

			'Tanggal',

            [
			'class' => 'yii\grid\ActionColumn',
			'template' => '{view}'
			],
        ],
    ]); ?>
</div>
