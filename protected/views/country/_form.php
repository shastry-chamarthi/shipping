<div class="form">
    <p class="note">
        <?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
    </p>

    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'country-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
    ));

    echo $form->errorSummary($model);
    ?>
    
        <div class="row">
            <?php echo $form->labelEx($model,'country_id'); ?>
            <?php echo $form->textField($model,'country_id'); ?>
            <?php echo $form->error($model,'country_id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'country_name'); ?>
            <?php echo $form->textField($model,'country_name',array('size'=>60,'maxlength'=>120)); ?>
            <?php echo $form->error($model,'country_name'); ?>
        </div>
            <?php
        echo CHtml::submitButton(Yii::t('app', 'Save'));
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => 'javascript:history.go(-1)'));
$this->endWidget(); ?>
</div> <!-- form -->