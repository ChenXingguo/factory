<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'lang') ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'product_name') ?>

    <?= $form->field($model, 'product_code') ?>

    <?php // echo $form->field($model, 'product_category') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'pkg_length') ?>

    <?php // echo $form->field($model, 'pkg_width') ?>

    <?php // echo $form->field($model, 'pkg_height') ?>

    <?php // echo $form->field($model, 'length_unit') ?>

    <?php // echo $form->field($model, 'pkg_weight') ?>

    <?php // echo $form->field($model, 'weight_unit') ?>

    <?php // echo $form->field($model, 'production_cost') ?>

    <?php // echo $form->field($model, 'shipping_f2dc') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('frontend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('frontend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
