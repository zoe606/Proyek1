<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\History_log */

$this->title = Yii::t('app', 'Create History Log');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'History Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
