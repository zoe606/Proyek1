<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Teknisi */

$this->title = Yii::t('app', 'Create Teknisi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teknisis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teknisi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
