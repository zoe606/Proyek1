<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Servis */

$this->title = 'Update Servis: ' . $model->No_Servis;
$this->params['breadcrumbs'][] = ['label' => 'Servis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->No_Servis, 'url' => ['view', 'id' => $model->No_Servis]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
