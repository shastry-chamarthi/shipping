<div class="view">

    <h2><?php echo CHtml::encode($data->getAttributeLabel('country_name')); ?>:</h2>
<h2><?php echo CHtml::link(CHtml::encode($data->country_name), array('view', 'id' => $data->country_id)); ?></h2>

</div>