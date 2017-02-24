<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pembayaran */

$this->title = Yii::t('app', 'Create Pembayaran');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pembayarans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
