<?php

Yii::import('application.models._base.BaseUsers');

class Users extends BaseUsers{
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }
}