<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Servis */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Servis',
]) . $model->No_Servis;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Servis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->No_Servis, 'url' => ['view', 'id' => $model->No_Servis]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="servis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
