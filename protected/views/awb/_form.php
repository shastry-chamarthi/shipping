<div class="form">
    <p class="note">
        <?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
    </p>

    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'awb-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
    ));

    echo $form->errorSummary($model);
    ?>
    
        <div class="row">
            <?php echo $form->labelEx($model,'id'); ?>
            <?php echo $form->textField($model,'id'); ?>
            <?php echo $form->error($model,'id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'date'); ?>
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
            <?php echo $form->error($model,'date'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'airway_bill_no'); ?>
            <?php echo $form->textField($model,'airway_bill_no'); ?>
            <?php echo $form->error($model,'airway_bill_no'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'company_id'); ?>
            <?php echo $form->textField($model,'company_id'); ?>
            <?php echo $form->error($model,'company_id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'to_addr_line1'); ?>
            <?php echo $form->textField($model,'to_addr_line1',array('size'=>60,'maxlength'=>150)); ?>
            <?php echo $form->error($model,'to_addr_line1'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'to_addr_line2'); ?>
            <?php echo $form->textField($model,'to_addr_line2',array('size'=>60,'maxlength'=>150)); ?>
            <?php echo $form->error($model,'to_addr_line2'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'to_city_id'); ?>
            <?php echo $form->dropDownList($model, 'toCity', CHtml::listData(City::model()->findAll(),'city_id', 'city_name')); ?>
            <?php echo $form->error($model,'to_city_id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'to_state_id'); ?>
            <?php echo $form->dropDownList($model, 'toState', CHtml::listData(State::model()->findAll(),'state_id', 'state_name')); ?>
            <?php echo $form->error($model,'to_state_id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'to_contact_number'); ?>
            <?php echo $form->textField($model,'to_contact_number',array('size'=>60,'maxlength'=>150)); ?>
            <?php echo $form->error($model,'to_contact_number'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'to_contact_person'); ?>
            <?php echo $form->textField($model,'to_contact_person',array('size'=>60,'maxlength'=>150)); ?>
            <?php echo $form->error($model,'to_contact_person'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'to_zip'); ?>
            <?php echo $form->textField($model,'to_zip',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'to_zip'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'from_addr_line1'); ?>
            <?php echo $form->textField($model,'from_addr_line1',array('size'=>60,'maxlength'=>150)); ?>
            <?php echo $form->error($model,'from_addr_line1'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'from_addr_line2'); ?>
            <?php echo $form->textField($model,'from_addr_line2',array('size'=>60,'maxlength'=>150)); ?>
            <?php echo $form->error($model,'from_addr_line2'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'from_city_id'); ?>
            <?php echo $form->dropDownList($model, 'fromCity', CHtml::listData(City::model()->findAll(),'city_id', 'city_name')); ?>
            <?php echo $form->error($model,'from_city_id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'from_state_id'); ?>
            <?php echo $form->dropDownList($model, 'fromState', CHtml::listData(State::model()->findAll(),'state_id', 'state_name')); ?>
            <?php echo $form->error($model,'from_state_id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'from_contact'); ?>
            <?php echo $form->textField($model,'from_contact',array('size'=>60,'maxlength'=>150)); ?>
            <?php echo $form->error($model,'from_contact'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'from_zip'); ?>
            <?php echo $form->textField($model,'from_zip',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'from_zip'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'pkg_weight'); ?>
            <?php echo $form->textField($model,'pkg_weight',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'pkg_weight'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'pkg_dimension_w'); ?>
            <?php echo $form->textField($model,'pkg_dimension_w',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'pkg_dimension_w'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'pkg_dimension_h'); ?>
            <?php echo $form->textField($model,'pkg_dimension_h',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'pkg_dimension_h'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'pkg_dimension_l'); ?>
            <?php echo $form->textField($model,'pkg_dimension_l',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'pkg_dimension_l'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'number_of_articles'); ?>
            <?php echo $form->textField($model,'number_of_articles'); ?>
            <?php echo $form->error($model,'number_of_articles'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'billed_weight'); ?>
            <?php echo $form->textField($model,'billed_weight',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'billed_weight'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'pkg_type'); ?>
            <?php echo $form->textField($model,'pkg_type',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'pkg_type'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'amount'); ?>
            <?php echo $form->textField($model,'amount',array('size'=>10,'maxlength'=>10)); ?>
            <?php echo $form->error($model,'amount'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'transaction_type_id'); ?>
            <?php echo $form->dropDownList($model, 'transactionType', CHtml::listData(TransactionTypes::model()->findAll(),'transaction_type_id', 'transaction_type_name')); ?>
            <?php echo $form->error($model,'transaction_type_id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'agent_id'); ?>
            <?php echo $form->dropDownList($model, 'agent', CHtml::listData(Account::model()->findAll(),'account_id', 'account_name')); ?>
            <?php echo $form->error($model,'agent_id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'forwarding_no'); ?>
            <?php echo $form->textField($model,'forwarding_no'); ?>
            <?php echo $form->error($model,'forwarding_no'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'forwarding_company_id'); ?>
            <?php echo $form->dropDownList($model, 'forwardingCompany', CHtml::listData(ForwardingCompany::model()->findAll(),'forwarding_company_id', 'forwarding_company_name')); ?>
            <?php echo $form->error($model,'forwarding_company_id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'forwarding_updated'); ?>
            <?php echo $form->textField($model,'forwarding_updated'); ?>
            <?php echo $form->error($model,'forwarding_updated'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'payment_type_id'); ?>
            <?php echo $form->dropDownList($model, 'paymentType', CHtml::listData(PaymentType::model()->findAll(),'payment_type_id', 'payment_type_name')); ?>
            <?php echo $form->error($model,'payment_type_id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'modified_on'); ?>
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
            <?php echo $form->error($model,'modified_on'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'created_on'); ?>
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
            <?php echo $form->error($model,'created_on'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'modified_by'); ?>
            <?php echo $form->dropDownList($model, 'modifiedBy', CHtml::listData(Users::model()->findAll(),'user_id', 'user_name')); ?>
            <?php echo $form->error($model,'modified_by'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'created_by'); ?>
            <?php echo $form->dropDownList($model, 'createdBy', CHtml::listData(Users::model()->findAll(),'user_id', 'user_name')); ?>
            <?php echo $form->error($model,'created_by'); ?>
        </div>
            <?php
        echo CHtml::submitButton(Yii::t('app', 'Save'));
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => 'javascript:history.go(-1)'));
$this->endWidget(); ?>
</div> <!-- form -->