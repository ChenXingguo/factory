<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = Yii::t('frontend', 'Update {modelClass}: ', [
    'modelClass' => 'Product',
]) . ' ' . $model->product_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_id, 'url' => ['view', 'product_id' => $model->product_id, 'lang' => $model->lang]];
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Update');
?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
