<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\StatusServis;
use backend\models\Teknisi;
use backend\models\Servis;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\History_logSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'History Logs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-log-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <span class="pull-right">
      <p><a class="btn btn-info" href="index.php?r=site%2Findex">Home &raquo;</a></p>
    </span>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'No_Servis',
            'Tanggal',
			//'Status_servis',
			#'status.Status',
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
      [
        'label'=>'Teknisi',
        'value'=>'teknisi.Nama',
        //'attribute' => 'teknisi.Nama',
        'format'    => 'raw',
      ],
        /*'value'     => function ($model) {
               if ($model->Teknisi_id != null) {
                   return $model->Teknisi_id;
             //or: return Html::encode($model->some_attribute)
               } else {
                   return '-';
               }
           },
        'filter' => \yii\helpers\ArrayHelper::map(Teknisi::find()->all(), 'id_teknisi', 'Nama'),
      ],*/
			'Keterangan',
      'updated_by',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
