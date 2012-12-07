<?php

/**
 * This is the model base class for the table "awb".
 *
 * Columns in table "awb" available as properties of the model:
 
      * @property integer $id
      * @property string $date
      * @property integer $airway_bill_no
      * @property integer $company_id
      * @property string $to_addr_line1
      * @property string $to_addr_line2
      * @property integer $to_city_id
      * @property integer $to_state_id
      * @property string $to_contact_number
      * @property string $to_contact_person
      * @property string $to_zip
      * @property string $from_addr_line1
      * @property string $from_addr_line2
      * @property integer $from_city_id
      * @property integer $from_state_id
      * @property string $from_contact
      * @property string $from_zip
      * @property string $pkg_weight
      * @property string $pkg_dimension_w
      * @property string $pkg_dimension_h
      * @property string $pkg_dimension_l
      * @property integer $number_of_articles
      * @property string $billed_weight
      * @property string $pkg_type
      * @property string $amount
      * @property integer $transaction_type_id
      * @property integer $agent_id
      * @property integer $forwarding_no
      * @property integer $forwarding_company_id
      * @property integer $forwarding_updated
      * @property integer $payment_type_id
      * @property string $created_on
      * @property integer $modified_by
      * @property integer $created_by
 *
 * Relations of table "awb" available as properties of the model:
 * @property City $toCity
 * @property ForwardingCompany $forwardingCompany
 * @property State $toState
 * @property City $fromCity
 * @property State $fromState
 * @property TransactionTypes $transactionType
 * @property Account $agent
 * @property PaymentType $paymentType
 * @property Users $modifiedBy
 * @property Users $createdBy
 * @property ForwardingStatus[] $forwardingStatuses
 */
