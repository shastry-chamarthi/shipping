<?php

/**
 * This is the model base class for the table "account".
 *
 * Columns in table "account" available as properties of the model:
 
      * @property integer $account_id
      * @property integer $account_type_id
      * @property string $account_name
      * @property integer $contact_id
      * @property string $addr_line1
      * @property string $addr_line2
      * @property integer $city_id
      * @property integer $state_id
      * @property string $zip
      * @property integer $credit_limit
      * @property integer $billing_cycle_id
      * @property integer $is_active
      * @property string $created_on
      * @property integer $created_by
      * @property integer $modified_by
 *
 * Relations of table "account" available as properties of the model:
 * @property AccountType $accountType
 * @property BillingCycle $billingCycle
 * @property City $city
 * @property Contact $contact
 * @property State $state
 * @property Users $createdBy
 * @property Users $modifiedBy
 * @property Awb[] $awbs
 * @property Users $users
 */
abstract class BaseAccount extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'account';
    }

    public function rules() {
        return array(
            array('account_type_id, account_name, contact_id, addr_line1, addr_line2, city_id, state_id, zip, credit_limit, billing_cycle_id, is_active, created_on, created_by, modified_by', 'required'),
            array('account_type_id, contact_id, city_id, state_id, credit_limit, billing_cycle_id, is_active, created_by, modified_by', 'numerical', 'integerOnly' => true),
            array('account_name, addr_line1, addr_line2', 'length', 'max' => 150),
            array('zip', 'length', 'max' => 10),
            array('account_id, account_type_id, account_name, contact_id, addr_line1, addr_line2, city_id, state_id, zip, credit_limit, billing_cycle_id, is_active, created_on, created_by, modified_by', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->account_name;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'accountType' => array(self::BELONGS_TO, 'AccountType', 'account_type_id'),
            'billingCycle' => array(self::BELONGS_TO, 'BillingCycle', 'billing_cycle_id'),
            'city' => array(self::BELONGS_TO, 'City', 'city_id'),
            'contact' => array(self::BELONGS_TO, 'Contact', 'contact_id'),
            'state' => array(self::BELONGS_TO, 'State', 'state_id'),
            'createdBy' => array(self::BELONGS_TO, 'Users', 'created_by'),
            'modifiedBy' => array(self::BELONGS_TO, 'Users', 'modified_by'),
            'awbs' => array(self::HAS_MANY, 'Awb', 'agent_id'),
            'users' => array(self::HAS_ONE, 'Users', 'user_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'account_id' => Yii::t('app', 'Account'),
            'account_type_id' => Yii::t('app', 'Account Type'),
            'account_name' => Yii::t('app', 'Account Name'),
            'contact_id' => Yii::t('app', 'Contact'),
            'addr_line1' => Yii::t('app', 'Addr Line1'),
            'addr_line2' => Yii::t('app', 'Addr Line2'),
            'city_id' => Yii::t('app', 'City'),
            'state_id' => Yii::t('app', 'State'),
            'zip' => Yii::t('app', 'Zip'),
            'credit_limit' => Yii::t('app', 'Credit Limit'),
            'billing_cycle_id' => Yii::t('app', 'Billing Cycle'),
            'is_active' => Yii::t('app', 'Is Active'),
            'created_on' => Yii::t('app', 'Created On'),
            'created_by' => Yii::t('app', 'Created By'),
            'modified_by' => Yii::t('app', 'Modified By'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('account_id', $this->account_id);
        $criteria->compare('account_type_id', $this->account_type_id);
        $criteria->compare('account_name', $this->account_name, true);
        $criteria->compare('contact_id', $this->contact_id);
        $criteria->compare('addr_line1', $this->addr_line1, true);
        $criteria->compare('addr_line2', $this->addr_line2, true);
        $criteria->compare('city_id', $this->city_id);
        $criteria->compare('state_id', $this->state_id);
        $criteria->compare('zip', $this->zip, true);
        $criteria->compare('credit_limit', $this->credit_limit);
        $criteria->compare('billing_cycle_id', $this->billing_cycle_id);
        $criteria->compare('is_active', $this->is_active);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('modified_by', $this->modified_by);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}