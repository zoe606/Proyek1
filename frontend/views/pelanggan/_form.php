<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Pelanggan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelanggan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Kontak')->widget(\yii\widgets\MaskedInput::className(), [
      'mask' => ['(+62)999-999-99999', '(+62)-999-999-99999'], ]) ?>

  <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
