<?php

class DefaultController extends Controller
{
	public function filters()
	{
		return CMap::mergeArray(parent::filters(),array(
			'accessControl', // perform access control for CRUD operations
		));
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','index'),
				'users'=>UserModule::getAdmins(),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view'),
				'users'=>UserModule::getAdmins(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User', array(
			'criteria'=>array(
		        'condition'=>'status>'.User::STATUS_BANNED,
		    ),
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));

		$this->render('/user/index',array(
			'dataProvider'=>$dataProvider,
		));
	}

}