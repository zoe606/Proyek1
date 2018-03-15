<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model backend\models\Teknisi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teknisi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Kontak')->widget(\yii\widgets\MaskedInput::className(), [
'mask' => ['(+62)999-999-99999', '(+62)-999-999-99999'],
  ]) ?>

  <?= $form->field($model,'end_time')->widget(DatePicker::className(),[
      'dateFormat' => 'yyyy-MM-dd',
      'clientOptions' => ['defaultDate' => 'today']
  ]) ?>


   <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
