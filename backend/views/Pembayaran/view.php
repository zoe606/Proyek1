<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\StatusKerusakan;

/* @var $this yii\web\View */
/* @var $model backend\models\Pembayaran */

$this->title = $model->No_transaksi;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pembayarans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->No_transaksi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->No_transaksi], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a(Yii::t('app', 'Bayar'), ['bayar', 'id' => $model->No_transaksi], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'No_transaksi',
            'No_Servis',
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
        $url = 'http://localhost/proyek/backend/web/uploads/'.$viewgambar->gambar;
          return Html::img($url, ['alt'=>'gambar','width'=>'70','height'=>'50']);
          }
        ],
        ],
    ]) ?>

</div>
