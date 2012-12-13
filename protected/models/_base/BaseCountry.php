<?php

/**
 * This is the model base class for the table "country".
 *
 * Columns in table "country" available as properties of the model:
 
      * @property integer $country_id
      * @property string $country_name
 *
 * Relations of table "country" available as properties of the model:
 * @property State[] $states
 */
abstract class BaseCountry extends CActiveRecord {
	public $value;
	public $id;
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'country';
    }

    public function rules() {
        return array(
            array('country_id', 'required'),
            array('country_name', 'default', 'setOnEmpty' => true, 'value' => null),
            array('country_id', 'numerical', 'integerOnly' => true),
            array('country_name', 'length', 'max' => 120),
            array('value', 'length', 'max' => 120),
            array('country_id, country_name', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->country_name;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'states' => array(self::HAS_MANY, 'State', 'country_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'country_id' => Yii::t('app', 'Country'),
            'country_name' => Yii::t('app', 'Country Name'),
            'value' => Yii::t('app', 'Country Name'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('country_id', $this->country_id);
        $criteria->compare('country_name', $this->country_name, true);
        $criteria->compare('value', $this->country_name, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}