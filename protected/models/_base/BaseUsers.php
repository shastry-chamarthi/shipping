<?php

/**
 * This is the model base class for the table "users".
 *
 * Columns in table "users" available as properties of the model:
 
      * @property integer $user_id
      * @property string $user_name
      * @property string $password
      * @property string $created_on
      * @property integer $created_by
      * @property integer $modified_by
      * @property integer $role_id
 *
 * Relations of table "users" available as properties of the model:
 * @property Account[] $accounts
 * @property Account[] $accounts1
 * @property Awb[] $awbs
 * @property Awb[] $awbs1
 * @property ForwardingStatus[] $forwardingStatuses
 * @property ForwardingStatus[] $forwardingStatuses1
 * @property PaymentType[] $paymentTypes
 * @property PaymentType[] $paymentTypes1
 * @property TransactionTypes[] $transactionTypes
 * @property TransactionTypes[] $transactionTypes1
 * @property UserPreferences[] $userPreferences
 * @property Users $createdBy
 * @property Users[] $users
 * @property Users $modifiedBy
 * @property Users[] $users1
 * @property Roles $role
 * @property Account $user
 */
abstract class BaseUsers extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'users';
    }

    public function rules() {
        return array(
            array('user_name, password, created_on, created_by, modified_by, role_id', 'required'),
            array('created_by, modified_by, role_id', 'numerical', 'integerOnly' => true),
            array('user_name, password', 'length', 'max' => 150),
            array('user_id, user_name, password, created_on, created_by, modified_by, role_id', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->user_name;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'accounts' => array(self::HAS_MANY, 'Account', 'created_by'),
            'accounts1' => array(self::HAS_MANY, 'Account', 'modified_by'),
            'awbs' => array(self::HAS_MANY, 'Awb', 'modified_by'),
            'awbs1' => array(self::HAS_MANY, 'Awb', 'created_by'),
            'forwardingStatuses' => array(self::HAS_MANY, 'ForwardingStatus', 'created_by'),
            'forwardingStatuses1' => array(self::HAS_MANY, 'ForwardingStatus', 'modified_by'),
            'paymentTypes' => array(self::HAS_MANY, 'PaymentType', 'created_by'),
            'paymentTypes1' => array(self::HAS_MANY, 'PaymentType', 'modified_by'),
            'transactionTypes' => array(self::HAS_MANY, 'TransactionTypes', 'created_by'),
            'transactionTypes1' => array(self::HAS_MANY, 'TransactionTypes', 'modified_by'),
            'userPreferences' => array(self::HAS_MANY, 'UserPreferences', 'user_id'),
            'createdBy' => array(self::BELONGS_TO, 'Users', 'created_by'),
            'users' => array(self::HAS_MANY, 'Users', 'created_by'),
            'modifiedBy' => array(self::BELONGS_TO, 'Users', 'modified_by'),
            'users1' => array(self::HAS_MANY, 'Users', 'modified_by'),
            'role' => array(self::BELONGS_TO, 'Roles', 'role_id'),
            'user' => array(self::BELONGS_TO, 'Account', 'user_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'user_id' => Yii::t('app', 'User'),
            'user_name' => Yii::t('app', 'User Name'),
            'password' => Yii::t('app', 'Password'),
            'created_on' => Yii::t('app', 'Created On'),
            'created_by' => Yii::t('app', 'Created By'),
            'modified_by' => Yii::t('app', 'Modified By'),
            'role_id' => Yii::t('app', 'Role'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('user_name', $this->user_name, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('modified_by', $this->modified_by);
        $criteria->compare('role_id', $this->role_id);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}