<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\StatusKerusakan;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Pembayaran');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <span class="pull-right">
    <p>
      <?= Html::a(Yii::t('app','Print'), ['printlist'], ['class' => 'btn btn-success']) ?>
      <?= Html::a(Yii::t('app', 'Create Pembayaran'), ['create'], ['class' => 'btn btn-success']) ?>
          <a class="btn btn-info" href="index.php?r=site%2Findex">Home &raquo;</a>
    </p>
  </span>
</h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'No_transaksi',
			'No_Servis',
			/*'Status_Kerusakan',
			[
				//'label'=>'Kerusakan',
				//'value'=>'status.Status'
			//],*/
			[
				'label'=>'Status',
				'attribute'=>'Status_kerusakan',
				#'value'=>'user.email',
				'value' => function($model){
                      return $model->kerusakan->Status;
                   },
				'filter' => \yii\helpers\ArrayHelper::map(StatusKerusakan::find()->all(), 'Id', 'Status'),
			],
          #'Barang',
            'Total_harga',
            'Status_bayar',
			#'Tanggal_Bayar',
      /*[
       'label'=>'Tanggal',
       'value'=>'Tanggal_Bayar',
       'format'=>'datetime',
     ],*/
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

            ['class' => 'yii\grid\ActionColumn','template'=>'{view}'],
        ],
    ]); ?>
</div>
