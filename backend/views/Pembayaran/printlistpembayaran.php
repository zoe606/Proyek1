<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\StatusKerusakan;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\pro\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app','List Pembayaran');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.border{
	 border-width: 1.5px;
	 border-style:solid;
	 border-top-color: grey;
	 border-bottom-color: grey;
	 border-left-color: grey;
	 border-right-color: grey;
		}
.border2 {
		border-width: 1.5px;
		border-style:solid;
		border-top-color: #00b359;
		border-bottom-color:#00b359;
		border-left-color: #00b359;
		border-right-color: #00b359;
		}
		.border3 {
					border-width: 1.5px;
					border-style:solid;
					border-top-color: blue;
					border-bottom-color:blue;
					border-left-color: blue;
					border-right-color: blue;
					}
	</style>
<meta charset="utf-8" />
<h1 > Specta Servis </h1>
<div class="border">
</div>

<div class="border2">

</div>
<h4 style="text-align:center;color:black;"><b>LIST PEMBAYARAN</b></h4>
    <?= GridView::widget([
			'dataProvider' => $dataProvider,
			'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
			'layout'=>"{items}",
        'columns' => [
          ['class' => 'yii\grid\SerialColumn','contentOptions' => ['class'=>'no','style'=>'text-align:center;'],'headerOptions' => ['style'=>'text-align:center'],'footerOptions' => ['style'=>'text-align:center']],

					      //'No_transaksi',
								/*[
									'label'=>'No Transaksi',
									'value'=>'No_transaksi',
								],*/
								//'No_Servis',
								[
									'label'=>'No Servis',
									'value'=>'No_Servis',
								],
								[
								 'label'=>'Tanggal',
								 'value'=>'Tanggal_Bayar',
								 'format'=>'Date',
							 ],
								//'Status_bayar',
								[
								 'label'=>'Status Pembayaran',
								 'value'=>'Status_bayar',
							 ],
								/*'Status_Kerusakan',
								[
									//'label'=>'Kerusakan',
									//'value'=>'status.Status'
								//],*/
								[
									'label'=>'Jenis kerusakan',
									'attribute'=>'Status_kerusakan',
									#'value'=>'user.email',
									'value' => function($model){
					                      return $model->kerusakan->Status;
					                   },
									'filter' => \yii\helpers\ArrayHelper::map(StatusKerusakan::find()->all(), 'Id', 'Status'),
								],
					      //'Barang',
								[
									'label'=>'Barang Diganti',
									'value'=>'Barang',
									//'format'=>'Currency',
								],
					       //'Total_harga',
								 [
									'attribute'=>'Total',
 									//'label'=>'Total Pembayaran',
 									'value'=>'Total_harga',
									//'prefix' => '€ ',
									'format'=>'Currency',
 								],
								/*[
										'options'=>['class'=>'text-left']
										'Rp '.number_format($model->Total_harga).',-',
									],*/

								//'Tanggal_Bayar',

					      //'gambar',
					      /*[
					        'attribute'=>'gambar',
					        'label'=>'Bukti Pembayaran',
					        'format'=>'raw',
					        'value' => function ($viewgambar) {
					          //$url = \Yii::getAlias('@backend/web/uploads/').$viewgambar->gambar;
					        $url = 'http://localhost/proyek1/backend/web/uploads/'.$viewgambar->gambar;
					          return Html::img($url, ['alt'=>'gambar','width'=>'70','height'=>'50']);
					          }
					        ],*/

					            //['class' => 'yii\grid\ActionColumn','template'=>'{view}'],
					        ],
           // 'id',

		    #'create_date',
            #'code',
			/*[
				'label'=>'Koder Register',
				'value'=>'code',
				'contentOptions' => ['class'=>'text-center']
				//'attribute' => 'code', 'contentOptions' => ['class'=>'text-center']
			],
			[
				'label'=>'Nama Proyek',
				'value'=>'name',
			],
            #'description:ntext',
            #'team_leader',
            #'product',
            #'job',
			[
				'label'=>'Jenis Pekerjaan',
				'value'=>'job',
				//'attribute' => 'job',
				#'value' => '$data->namasatuan->nama',
				'content'=>function($data){
					return $data->rjob->name;
				},
			],
			[
				'label'=>'Pelanggan',
				'value'=>'customer',
				//'attribute' => 'customer',
				#'value' => '$data->namasatuan->nama',
				'content'=>function($data){
					return $data->cust->fullname;
				},
			],
			[
				'label'=>'Lokasi Pekerjaan',
				'value'=>'project_location',
			],
			[
				'label'=>'Status',
				'value'=>'status',
				//'attribute' => 'status',
				'content'=>function($data){
					return ($data->status==0)?'Baru':(($data->status==1)?'RPP':(($data->status==2)?'Anggaran':(($data->status==3)?'Pelaksanaan':'Finish')));
				},
			],

			[
				'label'=>'PIC',
				'value'=>'pic',
				#'header' => 'PIC Marketing',
				#'value' => implode(\yii\helpers\ArrayHelper::map($data->employees, 'id', 'fullname')),
				//'attribute'=>'pic',
				'content'=>function($data){
					return implode(\yii\helpers\ArrayHelper::map($data->picintm, 'id', 'fullname'));
				},
			],
			[
				'label'=>'Tanggal',
				'value'=>'create_date',
				//'attribute' => 'create_date',
				'contentOptions' => ['class'=>'text-center']],
			],*/
			/*[
				'header' => 'PIC L',
				#'value' => implode(\yii\helpers\ArrayHelper::map($data->employees, 'id', 'fullname')),
				'content'=>function($data){
					#return (isset($data->pic)?$data->pic->position:"");
					return implode(\yii\helpers\ArrayHelper::map($data->picintl, 'id', 'fullname'));
				},
				'filter' => Html::activeDropDownList($searchModel, 'id', ArrayHelper::map(Employee::find()->asArray()->all(), 'id', 'fullname'),['class'=>'form-control','prompt' => '- Semua -']),
			],*/
            #'customer',
            //'start_date',
            #'due_date',
            // 'end_date',
           // 'usercreate',
           // 'createdate',
           // 'updatedate',

    ]); ?>

</div>
<div class="border3">
</div>
<footer>
	SpectaServis/
<?php
echo Yii::$app->user->identity->username;
?>/
<?=date('d-M-Y H:i:s') ?>
</footer>
