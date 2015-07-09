<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "industries".
 *
 * @property string $code
 * @property string $name
 * @property string $parent_code
 */
class Industries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'industries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['code', 'parent_code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'parent_code' => Yii::t('app', 'Parent Code'),
        ];
    }
}
