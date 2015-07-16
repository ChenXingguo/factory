<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $product_id
 * @property string $lang
 * @property integer $company_id
 * @property string $product_name
 * @property string $product_code
 * @property string $product_category
 * @property string $description
 * @property string $pkg_length
 * @property string $pkg_width
 * @property string $pkg_height
 * @property string $length_unit
 * @property string $pkg_weight
 * @property string $weight_unit
 * @property integer $production_cost
 * @property integer $shipping_f2dc
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Company $company
 * @property ProductAttributeNv[] $productAttributeNvs
 * @property ProductAttributes $productAttributes
 * @property ProductImages $productImages
 * @property ProductPricing[] $productPricings
 * @property ProductProperties[] $productProperties
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang', 'company_id'], 'required'],
            [['company_id', 'production_cost', 'shipping_f2dc'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['product_name', 'product_code', 'product_category', 'pkg_length', 'pkg_width', 'pkg_height', 'pkg_weight'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 255],
            [['length_unit', 'weight_unit'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'lang' => Yii::t('app', 'Lang'),
            'company_id' => Yii::t('app', 'Company ID'),
            'product_name' => Yii::t('app', 'Product Name'),
            'product_code' => Yii::t('app', 'Product Code'),
            'product_category' => Yii::t('app', 'Product Category'),
            'description' => Yii::t('app', 'Description'),
            'pkg_length' => Yii::t('app', 'Pkg Length'),
            'pkg_width' => Yii::t('app', 'Pkg Width'),
            'pkg_height' => Yii::t('app', 'Pkg Height'),
            'length_unit' => Yii::t('app', 'Length Unit'),
            'pkg_weight' => Yii::t('app', 'Pkg Weight'),
            'weight_unit' => Yii::t('app', 'Weight Unit'),
            'production_cost' => Yii::t('app', 'Production Cost'),
            'shipping_f2dc' => Yii::t('app', 'Shipping F2dc'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttributeNvs()
    {
        return $this->hasMany(ProductAttributeNv::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttributes()
    {
        return $this->hasOne(ProductAttributes::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasOne(ProductImages::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPricings()
    {
        return $this->hasMany(ProductPricing::className(), ['product_product_id' => 'product_id', 'product_lang' => 'lang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductProperties()
    {
        return $this->hasMany(ProductProperties::className(), ['product_id' => 'product_id']);
    }
}
