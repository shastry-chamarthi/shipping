<?php

Yii::import('application.models._base.BaseTransactionTypes');

class TransactionTypes extends BaseTransactionTypes{
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }
}