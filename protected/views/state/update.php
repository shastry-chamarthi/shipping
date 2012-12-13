<?php
$this->breadcrumbs = array(
    Yii::t('app', 'States') => array('index'),
    Yii::t('app', $model->state_name) => array('view','state_id'=>$model->state_id),
    Yii::t('app', 'Update'),
);
if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->state_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
	//array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app', 'Update');?> <?php echo $model->state_name; ?> </h1>
<?php
$this->renderPartial('_form', array(
			'model'=>$model));
?>