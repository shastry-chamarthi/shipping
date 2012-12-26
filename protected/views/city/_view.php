<div class="view">

    <h2><?php echo CHtml::encode($data->getAttributeLabel('city_name')); ?>:</h2>
<h2><?php echo CHtml::link(CHtml::encode($data->city_name), array('view', 'id' => $data->city_id)); ?></h2>

    <?php
    if (!empty($data->state->state_name)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('state_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->state->state_name);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
</div>