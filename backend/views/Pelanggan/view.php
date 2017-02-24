<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Pelanggan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pelanggans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelanggan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
        ],
    ]) ?>

</div>
