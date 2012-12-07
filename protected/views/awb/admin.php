<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Awbs') => array('index'),
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
$.fn.yiiGridView.update('awb-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Awbs'); ?> </h1>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'),'#',array('class'=>'search-button')); ?><div class="search-form" style="display: none">
    <?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'awb-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
        'id',
        'date',
        'airway_bill_no',
        'company_id',
        'to_addr_line1',
        'to_addr_line2',
        array(
                			'name'   => 'to_city_id',
                      'value'  => 'isset($data->toCity->city_name)?$data->toCity->city_name:"N/A"',
                      'filter' => CHtml::listData(::model()->findAll(),'city_id','city_name'),
                ),
        array(
                			'name'   => 'to_state_id',
                      'value'  => 'isset($data->toState->state_name)?$data->toState->state_name:"N/A"',
                      'filter' => CHtml::listData(::model()->findAll(),'state_id','state_name'),
                ),
        'to_contact_number',
        'to_contact_person',
        'to_zip',
        'from_addr_line1',
        'from_addr_line2',
        array(
                			'name'   => 'from_city_id',
                      'value'  => 'isset($data->fromCity->city_name)?$data->fromCity->city_name:"N/A"',
                      'filter' => CHtml::listData(::model()->findAll(),'city_id','city_name'),
                ),
        array(
                			'name'   => 'from_state_id',
                      'value'  => 'isset($data->fromState->state_name)?$data->fromState->state_name:"N/A"',
                      'filter' => CHtml::listData(::model()->findAll(),'state_id','state_name'),
                ),
        'from_contact',
        'from_zip',
        'pkg_weight',
        'pkg_dimension_w',
        'pkg_dimension_h',
        'pkg_dimension_l',
        'number_of_articles',
        'billed_weight',
        'pkg_type',
        'amount',
        array(
                			'name'   => 'transaction_type_id',
                      'value'  => 'isset($data->transactionType->transaction_type_name)?$data->transactionType->transaction_type_name:"N/A"',
                      'filter' => CHtml::listData(::model()->findAll(),'transaction_type_id','transaction_type_name'),
                ),
        array(
                			'name'   => 'agent_id',
                      'value'  => 'isset($data->agent->account_name)?$data->agent->account_name:"N/A"',
                      'filter' => CHtml::listData(::model()->findAll(),'account_id','account_name'),
                ),
        'forwarding_no',
        array(
                			'name'   => 'forwarding_company_id',
                      'value'  => 'isset($data->forwardingCompany->forwarding_company_name)?$data->forwardingCompany->forwarding_company_name:"N/A"',
                      'filter' => CHtml::listData(::model()->findAll(),'forwarding_company_id','forwarding_company_name'),
                ),
        'forwarding_updated',
        array(
                			'name'   => 'payment_type_id',
                      'value'  => 'isset($data->paymentType->payment_type_name)?$data->paymentType->payment_type_name:"N/A"',
                      'filter' => CHtml::listData(::model()->findAll(),'payment_type_id','payment_type_name'),
                ),
        'modified_on',
        'created_on',
        array(
                			'name'   => 'modified_by',
                      'value'  => 'isset($data->modifiedBy->user_name)?$data->modifiedBy->user_name:"N/A"',
                      'filter' => CHtml::listData(::model()->findAll(),'user_id','user_name'),
                ),
        array(
                			'name'   => 'created_by',
                      'value'  => 'isset($data->createdBy->user_name)?$data->createdBy->user_name:"N/A"',
                      'filter' => CHtml::listData(::model()->findAll(),'user_id','user_name'),
                ),
array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>