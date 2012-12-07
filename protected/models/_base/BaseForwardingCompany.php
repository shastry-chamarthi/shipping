<?php

/**
 * This is the model base class for the table "forwarding_company".
 *
 * Columns in table "forwarding_company" available as properties of the model:
 
      * @property integer $forwarding_company_id
      * @property string $forwarding_company_url
      * @property string $forwarding_company_name
      * @property string $forwarding_company_api_key
      * @property string $network_name
 *
 * Relations of table "forwarding_company" available as properties of the model:
 * @property Awb[] $awbs
 */
abstract class BaseForwardingCompany extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'forwarding_company';
    }

    public function rules() {
        return array(
            array('forwarding_company_url, forwarding_company_name, forwarding_company_api_key, network_name', 'required'),
            array('forwarding_company_name, forwarding_company_api_key', 'length', 'max' => 150),
            array('network_name', 'length', 'max' => 10),
            array('forwarding_company_id, forwarding_company_url, forwarding_company_name, forwarding_company_api_key, network_name', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->forwarding_company_url;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'awbs' => array(self::HAS_MANY, 'Awb', 'forwarding_company_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'forwarding_company_id' => Yii::t('app', 'Forwarding Company'),
            'forwarding_company_url' => Yii::t('app', 'Forwarding Company Url'),
            'forwarding_company_name' => Yii::t('app', 'Forwarding Company Name'),
            'forwarding_company_api_key' => Yii::t('app', 'Forwarding Company Api Key'),
            'network_name' => Yii::t('app', 'Network Name'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('forwarding_company_id', $this->forwarding_company_id);
        $criteria->compare('forwarding_company_url', $this->forwarding_company_url, true);
        $criteria->compare('forwarding_company_name', $this->forwarding_company_name, true);
        $criteria->compare('forwarding_company_api_key', $this->forwarding_company_api_key, true);
        $criteria->compare('network_name', $this->network_name, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}