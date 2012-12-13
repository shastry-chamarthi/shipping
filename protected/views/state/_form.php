<div class="form">
    <p class="note">
        <?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
    </p>

    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'state-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
    ));

    echo $form->errorSummary($model);
    ?>
    
        <div class="row">
            <?php echo $form->labelEx($model,'state_name'); ?>
            <?php echo $form->textField($model,'state_name',array('size'=>60,'maxlength'=>150)); ?>
            <?php echo $form->error($model,'state_name'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'country_id'); ?>
            <?php echo $form->dropDownList($model, 'country', CHtml::listData(Country::model()->findAll(),'country_id', 'country_name'), array('prompt' => 'None')); ?>
            <?php echo $form->error($model,'country_id'); ?>
        </div>
		 
            <?php
        echo CHtml::submitButton(Yii::t('app', 'Save'));
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => 'javascript:history.go(-1)'));
$this->endWidget(); ?>
</div> <!-- form -->