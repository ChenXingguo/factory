<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property string $code
 * @property string $name
 *
 * @property Contact[] $contacts
 */
class Roles extends \yii\db\ActiveRecord
{
    const ROLE_EMP = 'emp';
    const ROLE_EXEC = 'exec';
    const ROLE_ADMIN = 'admin';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['code'], 'string', 'max' => 5],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contact::className(), ['roles_code' => 'code']);
    }
}
