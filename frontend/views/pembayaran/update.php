<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pembayaran */

$this->title = 'No Transaksi: ' . $model->No_transaksi;
#$this->params['breadcrumbs'][] = ['label' => 'Pembayarans', 'url' => ['index']];
#$this->params['breadcrumbs'][] = ['label' => $model->No_transaksi, 'url' => ['view', 'id' => $model->No_transaksi]];
#$this->params['breadcrumbs'][] = 'Update';
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
<div style=""class="pembayaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <table style="width:100%;">
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
