<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_attributes".
 *
 * @property integer $product_id
 * @property integer $attribute_id
 * @property integer $section_id
 * @property string $attribute_value
 * @property string $attribute_unit
 * @property string $note
 * @property string $updated_at
 *
 * @property Product $product
 */
class ProductAttributes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_attributes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id', 'attribute_id', 'section_id'], 'integer'],
            [['updated_at'], 'safe'],
            [['attribute_value', 'note'], 'string', 'max' => 255],
            [['attribute_unit'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'attribute_id' => Yii::t('app', 'Attribute ID'),
            'section_id' => Yii::t('app', 'Section ID'),
            'attribute_value' => Yii::t('app', 'Attribute Value'),
            'attribute_unit' => Yii::t('app', 'Attribute Unit'),
            'note' => Yii::t('app', 'Note'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }
}
