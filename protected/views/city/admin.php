<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Cities') => array('index'),
    Yii::t('app', 'Manage'),
);
if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('city-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Cities'); ?> </h1>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'),'#',array('class'=>'search-button')); ?><div class="search-form" style="display: none">
    <?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'city-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
        'city_id',
        'city_name',
        array(
                			'name'   => 'state_id',
                      'value'  => 'isset($data->state->state_name)?$data->state->state_name:"N/A"',
                      'filter' => CHtml::listData(::model()->findAll(),'state_id','state_name'),
                ),
array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>