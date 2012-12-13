<?php
$this->breadcrumbs = array(
    Yii::t('app', 'States') => array('index'),
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
$.fn.yiiGridView.update('state-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'States'); ?> </h1>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'),'#',array('class'=>'search-button')); ?><div class="search-form" style="display: none">
    <?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'state-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
        'state_id',
        'state_name',
        array(
                			'name'   => 'country_id',
                      'value'  => 'isset($data->country->country_name)?$data->country->country_name:"N/A"',
                      'filter' => CHtml::listData(::model()->findAll(),'country_id','country_name'),
                ),
array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>