<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Industries */

$this->title = Yii::t('backend', 'Create Industries');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Industries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industries-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
