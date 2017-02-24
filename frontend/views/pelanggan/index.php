<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PelangganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pelanggan';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="pelanggan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Nama',
            'Alamat',
            'Kontak',
            //'User_id',
			[
				'label'=>'Email',
				'attribute'=>'User_id',
				#'value'=>'user.email',
				'value' => function($model){
                      return $model->user->email;
                   },
				'filter' => \yii\helpers\ArrayHelper::map(User::find()->all(), 'id', 'email'),
			],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
        ],
    ]); ?>
</div>
