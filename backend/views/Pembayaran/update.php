<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pembayaran */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Pembayaran',
]) . $model->No_transaksi;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pembayarans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->No_transaksi, 'url' => ['view', 'id' => $model->No_transaksi]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pembayaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
