<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lang')->textInput(['maxlength' => 2]) ?>

    <?= $form->field($model, 'company_id')->textInput() ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'product_code')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'product_category')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'pkg_length')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'pkg_width')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'pkg_height')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'length_unit')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'pkg_weight')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'weight_unit')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'production_cost')->textInput() ?>

    <?= $form->field($model, 'shipping_f2dc')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('frontend', 'Create') : Yii::t('frontend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
