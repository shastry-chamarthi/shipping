<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Countries') => array('index'),
    Yii::t('app', $model->country_name) => array('view','country_id'=>$model->country_id),
    Yii::t('app', 'Update'),
);
if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->country_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
	//array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app', 'Update');?> <?php echo $model->country_name; ?> </h1>
<?php
$this->renderPartial('_form', array(
			'model'=>$model));
?>