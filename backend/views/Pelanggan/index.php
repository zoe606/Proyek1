<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\User;
#use yiister\adminlte\widgets\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PelangganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Pelanggan');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="pelanggan-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <span class="pull-right">
      <p><a class="btn btn-info" href="index.php?r=site%2Findex">Home &raquo;</a></p>
    </span>

    <?= GridView::widget(
      [
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Nama',
            'Alamat',
            'Kontak',
            //'User_id',
			//'user.email',
			[
				'label'=>'Email',
				'attribute'=>'User_id',
				#'value'=>'user.email',
				'value' => function($model){
                      return $model->user->email;
                   },
				'filter' => \yii\helpers\ArrayHelper::map(User::find()->all(), 'id', 'email'),
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
