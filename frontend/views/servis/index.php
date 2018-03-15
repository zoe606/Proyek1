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
#$this->params['breadcrumbs'][] = $this->title;
?>
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Simply Me</title>
  <meta charset="utf-8">

  <style>
  body {
      font: 15px Montserrat, sans-serif;
      line-height: 1.8;
      color: #000000;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 {
      background-color: #1abc9c; /* Green */
      color: #ffffff;
  }
  .bg-2 {
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 {
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 {
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
  }
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
  .navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
  </style>
</head>
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
            #'Deskripsikan_kerusakan:ntext',

            [
      				'label'=>'Deskripsi Kerusakan',
      				'value'=>'Deskripsikan_kerusakan'
      			],
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

			#'Tanggal',
      /*[
       'label'=>'Tanggal',
       'value'=>'Tanggal',
       'format'=>'Datetime',
     ],*/

            [
			'class' => 'yii\grid\ActionColumn',
			'template' => '{view}'
			],
        ],
    ]); ?>
</div>
