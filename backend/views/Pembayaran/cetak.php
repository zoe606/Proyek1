<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\modules\pro\models\Job;
use backend\modules\crm\models\Customer;
use backend\modules\hr\models\Employee;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\pro\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app','List Register Project');
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
<img style="width:300px;height:98px;margin-left:450px"src="C:\xampp\htdocs\nfields\backend\web\img\Untitled.png" alt="atm.com" >
<div class="border">
</div>

<div class="border2">

</div>
<h4 style="text-align:center;color:black;"><b>LIST REGISTER PROJECT</b></h4>
    <?= GridView::widget([
			'dataProvider' => $dataProvider,
			'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
			'layout'=>"{items}",
        'columns' => [
          ['class' => 'yii\grid\SerialColumn','contentOptions' => ['class'=>'no','style'=>'text-align:center;'],'headerOptions' => ['style'=>'text-align:center'],'footerOptions' => ['style'=>'text-align:center']],

           // 'id',

		    #'create_date',
            #'code',
			[
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
        ],
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
	In C/
<?php
echo Yii::$app->user->identity->username;
?>/
<?=Date('Y-m-d h:i:s') ?>
</footer>
