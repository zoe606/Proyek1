<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Servis;
use backend\models\StatusKerusakan;


/* @var $this yii\web\View */
/* @var $model backend\models\Pembayaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembayaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'No_Servis')->label('Servis')
        ->dropDownList(ArrayHelper::map(Servis::find()->asArray()->all(),'No_Servis','Deskripsikan_kerusakan'),['prompt'=>'- Pilih -'])
        ->hint('Pilih Servis'); ?>

    <?php echo $form->field($model, 'Status_Kerusakan')->label('Status Kerusakan')
      			->dropDownList(ArrayHelper::map(StatusKerusakan::find()->asArray()->all(),'Id','Status'),['prompt'=>'- Pilih -'])
      			->hint('Pilih Status'); ?>

    <?= $form->field($model, 'Barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Total_harga')->textInput() ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
