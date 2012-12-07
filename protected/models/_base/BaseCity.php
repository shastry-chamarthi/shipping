<?php

/**
 * This is the model base class for the table "city".
 *
 * Columns in table "city" available as properties of the model:
 
      * @property integer $city_id
      * @property string $city_name
      * @property integer $state_id
 *
 * Relations of table "city" available as properties of the model:
 * @property Account[] $accounts
 * @property Awb[] $awbs
 * @property Awb[] $awbs1
 * @property State $state
 */
abstract class BaseCity extends CActiveRecord {
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'city';
    }

    public function rules() {
        return array(
            array('city_name, state_id', 'required'),
            array('state_id', 'numerical', 'integerOnly' => true),
            array('city_name', 'length', 'max' => 150),
            array('city_id, city_name, state_id', 'safe', 'on' => 'search'),
        );
    }
    
    public function __toString() {
        return (string) $this->city_name;
    }

    public function behaviors() {
        return array(
        'activerecord-relation' => array('class' => 'EActiveRecordRelationBehavior')
);
    }

    public function relations() {
        return array(
            'accounts' => array(self::HAS_MANY, 'Account', 'city_id'),
            'awbs' => array(self::HAS_MANY, 'Awb', 'to_city_id'),
            'awbs1' => array(self::HAS_MANY, 'Awb', 'from_city_id'),
            'state' => array(self::BELONGS_TO, 'State', 'state_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'city_id' => Yii::t('app', 'City'),
            'city_name' => Yii::t('app', 'City Name'),
            'state_id' => Yii::t('app', 'State'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('city_id', $this->city_id);
        $criteria->compare('city_name', $this->city_name, true);
        $criteria->compare('state_id', $this->state_id);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
}