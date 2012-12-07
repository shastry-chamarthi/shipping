<?php

Yii::import('application.models._base.BaseAccount');

class Account extends BaseAccount{
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }
}