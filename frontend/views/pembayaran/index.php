<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\StatusKerusakan;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <p>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'No_transaksi',
            'Barang',
			//'No_Servis',
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
//
            //'Status_Kerusakan',
			/*[
				'label'=>'Kerusakan',
				'value'=>'kerusakan.Status'
			],*/

      [
        'label'=>'Status Kerusakan',
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
</div>
