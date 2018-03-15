<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\StatusKerusakan;


/* @var $this yii\web\View */
/* @var $model backend\models\Pembayaran */

$this->title = 'No Servis : ' .$model->No_Servis;
#$this->params['breadcrumbs'][] = ['label' => 'Pembayarans', 'url' => ['index']];
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
<div class="pembayaran-view">

    <h1>
    <?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'No_transaksi',
            'No_Servis',
            'Barang',
            'Total_harga',
            [
              'label'=>'Jenis Kerusakan',
              'attribute'=>'Status_servis',
              #'value'=>'user.email',
              'value' => function($model){
                            return $model->kerusakan->Status;
                         },
              'filter' => \yii\helpers\ArrayHelper::map(StatusKerusakan::find()->all(), 'Id', 'Status'),
            ],
            'Status_bayar',
            //'Tanggal_Bayar',
            [
              'label'=>'Tanggal bayar',
              'attribute'=>'Tanggal_Bayar',
              'format'=>'datetime',
            ],
            //'gambar',
            [
              'attribute'=>'gambar',
              'label'=>'Bukti Pembayaran',
              'format'=>'raw',

              'value' => function ($model) {
                //$url = \Yii::getAlias('@backend/web/uploads/').$viewgambar->gambar;
              $url = 'http://localhost/proyek1/backend/web/uploads/'.$model->gambar;
                return Html::img($url, ['alt'=>'gambar','width'=>'70','height'=>'50']);
                }
              ],

        ],
    ]) ?>
    <span class="pull-right">
    <p><a class="btn btn-info" href="index.php?r=pembayaran%2Findex">Back &raquo;</a></p>
    </span>


</div>

<table style="width:100%">
  <tr>
    <td><h5 style="text-align:left;">No Servis: </td></h5>
		<td><h5 style="text-align:left;"><?=$model->No_Servis?></td></h5>
  </tr>
  <tr>
		<td><h5 style="text-align:left;">Tanggal: </td></h5>
		<td><h5 style="text-align:left;"><?= Yii::$app->formatter->asDate($model->noServis->Tanggal)?></td></h5>
  </tr>
  <tr>
		<td><h5 style="text-align:left;">Teknisi: </td></h5>
		<td><h5 style="text-align:left;"><?=$model->noServis->teknisi->Nama?></td></h5>
  </tr>
	<tr>
		<td><h5 style="text-align:left;">Jenis: </td></h5>
		<td><h5 style="text-align:left;"><?=$model->kerusakan->Status?></td></h5>
  </tr>
</table>
