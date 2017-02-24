<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Teknisi */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Teknisi',
]) . $model->id_teknisi;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teknisis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_teknisi, 'url' => ['view', 'id' => $model->id_teknisi]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="teknisi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
