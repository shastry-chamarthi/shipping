<div class="wide form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'date'); ?>
		<?php $this->widget('CJuiDateTimePicker',
						 array(
							'model'=>$model,
                                                        'name'=>'Awb[date]',
							//'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
                                                        'language'=> 'en',
							'value'=>$model->date,
                                                        'mode' => 'datetime',
							'options'=>array(
                                                                        'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                                                                        'showButtonPanel'=>true,
                                                                        'changeYear'=>true,
                                                                        'changeMonth'=>true,
                                                                        'dateFormat'=>'yy-mm-dd',
                                                                        ),
                                                    )
					);
					; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'airway_bill_no'); ?>
		<?php echo $form->textField($model,'airway_bill_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'company_id'); ?>
		<?php echo $form->textField($model,'company_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'to_addr_line1'); ?>
		<?php echo $form->textField($model,'to_addr_line1',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'to_addr_line2'); ?>
		<?php echo $form->textField($model,'to_addr_line2',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'to_city_id'); ?>
		<?php echo $form->dropDownList($model, 'toCity', CHtml::listData(City::model()->findAll(),'city_id', 'city_name')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'to_state_id'); ?>
		<?php echo $form->dropDownList($model, 'toState', CHtml::listData(State::model()->findAll(),'state_id', 'state_name')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'to_contact_number'); ?>
		<?php echo $form->textField($model,'to_contact_number',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'to_contact_person'); ?>
		<?php echo $form->textField($model,'to_contact_person',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'to_zip'); ?>
		<?php echo $form->textField($model,'to_zip',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'from_addr_line1'); ?>
		<?php echo $form->textField($model,'from_addr_line1',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'from_addr_line2'); ?>
		<?php echo $form->textField($model,'from_addr_line2',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'from_city_id'); ?>
		<?php echo $form->dropDownList($model, 'fromCity', CHtml::listData(City::model()->findAll(),'city_id', 'city_name')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'from_state_id'); ?>
		<?php echo $form->dropDownList($model, 'fromState', CHtml::listData(State::model()->findAll(),'state_id', 'state_name')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'from_contact'); ?>
		<?php echo $form->textField($model,'from_contact',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'from_zip'); ?>
		<?php echo $form->textField($model,'from_zip',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pkg_weight'); ?>
		<?php echo $form->textField($model,'pkg_weight',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pkg_dimension_w'); ?>
		<?php echo $form->textField($model,'pkg_dimension_w',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pkg_dimension_h'); ?>
		<?php echo $form->textField($model,'pkg_dimension_h',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pkg_dimension_l'); ?>
		<?php echo $form->textField($model,'pkg_dimension_l',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'number_of_articles'); ?>
		<?php echo $form->textField($model,'number_of_articles'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'billed_weight'); ?>
		<?php echo $form->textField($model,'billed_weight',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pkg_type'); ?>
		<?php echo $form->textField($model,'pkg_type',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'transaction_type_id'); ?>
		<?php echo $form->dropDownList($model, 'transactionType', CHtml::listData(TransactionTypes::model()->findAll(),'transaction_type_id', 'transaction_type_name')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'agent_id'); ?>
		<?php echo $form->dropDownList($model, 'agent', CHtml::listData(Account::model()->findAll(),'account_id', 'account_name')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'forwarding_no'); ?>
		<?php echo $form->textField($model,'forwarding_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'forwarding_company_id'); ?>
		<?php echo $form->dropDownList($model, 'forwardingCompany', CHtml::listData(ForwardingCompany::model()->findAll(),'forwarding_company_id', 'forwarding_company_name')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'forwarding_updated'); ?>
		<?php echo $form->textField($model,'forwarding_updated'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'payment_type_id'); ?>
		<?php echo $form->dropDownList($model, 'paymentType', CHtml::listData(PaymentType::model()->findAll(),'payment_type_id', 'payment_type_name')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'modified_on'); ?>
		<?php $this->widget('CJuiDateTimePicker',
						 array(
							'model'=>$model,
                                                        'name'=>'Awb[modified_on]',
							//'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
                                                        'language'=> 'en',
							'value'=>$model->modified_on,
                                                        'mode' => 'datetime',
							'options'=>array(
                                                                        'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                                                                        'showButtonPanel'=>true,
                                                                        'changeYear'=>true,
                                                                        'changeMonth'=>true,
                                                                        'dateFormat'=>'yy-mm-dd',
                                                                        ),
                                                    )
					);
					; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'created_on'); ?>
		<?php $this->widget('CJuiDateTimePicker',
						 array(
							'model'=>$model,
                                                        'name'=>'Awb[created_on]',
							//'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
                                                        'language'=> 'en',
							'value'=>$model->created_on,
                                                        'mode' => 'datetime',
							'options'=>array(
                                                                        'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                                                                        'showButtonPanel'=>true,
                                                                        'changeYear'=>true,
                                                                        'changeMonth'=>true,
                                                                        'dateFormat'=>'yy-mm-dd',
                                                                        ),
                                                    )
					);
					; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'modified_by'); ?>
		<?php echo $form->dropDownList($model, 'modifiedBy', CHtml::listData(Users::model()->findAll(),'user_id', 'username')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'created_by'); ?>
		<?php echo $form->dropDownList($model, 'createdBy', CHtml::listData(Users::model()->findAll(),'user_id', 'username')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->