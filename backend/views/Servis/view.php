<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Teknisi;
use backend\models\Pelanggan;
use backend\models\StatusServis;

/* @var $this yii\web\View */
/* @var $model backend\models\Servis */

$this->title = $model->No_Servis;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Servis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servis-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->No_Servis], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->No_Servis], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'No_Servis',
            [
      				'label'=>'Pelanggan',
      				'attribute'=>'Pelanggan_id',
      				#'value'=>'user.email',
      				'value' => function($model){
                            return $model->nama->Nama;
                         },
      				'filter' => \yii\helpers\ArrayHelper::map(Pelanggan::find()->all(), 'id', 'Nama'),
      			],
            'Deskripsikan_kerusakan:ntext',
            [
      				'label'=>'Status Servis',
      				'attribute'=>'Status_servis',
      				#'value'=>'user.email',
      				'value' => function($model){
                            return $model->status->Status;
                         },
      				'filter' => \yii\helpers\ArrayHelper::map(StatusServis::find()->all(), 'Status_id', 'Status'),
      			],
            //'Teknisi_id',
          /*  [
      				'label'=>'Teknisi',
      				'value'=>'teknisi.nama'
      			],*/
            [
      				'label'=>'Teknisi',
      				'attribute'=>'Teknisi_id',
      				#'value'=>'user.email',
      				'value' => function($model){
                            return $model->teknisi->Nama;
                         },
      				'filter' => \yii\helpers\ArrayHelper::map(Teknisi::find()->all(), 'id_teknisi', 'Nama'),
      			],
            'Tanggal',
        ],
    ]) ?>

</div>
