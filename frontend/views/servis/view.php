<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Pelanggan;
use backend\models\Teknisi;
use backend\models\StatusServis;
use backend\models\Servis;
use kartik\dialog\DialogAsset;
use kartik\dialog\Dialog;

/* @var $this yii\web\View */
/* @var $model backend\models\Servis */

//$this->title = $model->No_Servis;
#$this->params['breadcrumbs'][] = ['label' => 'Servis', 'url' => ['index']];
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
<div class="servis-view">

    <h1><?= Html::encode($this->title) ?></h1>
      <?php if (Yii::$app->session->hasFlash('suksess')): ?>
      <div class="alert alert-success alert-dismissable">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <h4><i class="icon fa fa-check"></i>Saved!</h4>
      <?= Yii::$app->session->getFlash('suksess') ?>
      </div>
      <?php endif; ?>


    <?= DetailView::widget([
        'model' => $model,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        'attributes' => [
            'No_Servis',
            #'Deskripsikan_kerusakan:ntext',
            [
      				'label'=>'Status Servis',
      				'attribute'=>'Status_servis',
      				#'value'=>'user.email',
      				'value' => function($model){
                            return $model->status->Status;
                         },
      				'filter' => \yii\helpers\ArrayHelper::map(StatusServis::find()->all(), 'Status_id', 'Status'),
      			],
            [
      				'label'=>'Deskripsi Kerusakan',
      				'value'=>function($model){
                            return $model->Deskripsikan_kerusakan;
                         },
      			],
            'teknisi.Nama',
            /*[
      				'label'=>'Teknisi',
      				'value'=>'teknisi.Nama',
              'attribute'=>'-',
      			],/*
            /*[
      				'label'=>'Teknisi',
      				'attribute'=>'Teknisi_id',
      				#'value'=>'user.email',
      				'value' => function($model){
                            return $model->teknisi->Nama;
                         },
      			],*/

            //'Pelanggan_id',
            [
      				'label'=>'Pelanggan',
      				'attribute'=>'Pelanggan_id',
      				#'value'=>'user.email',
      				'value' => function($model){
                            return $model->nama->Nama;
                         },
      				'filter' => \yii\helpers\ArrayHelper::map(Pelanggan::find()->all(), 'id', 'Nama'),
      			],
			//'Status_servis',

			'Tanggal:datetime',
      'orders.barang',
      'orders.totalharga',

      /*[
       'label'=>'Tanggal',
       'value'=>'Tanggal',
       'format'=>'Date',
     ],*/
        ],
    ]) ?>
    <span class="pull-right">
      <?php  ?>
    <p><a class="btn btn-info" href="index.php?r=servis%2Findex">Back &raquo;</a></p>
    </span>
    <?php  if ($model->Status_servis!=1){?>
      <?php  if ($model->Status_servis!=2){?>
        <?php  if ($model->Status_servis!=3){?>
          <?php  if ($model->Status_servis!=4){?>

    <?php echo Dialog::widget(['overrideYiiConfirm' => true]); ?>
    <?= Html::a('Validasi', ['validasi', 'id' => $model->No_Servis], [
      'class' => 'btn btn-primary',
      'data' => [
          'confirm' => 'Validasi Penggantian barang?
          *Setuju untuk melakukan perggantian barang dengan harga yang tercantum',
          'method' => 'post',
      ],
      ]) ?>
          <?php }?>
        <?php }?>
      <?php }?>
    <?php }?>

</div>
