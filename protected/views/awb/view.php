<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Awbs') => array('index'),
    Yii::t('app', $model->date),
);if(!isset($this->menu) || $this->menu === array()) {
$this->menu=array(
array('label'=>Yii::t('app', 'Update') , 'url'=>array('update', 'id'=>$model->id)),
array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
/*array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),*/
);
}
?>

<h1><?php echo $model->date; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
'data' => $model,
'attributes' => array(
array(
                        'name'=>'id',
                        'visible'=>Yii::app()->user->id=='admin'
                    ),'date','airway_bill_no','company_id','to_addr_line1','to_addr_line2',		array(
			'name'=>'to_city_id',
			'value'=>($model->toCity !== null)?CHtml::link($model->toCity->city_name, array('/city/view','city_id'=>$model->toCity->city_id)).' ':'n/a',
			'type'=>'html',
		),
		array(
			'name'=>'to_state_id',
			'value'=>($model->toState !== null)?CHtml::link($model->toState->state_name, array('/state/view','state_id'=>$model->toState->state_id)).' ':'n/a',
			'type'=>'html',
		),
'to_contact_number','to_contact_person','to_zip','from_addr_line1','from_addr_line2',		array(
			'name'=>'from_city_id',
			'value'=>($model->fromCity !== null)?CHtml::link($model->fromCity->city_name, array('/city/view','city_id'=>$model->fromCity->city_id)).' ':'n/a',
			'type'=>'html',
		),
		array(
			'name'=>'from_state_id',
			'value'=>($model->fromState !== null)?CHtml::link($model->fromState->state_name, array('/state/view','state_id'=>$model->fromState->state_id)).' ':'n/a',
			'type'=>'html',
		),
'from_contact','from_zip','pkg_weight','pkg_dimension_w','pkg_dimension_h','pkg_dimension_l','number_of_articles','billed_weight','pkg_type','amount',		array(
			'name'=>'transaction_type_id',
			'value'=>($model->transactionType !== null)?CHtml::link($model->transactionType->transaction_type_name, array('/transactionTypes/view','transaction_type_id'=>$model->transactionType->transaction_type_id)).' ':'n/a',
			'type'=>'html',
		),
		array(
			'name'=>'agent_id',
			'value'=>($model->agent !== null)?CHtml::link($model->agent->account_name, array('/account/view','account_id'=>$model->agent->account_id)).' ':'n/a',
			'type'=>'html',
		),
'forwarding_no',		array(
			'name'=>'forwarding_company_id',
			'value'=>($model->forwardingCompany !== null)?CHtml::link($model->forwardingCompany->forwarding_company_name, array('/forwardingCompany/view','forwarding_company_id'=>$model->forwardingCompany->forwarding_company_id)).' ':'n/a',
			'type'=>'html',
		),
'forwarding_updated',		array(
			'name'=>'payment_type_id',
			'value'=>($model->paymentType !== null)?CHtml::link($model->paymentType->payment_type_name, array('/paymentType/view','payment_type_id'=>$model->paymentType->payment_type_id)).' ':'n/a',
			'type'=>'html',
		),
'modified_on','created_on',		array(
			'name'=>'modified_by',
			'value'=>($model->modifiedBy !== null)?CHtml::link($model->modifiedBy->user_name, array('/users/view','user_id'=>$model->modifiedBy->user_id)).' ':'n/a',
			'type'=>'html',
		),
		array(
			'name'=>'created_by',
			'value'=>($model->createdBy !== null)?CHtml::link($model->createdBy->user_name, array('/users/view','user_id'=>$model->createdBy->user_id)).' ':'n/a',
			'type'=>'html',
		),
)));?>
        <?php if (count($model->forwardingStatuses)) { ?>
                            <h2><?php echo CHtml::link(Yii::t('app', Awecms::pluralize('Sub-Page', 'ForwardingStatuses', count($model->forwardingStatuses))), array('/forwardingStatus'));?></h2>
<ul>
			<?php if (is_array($model->forwardingStatuses)) foreach($model->forwardingStatuses as $foreignobj) { 

					echo '<li>';
					echo CHtml::link($foreignobj->Status, array('/forwardingStatus/view','forwarding_status_id'=>$foreignobj->forwarding_status_id));
							
					}
						?></ul>
            <?php } ?>