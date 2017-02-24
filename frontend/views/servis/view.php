<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\pelanggan;
use backend\models\teknisi;
use backend\models\StatusServis;

/* @var $this yii\web\View */
/* @var $model backend\models\Servis */

//$this->title = $model->No_Servis;
$this->params['breadcrumbs'][] = ['label' => 'Servis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servis-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'No_Servis',
            'Deskripsikan_kerusakan:ntext',
            //'Teknisi_id',
          
            //'Pelanggan_id',
            [
      				'label'=>'Pelanggan',
      				'attribute'=>'Pelanggan_id',
      				#'value'=>'user.email',
      				'value' => function($model){
                            return $model->nama->Nama;
                         },
      				'filter' => \yii\helpers\ArrayHelper::map(Pelanggan::find()->all(), 'id', 'Nama'),
      			],
			//'Status_servis',
      [
				'label'=>'Status Servis',
				'attribute'=>'Status_servis',
				#'value'=>'user.email',
				'value' => function($model){
                      return $model->status->Status;
                   },
				'filter' => \yii\helpers\ArrayHelper::map(StatusServis::find()->all(), 'Status_id', 'Status'),
			],
			'Tanggal',
        ],
    ]) ?>

</div>
