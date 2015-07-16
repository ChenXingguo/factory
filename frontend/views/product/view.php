<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->product_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('frontend', 'Update'), ['update', 'product_id' => $model->product_id, 'lang' => $model->lang], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('frontend', 'Delete'), ['delete', 'product_id' => $model->product_id, 'lang' => $model->lang], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('frontend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_id',
            'lang',
            'company_id',
            'product_name',
            'product_code',
            'product_category',
            'description',
            'pkg_length',
            'pkg_width',
            'pkg_height',
            'length_unit',
            'pkg_weight',
            'weight_unit',
            'production_cost',
            'shipping_f2dc',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
