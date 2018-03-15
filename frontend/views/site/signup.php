<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
#use yii\bootstrap\ActiveForm;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;

$this->title = 'Signup';
//$this->params['breadcrumbs'][] = $this->title;
?>
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Simply Me</title>
  <meta charset="utf-8">

  <style>
  body {
      font: 15px Montserrat, sans-serif;
      line-height: 1.8;
      color: #000000;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 {
      background-color: #1abc9c; /* Green */
      color: #ffffff;
  }
  .bg-2 {
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 {
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 {
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
  }
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
  .navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
  </style>
</head>
<body>
  <div class="site-signup">
      <h1><?= Html::encode($this->title) ?></h1>

      <p>Please fill out the following fields to signup:</p>

      <div class="row">
          <div class="col-lg-5">
              <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

          <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

          <?= $form->field($model, 'password')->passwordInput() ?>

          <?= $form->field($model, 'password_repeat')->passwordInput() ?>

  				<?= $form->field($plg, 'Nama')->textInput(['maxlength' => true]) ?>

  				<?= $form->field($plg, 'Alamat', [
      'hintType' => ActiveField::HINT_SPECIAL,
      'hintSettings' => ['placement' => 'right', 'onLabelClick' => false, 'onLabelHover' => true]
  ])->textArea([
      'id' => 'address-input',
      'placeholder' => 'Enter address..',
      'rows' => 4
  ])->hint('Masukan alamat sedetail mungkin'); ?>

          <?= $form->field($model, 'email', [
      'addon' => ['prepend' => ['content'=>'@']]
  ]); ?>

  				<?= $form->field($plg, 'Kontak', [
      'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']]
  ])->widget(\yii\widgets\MaskedInput::className(), [
      'mask' => ['(+62)999-999-99999', '(+62)-999-999-99999'],
        ]) ?>


                  <div class="form-group">
                      <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                  </div>

              <?php ActiveForm::end(); ?>
          </div>
      </div>
  </div>

</body>
