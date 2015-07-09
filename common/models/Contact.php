<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $company_id
 * @property integer $user_id
 * @property string $roles_code
 * @property string $first_name
 * @property string $last_name
 * @property string $work_phone
 * @property string $mobile_phone
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $province
 * @property string $postal_code
 * @property string $note
 * @property string $created_at
 * @property string $udpated_at
 *
 * @property Company $company
 * @property Roles $rolesCode
 * @property User $user
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'user_id', 'roles_code'], 'required'],
            [['company_id', 'user_id'], 'integer'],
            [['created_at', 'udpated_at'], 'safe'],
            [['roles_code'], 'string', 'max' => 5],
            [['first_name', 'last_name', 'work_phone', 'mobile_phone', 'address1', 'address2', 'city', 'province', 'postal_code'], 'string', 'max' => 45],
            [['note'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => Yii::t('app', 'Company ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'roles_code' => Yii::t('app', 'Roles Code'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'work_phone' => Yii::t('app', 'Work Phone'),
            'mobile_phone' => Yii::t('app', 'Mobile Phone'),
            'address1' => Yii::t('app', 'Address1'),
            'address2' => Yii::t('app', 'Address2'),
            'city' => Yii::t('app', 'City'),
            'province' => Yii::t('app', 'Province'),
            'postal_code' => Yii::t('app', 'Postal Code'),
            'note' => Yii::t('app', 'Note'),
            'created_at' => Yii::t('app', 'Created At'),
            'udpated_at' => Yii::t('app', 'Udpated At'),
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
    public function getRolesCode()
    {
        return $this->hasOne(Roles::className(), ['code' => 'roles_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
