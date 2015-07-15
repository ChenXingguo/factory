<?php

use yii\helpers\Html;

use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Company */

$this->title = Yii::t('app', 'Create Company');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

Yii::$app->session->open();
$session = Yii::$app->session;

$model->id = 1;
?>
<div class="company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['validateOnSubmit' => False]); ?>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#part1">Part 1</a></li>
        <li><a data-toggle="tab" href="#part2">Part 2</a></li>
    </ul>
    
    <div class="tab-content">
        <div id="part1" class="tab-pane fade in active">
            <h3>Part 1</h3>
            <p>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'licenses') ?>
                <?= $form->field($model, 'industry') ?>
            </p>
        </div>
        <div id="part2" class="tab-pane fade">
            <h3>Part 2</h3>
            <p>
                <?= $form->field($model, 'num_employees') ?>
                <?= $form->field($model, 'address1') ?>
                <?= $form->field($model, 'address2') ?>
                <?= $form->field($model, 'city') ?>
                <?= $form->field($model, 'province') ?>
                <?= $form->field($model, 'postal_code') ?>
                <?= $form->field($model, 'phone') ?>
                <?= $form->field($model, 'fax') ?>
            </p>
        </div>
    </div>

    <div class="error-field">
        <?= $form->errorSummary($model);?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'submit']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
