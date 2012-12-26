<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Countries') => array('index'),
    Yii::t('app', $model->country_name),
);if(!isset($this->menu) || $this->menu === array()) {
$this->menu=array(
array('label'=>Yii::t('app', 'Update') , 'url'=>array('update', 'id'=>$model->country_id)),
array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->country_id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
/*array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),*/
);
}
?>

<h1><?php echo $model->country_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
'data' => $model,
'attributes' => array(
'country_id','country_name',)));?>
        <?php if (count($model->states)) { ?>
                            <h2><?php echo CHtml::link(Yii::t('app', Awecms::pluralize('Sub-Page', 'States', count($model->states))), array('/state'));?></h2>
<ul>
			<?php if (is_array($model->states)) foreach($model->states as $foreignobj) { 

					echo '<li>';
					echo CHtml::link($foreignobj->state_name, array('/state/view','id'=>$foreignobj->state_id));
							
					}
						?></ul>
            <?php } ?>