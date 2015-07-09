<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend', 'Contacts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('frontend', 'Create Contact'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'company_id',
            'user_id',
            'roles_code',
            'first_name',
            'last_name',
            // 'work_phone',
            // 'mobile_phone',
            // 'address1',
            // 'address2',
            // 'city',
            // 'province',
            // 'postal_code',
            // 'note',
            // 'created_at',
            // 'udpated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
