<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

  
    <?= $form->field($model, 'id')->hiddenInput()->label(FALSE) ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'licenses')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'industry')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'num_employees')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'address1')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'address2')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'postal_code')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => 45]) ?>

    <?php /*
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>
    */ ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
