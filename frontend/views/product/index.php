<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
         $models = $dataProvider->getModels();
         
         $company_id = $models[0]->company_id;
    ?>
    <p>
        <?= Html::a(Yii::t('frontend', 'Create Product'), ['create','company_id' => $company_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_id',
            'lang',
            'company_id',
            'product_name',
            'product_code',
            // 'product_category',
            // 'description',
            // 'pkg_length',
            // 'pkg_width',
            // 'pkg_height',
            // 'length_unit',
            // 'pkg_weight',
            // 'weight_unit',
            // 'production_cost',
            // 'shipping_f2dc',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
