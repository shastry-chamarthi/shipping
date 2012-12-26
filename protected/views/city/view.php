<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Cities') => array('index'),
    Yii::t('app', $model->city_name),
);if(!isset($this->menu) || $this->menu === array()) {
$this->menu=array(
array('label'=>Yii::t('app', 'Update') , 'url'=>array('update', 'id'=>$model->city_id)),
array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->city_id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
/*array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),*/
);
}
?>

<h1><?php echo $model->city_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
'data' => $model,
'attributes' => array(
'city_id','city_name',		array(
			'name'=>'state_id',
			'value'=>($model->state !== null)?CHtml::link($model->state->state_name, array('/state/view','id'=>$model->state->state_id)).' ':'n/a',
			'type'=>'html',
		),
)));?>
        <?php if (count($model->accounts)) { ?>
                            <h2><?php echo CHtml::link(Yii::t('app', Awecms::pluralize('Sub-Page', 'Accounts', count($model->accounts))), array('/account'));?></h2>
<ul>
			<?php if (is_array($model->accounts)) foreach($model->accounts as $foreignobj) { 

					echo '<li>';
					echo CHtml::link($foreignobj->account_name, array('/account/view','id'=>$foreignobj->account_id));
							
					}
						?></ul>
            <?php } ?>
        <?php if (count($model->awbs)) { ?>
                            <h2><?php echo CHtml::link(Yii::t('app', Awecms::pluralize('Sub-Page', 'Awbs', count($model->awbs))), array('/awb'));?></h2>
<ul>
			<?php if (is_array($model->awbs)) foreach($model->awbs as $foreignobj) { 

					echo '<li>';
					echo CHtml::link($foreignobj->date, array('/awb/view','id'=>$foreignobj->id));
							
					}
						?></ul>
            <?php } ?>
        <?php if (count($model->awbs1)) { ?>
                            <h2><?php echo CHtml::link(Yii::t('app', Awecms::pluralize('Sub-Page', 'Awbs1', count($model->awbs1))), array('/awb'));?></h2>
<ul>
			<?php if (is_array($model->awbs1)) foreach($model->awbs1 as $foreignobj) { 

					echo '<li>';
					echo CHtml::link($foreignobj->date, array('/awb/view','id'=>$foreignobj->id));
							
					}
						?></ul>
            <?php } ?>