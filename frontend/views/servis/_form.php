<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Alert;


/* @var $this yii\web\View */
/* @var $model backend\models\Servis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servis-form">

    <?php $form = ActiveForm::begin([
		'options' => [
				'class' => 'col-md-5'
		]
	]); ?>

    <?= $form->field($model, 'Deskripsikan_kerusakan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
