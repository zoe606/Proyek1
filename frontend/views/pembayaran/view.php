<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\StatusKerusakan;


/* @var $this yii\web\View */
/* @var $model backend\models\Pembayaran */

$this->title = $model->No_transaksi;
$this->params['breadcrumbs'][] = ['label' => 'Pembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-view">

    <h1>
    <?= Html::encode($this->title) ?></h1>

    <p>

          </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'No_transaksi',
            'No_Servis',
            'Barang',
            'Total_harga',
            [
              'label'=>'Status Kerusakan',
              'attribute'=>'Status_servis',
              #'value'=>'user.email',
              'value' => function($model){
                            return $model->kerusakan->Status;
                         },
              'filter' => \yii\helpers\ArrayHelper::map(StatusKerusakan::find()->all(), 'Id', 'Status'),
            ],
            'Status_bayar',
            'Tanggal_Bayar',
            'gambar',
            [
              'attribute'=>'gambar',
              'label'=>'Image',
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
