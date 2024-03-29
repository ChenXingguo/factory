<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Industries */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Industries',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Industries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->code]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="industries-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
