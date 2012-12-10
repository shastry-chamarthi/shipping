<?php

/**
 * This is the model base class for the table "user".
 *
 * Columns in table "user" available as properties of the model:
 
      * @property integer $user_id
      * @property string $username
      * @property string $password
      * @property string $created_on
      * @property integer $created_by
      * @property integer $modified_by
      * @property integer $role_id
      * @property string $email
      * @property string $lastvisit_at
      * @property integer $superuser
      * @property integer $status
      * @property string $activkey
 *
 * Relations of table "user" available as properties of the model:
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
 * @property Roles $role
 * @property UserPreferences[] $userPreferences
 */
abstract class BaseUser extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'user';
    }

    public function rules() {
        return array(
            array('username, password, created_on, created_by, modified_by, role_id, email', 'required'),
            array('lastvisit_at, superuser, status, activkey', 'default', 'setOnEmpty' => true, 'value' => null),
            array('created_by, modified_by, role_id, superuser, status', 'numerical', 'integerOnly' => true),
            array('email', 'email'),
            array('username, password, email, activkey', 'length', 'max' => 150),
            array('lastvisit_at', 'safe'),
            array('user_id, username, password, created_on, created_by, modified_by, role_id, email, lastvisit_at, superuser, status, activkey', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->username;
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
            'role' => array(self::BELONGS_TO, 'Roles', 'role_id'),
            'userPreferences' => array(self::HAS_MANY, 'UserPreferences', 'user_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'user_id' => Yii::t('app', 'User'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'created_on' => Yii::t('app', 'Created On'),
            'created_by' => Yii::t('app', 'Created By'),
            'modified_by' => Yii::t('app', 'Modified By'),
            'role_id' => Yii::t('app', 'Role'),
            'email' => Yii::t('app', 'Email'),
            'lastvisit_at' => Yii::t('app', 'Lastvisit At'),
            'superuser' => Yii::t('app', 'Superuser'),
            'status' => Yii::t('app', 'Status'),
            'activkey' => Yii::t('app', 'Activkey'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('modified_by', $this->modified_by);
        $criteria->compare('role_id', $this->role_id);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('lastvisit_at', $this->lastvisit_at, true);
        $criteria->compare('superuser', $this->superuser);
        $criteria->compare('status', $this->status);
        $criteria->compare('activkey', $this->activkey, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}