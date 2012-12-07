<?php
class AwbController extends Controller {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create','update'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Awb');
        $this->render('index', array(
                'dataProvider' => $dataProvider,
        ));
    }
        
    public function actionView($id) {
        $this->render('view', array(
                'model' => $this->loadModel($id),
        ));
    }
        
    public function actionCreate() {
        $model = new Awb;
                if (isset($_POST['Awb'])) {
            $model->setAttributes($_POST['Awb']);

			 if (isset($_POST['Awb']['toCity'])) $model->toCity = $_POST['Awb']['toCity'];
			 if (isset($_POST['Awb']['forwardingCompany'])) $model->forwardingCompany = $_POST['Awb']['forwardingCompany'];
			 if (isset($_POST['Awb']['toState'])) $model->toState = $_POST['Awb']['toState'];
			 if (isset($_POST['Awb']['fromCity'])) $model->fromCity = $_POST['Awb']['fromCity'];
			 if (isset($_POST['Awb']['fromState'])) $model->fromState = $_POST['Awb']['fromState'];
			 if (isset($_POST['Awb']['transactionType'])) $model->transactionType = $_POST['Awb']['transactionType'];
			 if (isset($_POST['Awb']['agent'])) $model->agent = $_POST['Awb']['agent'];
			 if (isset($_POST['Awb']['paymentType'])) $model->paymentType = $_POST['Awb']['paymentType'];
			 if (isset($_POST['Awb']['modifiedBy'])) $model->modifiedBy = $_POST['Awb']['modifiedBy'];
			 if (isset($_POST['Awb']['createdBy'])) $model->createdBy = $_POST['Awb']['createdBy'];
                
                try {
                    if($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                            $this->redirect($_GET['returnUrl']);
                    } else {
                            $this->redirect(array('view','id'=>$model->id));
                    }
                }
                } catch (Exception $e) {
                        $model->addError('', $e->getMessage());
                }
        } elseif(isset($_GET['Awb'])) {
                        $model->attributes = $_GET['Awb'];
        }

        $this->render('create',array( 'model'=>$model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        
        if(isset($_POST['Awb'])) {
            $model->setAttributes($_POST['Awb']);
if (isset($_POST['Awb']['toCity'])) $model->toCity = $_POST['Awb']['toCity'];
		else
		$model->toCity = array();
if (isset($_POST['Awb']['forwardingCompany'])) $model->forwardingCompany = $_POST['Awb']['forwardingCompany'];
		else
		$model->forwardingCompany = array();
if (isset($_POST['Awb']['toState'])) $model->toState = $_POST['Awb']['toState'];
		else
		$model->toState = array();
if (isset($_POST['Awb']['fromCity'])) $model->fromCity = $_POST['Awb']['fromCity'];
		else
		$model->fromCity = array();
if (isset($_POST['Awb']['fromState'])) $model->fromState = $_POST['Awb']['fromState'];
		else
		$model->fromState = array();
if (isset($_POST['Awb']['transactionType'])) $model->transactionType = $_POST['Awb']['transactionType'];
		else
		$model->transactionType = array();
if (isset($_POST['Awb']['agent'])) $model->agent = $_POST['Awb']['agent'];
		else
		$model->agent = array();
if (isset($_POST['Awb']['paymentType'])) $model->paymentType = $_POST['Awb']['paymentType'];
		else
		$model->paymentType = array();
if (isset($_POST['Awb']['modifiedBy'])) $model->modifiedBy = $_POST['Awb']['modifiedBy'];
		else
		$model->modifiedBy = array();
if (isset($_POST['Awb']['createdBy'])) $model->createdBy = $_POST['Awb']['createdBy'];
		else
		$model->createdBy = array();
                try {
                    if($model->save()) {
                        if (isset($_GET['returnUrl'])) {
                                $this->redirect($_GET['returnUrl']);
                        } else {
                                $this->redirect(array('view','id'=>$model->id));
                        }
                    }
                } catch (Exception $e) {
                        $model->addError('', $e->getMessage());
                }

            }

        $this->render('update',array(
                'model'=>$model,
                ));
    }
                
               

    public function actionDelete($id) {
        if(Yii::app()->request->isPostRequest) {    
            try {
                $this->loadModel($id)->delete();
            } catch (Exception $e) {
                    throw new CHttpException(500,$e->getMessage());
            }

            if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                            $this->redirect(array('admin'));
            }
        }
        else
            throw new CHttpException(400,
                Yii::t('app', 'Invalid request.'));
    }
                
    public function actionAdmin() {
        $model = new Awb('search');
        $model->unsetAttributes();

        if (isset($_GET['Awb']))
                $model->setAttributes($_GET['Awb']);

        $this->render('admin', array(
                'model' => $model,
        ));
    }
    
    
    public function loadModel($id) {
            $model=Awb::model()->findByPk($id);
            if($model===null)
                    throw new CHttpException(404,Yii::t('app', 'The requested page does not exist.'));
            return $model;
    }

}