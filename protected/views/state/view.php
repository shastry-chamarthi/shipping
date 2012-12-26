<?php
$this->breadcrumbs = array(
    Yii::t('app', 'States') => array('index'),
    Yii::t('app', $model->state_name),
);if(!isset($this->menu) || $this->menu === array()) {
$this->menu=array(
array('label'=>Yii::t('app', 'Update') , 'url'=>array('update', 'id'=>$model->state_id)),
array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->state_id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
/*array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),*/
);
}
?>

<h1><?php echo $model->state_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
'data' => $model,
'attributes' => array(
'state_id','state_name',		array(
			'name'=>'country_id',
			'value'=>($model->country !== null)?CHtml::link($model->country->country_name, array('/country/view','id'=>$model->country->country_id)).' ':'n/a',
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
        <?php if (count($model->cities)) { ?>
                            <h2><?php echo CHtml::link(Yii::t('app', Awecms::pluralize('Sub-Page', 'Cities', count($model->cities))), array('/city'));?></h2>
<ul>
			<?php if (is_array($model->cities)) foreach($model->cities as $foreignobj) { 

					echo '<li>';
					echo CHtml::link($foreignobj->city_name, array('/city/view','id'=>$foreignobj->city_id));
							
					}
						?></ul>
            <?php } ?>