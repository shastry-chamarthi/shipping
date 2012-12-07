<?php

/**
 * This is the model base class for the table "forwarding_status".
 *
 * Columns in table "forwarding_status" available as properties of the model:
 
      * @property integer $forwarding_status_id
      * @property integer $airway_bill_id
      * @property string $Status
      * @property string $created_on
      * @property integer $created_by
      * @property integer $modified_by
 *
 * Relations of table "forwarding_status" available as properties of the model:
 * @property Awb $airwayBill
 * @property Users $createdBy
 * @property Users $modifiedBy
 */
abstract class BaseForwardingStatus extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'forwarding_status';
    }

    public function rules() {
        return array(
            array('airway_bill_id, Status, created_on, created_by, modified_by', 'required'),
            array('airway_bill_id, created_by, modified_by', 'numerical', 'integerOnly' => true),
            array('Status', 'length', 'max' => 150),
            array('forwarding_status_id, airway_bill_id, Status, created_on, created_by, modified_by', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->Status;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'airwayBill' => array(self::BELONGS_TO, 'Awb', 'airway_bill_id'),
            'createdBy' => array(self::BELONGS_TO, 'Users', 'created_by'),
            'modifiedBy' => array(self::BELONGS_TO, 'Users', 'modified_by'),
        );
    }

    public function attributeLabels() {
        return array(
            'forwarding_status_id' => Yii::t('app', 'Forwarding Status'),
            'airway_bill_id' => Yii::t('app', 'Airway Bill'),
            'Status' => Yii::t('app', 'Status'),
            'created_on' => Yii::t('app', 'Created On'),
            'created_by' => Yii::t('app', 'Created By'),
            'modified_by' => Yii::t('app', 'Modified By'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('forwarding_status_id', $this->forwarding_status_id);
        $criteria->compare('airway_bill_id', $this->airway_bill_id);
        $criteria->compare('Status', $this->Status, true);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('modified_by', $this->modified_by);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}