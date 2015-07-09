<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Contact */

$this->title = Yii::t('frontend', 'Update {modelClass}: ', [
    'modelClass' => 'Contact',
]) . ' ' . $model->company_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->company_id, 'url' => ['view', 'company_id' => $model->company_id, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Update');
?>
<div class="contact-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
