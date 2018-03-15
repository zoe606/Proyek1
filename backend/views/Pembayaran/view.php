<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\StatusKerusakan;
use kartik\dialog\Dialog;


/* @var $this yii\web\View */
/* @var $model backend\models\Pembayaran */

$this->title = $model->No_transaksi;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pembayarans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?= Html::a(Yii::t('app','Print'), ['printdetail', 'id' => $model->No_transaksi], ['class' => 'btn btn-success']) ?>
        <?php echo Dialog::widget(['overrideYiiConfirm' => true]); ?>
		<?= Html::a(Yii::t('app', 'Validasi'), ['bayar', 'id' => $model->No_transaksi], [
      'class' => 'btn btn-primary',
      'data' => [
          'confirm' => 'Validasi Pembayaran ini?',
          'method' => 'post',
      ],
      ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'No_transaksi',
            'No_Servis',
            #'noServis.teknisi.Nama',
            [
              'label'=>'Teknisi Yang Menangani',
              'value'=>function($model){
                            return $model->noServis->teknisi->Nama;
                         },
              'attribute'=>'Teknisi_id'
            ],
            #'noServis.nama.Nama',
            [
              'label'=>'Pelanggan',
              'value'=>function($model){
                            return $model->noServis->nama->Nama;
                         },
              'attribute'=>'Teknisi_id'
            ],
            'Barang',
            'Total_harga',
            //'Status_Kerusakan',
            [
      				'label'=>'Status Kerusakan',
      				'attribute'=>'Status_kerusakan',
      				#'value'=>'user.email',
      				'value' => function($model){
                            return $model->kerusakan->Status;
                         },
      				'filter' => \yii\helpers\ArrayHelper::map(StatusKerusakan::find()->all(), 'Id', 'Status'),
      			],
			'Status_bayar',
			'Tanggal_Bayar',
      //'gambar',
      [
        'attribute'=>'gambar',
        'label'=>'Bukti Pembayaran',
        'format'=>'raw',

        'value' => function ($viewgambar) {
          //$url = \Yii::getAlias('@backend/web/uploads/').$viewgambar->gambar;
        $url = 'http://localhost/proyek1/backend/web/uploads/'.$viewgambar->gambar;
          return Html::img($url, ['alt'=>'gambar','width'=>'70','height'=>'50']);
          }
        ],
        ],
    ]) ?>

</div>
