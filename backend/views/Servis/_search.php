<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ServisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servis-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'No_Servis') ?>

    <?= $form->field($model, 'Deskripsikan_kerusakan') ?>

    <?= $form->field($model, 'Status_servis') ?>

    <?= $form->field($model, 'Teknisi_id_teknisi') ?>

    <?= $form->field($model, 'Pelanggan_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
