<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TeknisiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Teknisi');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teknisi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <span class="pull-right">
        <p></p>
      <p>
        <?= Html::a(Yii::t('app', 'Create Teknisi'), ['create'], ['class' => 'btn btn-success']) ?>
        <a class="btn btn-info" href="index.php?r=site%2Findex">Home &raquo;</a>
      </p>
  </span>
</h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_teknisi',
            'Nama',
            'Alamat',
            'Kontak',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
