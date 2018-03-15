<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

?><style>
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
		table#t01 {
			 border-collapse: collapse;
			 width: 100%;
			}

		 td#t01 {
			 padding:1px;
			 }
		 th#t01 {
			 padding:1px;
			 }
	</style>
	<meta charset="utf-8" />
	<h1 > Specta Servis </h1>
	<div class="border">
	</div>

	<div class="border2">

	</div>
<h4 style="text-align:center;color:black;"><b>KUITANSI PEMBAYARAN</b></h4>
<table style="width:100%">
  <tr>
    <td><h5 style="text-align:left;">No Servis</td></h5>
		<td><h5 style="text-align:left;">:<?=$model->No_Servis?></td></h5>
  </tr>
  <tr>
		<td><h5 style="text-align:left;">Tanggal</td></h5>
		<td><h5 style="text-align:left;">:<?= Yii::$app->formatter->asDate($model->noServis->Tanggal)?></td></h5>
  </tr>
  <tr>
		<td><h5 style="text-align:left;">Teknisi</td></h5>
		<td><h5 style="text-align:left;">:<?=$model->noServis->teknisi->Nama?></td></h5>
  </tr>
	<tr>
		<td><h5 style="text-align:left;">Jenis</td></h5>
		<td><h5 style="text-align:left;">:<?=$model->kerusakan->Status?></td></h5>
  </tr>
</table>
<br>
	<?= DetailView::widget([
        'model' => $model,
		'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        	'attributes' => [
            //'id',
            //'kuitansi_date',
            'Barang',
            [
				'attribute'=>'Total Bayar',
				'value'=>'Rp'.number_format($model->Total_harga).',-',
				'options'=>['class'=>'text-left']
			],
            #'allotment_payment',
            //'emp.fullname',

        ],
    ]) ?>
		<h5 style="text-align:right;">Diserahkan Kepada<td>:</td></tr></h5>
		<br>
		<td><h5 style="text-align:right;"><?=$model->noServis->nama->Nama?></td></h5>
	</div>
</div>
<div class="border3">
</div>
<footer>
	In C/
<?php
echo Yii::$app->user->identity->username;
?>/
<?=date('d-M-Y H:i:s') ?>
</footer>
