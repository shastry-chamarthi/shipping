<?php

/**
 * This is the model base class for the table "payment_type".
 *
 * Columns in table "payment_type" available as properties of the model:
 
      * @property integer $payment_type_id
      * @property string $payment_type_name
      * @property string $created_on
      * @property integer $created_by
      * @property integer $modified_by
 *
 * Relations of table "payment_type" available as properties of the model:
 * @property Awb[] $awbs
 * @property Users $createdBy
 * @property Users $modifiedBy
 */
abstract class BasePaymentType extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'payment_type';
    }

    public function rules() {
        return array(
            array('payment_type_name, created_on, created_by, modified_by', 'required'),
            array('created_by, modified_by', 'numerical', 'integerOnly' => true),
            array('payment_type_name', 'length', 'max' => 150),
            array('payment_type_id, payment_type_name, created_on, created_by, modified_by', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->payment_type_name;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'awbs' => array(self::HAS_MANY, 'Awb', 'payment_type_id'),
            'createdBy' => array(self::BELONGS_TO, 'Users', 'created_by'),
            'modifiedBy' => array(self::BELONGS_TO, 'Users', 'modified_by'),
        );
    }

    public function attributeLabels() {
        return array(
            'payment_type_id' => Yii::t('app', 'Payment Type'),
            'payment_type_name' => Yii::t('app', 'Payment Type Name'),
            'created_on' => Yii::t('app', 'Created On'),
            'created_by' => Yii::t('app', 'Created By'),
            'modified_by' => Yii::t('app', 'Modified By'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('payment_type_id', $this->payment_type_id);
        $criteria->compare('payment_type_name', $this->payment_type_name, true);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('modified_by', $this->modified_by);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}