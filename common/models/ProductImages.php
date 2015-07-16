<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_images".
 *
 * @property integer $product_id
 * @property integer $seq_no
 * @property string $url
 * @property string $title
 * @property string $alt_text
 * @property string $updated_at
 *
 * @property Product $product
 */
class ProductImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id', 'seq_no'], 'integer'],
            [['updated_at'], 'safe'],
            [['url'], 'string', 'max' => 255],
            [['title', 'alt_text'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'seq_no' => Yii::t('app', 'Seq No'),
            'url' => Yii::t('app', 'Url'),
            'title' => Yii::t('app', 'Title'),
            'alt_text' => Yii::t('app', 'Alt Text'),
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
