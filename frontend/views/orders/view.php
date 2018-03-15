<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\dialog\Dialog;


/* @var $this yii\web\View */
/* @var $model backend\models\Orders */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

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
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo Dialog::widget(['overrideYiiConfirm' => true]);?>

    <p> <?php  if ($model->status_id!=1){?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php }?>
        <?php  if ($model->status_id!=2){?>
          <?php  if ($model->status_id!=3){?>
        <?php  if ($model->status_id!=4){?>
        <?= Html::a('Proses', ['proses', 'id' => $model->id], [
          'class' => 'btn btn-primary',
          'data' => [
              'confirm' => 'Proses Pesanan ini?',
              'method' => 'post',
            ],
          ]) ?>
          <?php }?>
        <?php }?>
      <?php }?>


      <?php  if ($model->status_id!=2){?>
        <?php  if ($model->status_id!=3){?>

        <?= Html::a('Cancel', ['batal', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah yakin membatalkan servisan ini?',
                'method' => 'post',
            ],
        ]) ?>
      <?php }?>
    <?php }?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            #'id',
            'no_servis',
            #'teknisi_id',
            'pelanggan.Nama',
            'pelanggan.Alamat',
            'pelanggan.Kontak',
            'status.Status',
            'tanggal',
            'barang',
            'totalharga',
            'keterangan:ntext',
            #'namaplg',
        ],
    ]) ?>

</div>
