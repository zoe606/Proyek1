<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Teknisi */

$this->title = 'Update Teknisi: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Teknisis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_teknisi, 'url' => ['view', 'id' => $model->id_teknisi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="teknisi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
