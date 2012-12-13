<?php

/**
 * This is the model base class for the table "state".
 *
 * Columns in table "state" available as properties of the model:
 
      * @property integer $state_id
      * @property string $state_name
      * @property integer $country_id
 *
 * Relations of table "state" available as properties of the model:
 * @property Account[] $accounts
 * @property Awb[] $awbs
 * @property Awb[] $awbs1
 * @property City[] $cities
 * @property Country $country
 */
abstract class BaseState extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'state';
    }

    public function rules() {
        return array(
            array('state_name', 'required'),
            array('country_id', 'default', 'setOnEmpty' => true, 'value' => null),
            array('country_id', 'numerical', 'integerOnly' => true),
            array('state_name', 'length', 'max' => 150),
            array('state_id, state_name, country_id', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->state_name;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'accounts' => array(self::HAS_MANY, 'Account', 'state_id'),
            'awbs' => array(self::HAS_MANY, 'Awb', 'to_state_id'),
            'awbs1' => array(self::HAS_MANY, 'Awb', 'from_state_id'),
            'cities' => array(self::HAS_MANY, 'City', 'state_id'),
            'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'state_id' => Yii::t('app', 'State'),
            'state_name' => Yii::t('app', 'State Name'),
            'country_id' => Yii::t('app', 'Country'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('state_id', $this->state_id);
        $criteria->compare('state_name', $this->state_name, true);
        $criteria->compare('country_id', $this->country_id);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}