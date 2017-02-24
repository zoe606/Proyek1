<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


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
            'No_transaksi',
            'Barang',
            'Total_harga',
            //'Status_Kerusakan',
            [
      				'label'=>'Kerusakan',
      				'value'=>'kerusakan.Status'
      			],
            'No_Servis',
			'Status_bayar',
			'Tanggal_Bayar',
        ],
    ]) ?>

</div>
