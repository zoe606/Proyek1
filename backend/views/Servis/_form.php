<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Teknisi;
use yii\helpers\ArrayHelper;
use backend\models\StatusServis;

/* @var $this yii\web\View */
/* @var $model backend\models\Servis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servis-form">

    <?php $form = ActiveForm::begin(); ?>

	<?php echo $form->field($model, 'Status_servis')
			->dropDownList(ArrayHelper::map(StatusServis::find()->asArray()->all(),'Status_id','Status'),['prompt'=>'- Pilih -'])
			->hint('Pilih Status'); ?>
      
      <?php echo $form->field($model, 'Teknisi_id')
    			->dropDownList(ArrayHelper::map(Teknisi::find()->asArray()->all(),'id_teknisi','Nama'),['prompt'=>'- Pilih -'])
    			->hint('Pilih Teknisi'); ?>

	<?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