abstract class BaseAwb extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'awb';
    }

    public function rules() {
        return array(
            array('date, airway_bill_no, company_id, to_addr_line1, to_addr_line2, to_city_id, to_state_id, to_contact_number, to_contact_person, to_zip, from_addr_line1, from_addr_line2, from_city_id, from_state_id, from_contact, from_zip, pkg_weight, pkg_dimension_w, pkg_dimension_h, pkg_dimension_l, number_of_articles, billed_weight, pkg_type, amount, transaction_type_id, agent_id, forwarding_no, forwarding_company_id, forwarding_updated, payment_type_id, created_on, modified_by, created_by', 'required'),
            array('id', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, airway_bill_no, company_id, to_city_id, to_state_id, from_city_id, from_state_id, number_of_articles, transaction_type_id, agent_id, forwarding_no, forwarding_company_id, forwarding_updated, payment_type_id, modified_by, created_by', 'numerical', 'integerOnly' => true),
            array('to_addr_line1, to_addr_line2, to_contact_number, to_contact_person, from_addr_line1, from_addr_line2, from_contact', 'length', 'max' => 150),
            array('to_zip, from_zip, pkg_weight, pkg_dimension_w, pkg_dimension_h, pkg_dimension_l, billed_weight, pkg_type, amount', 'length', 'max' => 10),
            array('id, date, airway_bill_no, company_id, to_addr_line1, to_addr_line2, to_city_id, to_state_id, to_contact_number, to_contact_person, to_zip, from_addr_line1, from_addr_line2, from_city_id, from_state_id, from_contact, from_zip, pkg_weight, pkg_dimension_w, pkg_dimension_h, pkg_dimension_l, number_of_articles, billed_weight, pkg_type, amount, transaction_type_id, agent_id, forwarding_no, forwarding_company_id, forwarding_updated, payment_type_id, created_on, modified_by, created_by', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->date;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'toCity' => array(self::BELONGS_TO, 'City', 'to_city_id'),
            'forwardingCompany' => array(self::BELONGS_TO, 'ForwardingCompany', 'forwarding_company_id'),
            'toState' => array(self::BELONGS_TO, 'State', 'to_state_id'),
            'fromCity' => array(self::BELONGS_TO, 'City', 'from_city_id'),
            'fromState' => array(self::BELONGS_TO, 'State', 'from_state_id'),
            'transactionType' => array(self::BELONGS_TO, 'TransactionTypes', 'transaction_type_id'),
            'agent' => array(self::BELONGS_TO, 'Account', 'agent_id'),
            'paymentType' => array(self::BELONGS_TO, 'PaymentType', 'payment_type_id'),
            'modifiedBy' => array(self::BELONGS_TO, 'Users', 'modified_by'),
            'createdBy' => array(self::BELONGS_TO, 'Users', 'created_by'),
            'forwardingStatuses' => array(self::HAS_MANY, 'ForwardingStatus', 'airway_bill_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'date' => Yii::t('app', 'Date'),
            'airway_bill_no' => Yii::t('app', 'Airway Bill No'),
            'company_id' => Yii::t('app', 'Company'),
            'to_addr_line1' => Yii::t('app', 'To Addr Line1'),
            'to_addr_line2' => Yii::t('app', 'To Addr Line2'),
            'to_city_id' => Yii::t('app', 'To City'),
            'to_state_id' => Yii::t('app', 'To State'),
            'to_contact_number' => Yii::t('app', 'To Contact Number'),
            'to_contact_person' => Yii::t('app', 'To Contact Person'),
            'to_zip' => Yii::t('app', 'To Zip'),
            'from_addr_line1' => Yii::t('app', 'From Addr Line1'),
            'from_addr_line2' => Yii::t('app', 'From Addr Line2'),
            'from_city_id' => Yii::t('app', 'From City'),
            'from_state_id' => Yii::t('app', 'From State'),
            'from_contact' => Yii::t('app', 'From Contact'),
            'from_zip' => Yii::t('app', 'From Zip'),
            'pkg_weight' => Yii::t('app', 'Pkg Weight'),
            'pkg_dimension_w' => Yii::t('app', 'Pkg Dimension W'),
            'pkg_dimension_h' => Yii::t('app', 'Pkg Dimension H'),
            'pkg_dimension_l' => Yii::t('app', 'Pkg Dimension L'),
            'number_of_articles' => Yii::t('app', 'Number Of Articles'),
            'billed_weight' => Yii::t('app', 'Billed Weight'),
            'pkg_type' => Yii::t('app', 'Pkg Type'),
            'amount' => Yii::t('app', 'Amount'),
            'transaction_type_id' => Yii::t('app', 'Transaction Type'),
            'agent_id' => Yii::t('app', 'Agent'),
            'forwarding_no' => Yii::t('app', 'Forwarding No'),
            'forwarding_company_id' => Yii::t('app', 'Forwarding Company'),
            'forwarding_updated' => Yii::t('app', 'Forwarding Updated'),
            'payment_type_id' => Yii::t('app', 'Payment Type'),
            'created_on' => Yii::t('app', 'Created On'),
            'modified_by' => Yii::t('app', 'Modified By'),
            'created_by' => Yii::t('app', 'Created By'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('airway_bill_no', $this->airway_bill_no);
        $criteria->compare('company_id', $this->company_id);
        $criteria->compare('to_addr_line1', $this->to_addr_line1, true);
        $criteria->compare('to_addr_line2', $this->to_addr_line2, true);
        $criteria->compare('to_city_id', $this->to_city_id);
        $criteria->compare('to_state_id', $this->to_state_id);
        $criteria->compare('to_contact_number', $this->to_contact_number, true);
        $criteria->compare('to_contact_person', $this->to_contact_person, true);
        $criteria->compare('to_zip', $this->to_zip, true);
        $criteria->compare('from_addr_line1', $this->from_addr_line1, true);
        $criteria->compare('from_addr_line2', $this->from_addr_line2, true);
        $criteria->compare('from_city_id', $this->from_city_id);
        $criteria->compare('from_state_id', $this->from_state_id);
        $criteria->compare('from_contact', $this->from_contact, true);
        $criteria->compare('from_zip', $this->from_zip, true);
        $criteria->compare('pkg_weight', $this->pkg_weight, true);
        $criteria->compare('pkg_dimension_w', $this->pkg_dimension_w, true);
        $criteria->compare('pkg_dimension_h', $this->pkg_dimension_h, true);
        $criteria->compare('pkg_dimension_l', $this->pkg_dimension_l, true);
        $criteria->compare('number_of_articles', $this->number_of_articles);
        $criteria->compare('billed_weight', $this->billed_weight, true);
        $criteria->compare('pkg_type', $this->pkg_type, true);
        $criteria->compare('amount', $this->amount, true);
        $criteria->compare('transaction_type_id', $this->transaction_type_id);
        $criteria->compare('agent_id', $this->agent_id);
        $criteria->compare('forwarding_no', $this->forwarding_no);
        $criteria->compare('forwarding_company_id', $this->forwarding_company_id);
        $criteria->compare('forwarding_updated', $this->forwarding_updated);
        $criteria->compare('payment_type_id', $this->payment_type_id);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('modified_by', $this->modified_by);
        $criteria->compare('created_by', $this->created_by);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}