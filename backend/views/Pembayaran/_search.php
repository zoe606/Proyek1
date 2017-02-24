<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PembayaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembayaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'No_transaksi') ?>

    <?= $form->field($model, 'Barang') ?>

    <?= $form->field($model, 'Total_harga') ?>

    <?= $form->field($model, 'Status_Kerusakan') ?>

    <?= $form->field($model, 'No_Servis') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
