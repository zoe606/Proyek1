<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\StatusKerusakan;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembayaran';
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
<div class="pembayaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'No_transaksi',
            'Barang',
			//'No_Servis',
			'Status_bayar',
			'Tanggal_Bayar',
      //'gambar',
      [
        'attribute'=>'gambar',
        'label'=>'Bukti Pembayaran',
        'format'=>'raw',

        'value' => function ($data) {
          //$url = \Yii::getAlias('@backend/web/uploads/').$viewgambar->gambar;
        $url = 'http://localhost/proyek1/backend/web/uploads/'.$data->gambar;
          return Html::img($url, ['width'=>'70','height'=>'50']);
          }
        ],
//
            //'Status_Kerusakan',
			/*[
				'label'=>'Kerusakan',
				'value'=>'kerusakan.Status'
			],*/

      [
        'label'=>'Jenis Kerusakan',
        'attribute'=>'Status_servis',
        #'value'=>'user.email',
        'value' => function($model){
                      return $model->kerusakan->Status;
                   },
        'filter' => \yii\helpers\ArrayHelper::map(StatusKerusakan::find()->all(), 'Id', 'Status'),
      ],
      'Total_harga',




            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
			/*[
          'class' => 'yii\grid\ActionColumn',
          'header' => 'Actions',
          'headerOptions' => ['style' => 'color:#337ab7'],
          'template' => '{Bayar}',
          'buttons' => [
            'Bayar' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
				['pembayaran/bayar','id'=>$model['No_transaksi']], [
                            'title' => Yii::t('app', 'lead-view'),
                ]);
            },

          ],
        ],*/
        ],
    ]); ?>
    <table style="width:100%">
        <tr>
      <th>Metode Pembayaran</th>

        </tr>
      <tr>
        <td>Via ATM</td>

      </tr>
      <tr>
        <td>BCA 303501005228534 a/n Aditya Pratama Dharma</td>
      </tr>
      <tr>
        <td>BNI 0082456589100 a/n Librantara Erlangga</td>
      </tr>
    </table>
</div>
