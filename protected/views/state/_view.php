<div class="view">

    <h2><?php echo CHtml::encode($data->getAttributeLabel('state_name')); ?>:</h2>
<h2><?php echo CHtml::link(CHtml::encode($data->state_name), array('view', 'id' => $data->state_id)); ?></h2>

    <?php
    if (!empty($data->country->country_name)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('country_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->country->country_name);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
</div>