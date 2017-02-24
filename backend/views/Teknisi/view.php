<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Teknisi */

$this->title = $model->id_teknisi;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teknisis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teknisi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_teknisi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_teknisi], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_teknisi',
            'Nama',
            'Alamat',
            'Kontak',
        ],
    ]) ?>

</div>
