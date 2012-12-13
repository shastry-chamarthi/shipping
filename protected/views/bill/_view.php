<div class="view">

    <h2><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</h2>
<h2><?php echo CHtml::link(CHtml::encode($data->date), array('view', 'id' => $data->id)); ?></h2>

    <?php
    if (!empty($data->airway_bill_no)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('airway_bill_no')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->airway_bill_no);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->company_id)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('company_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->company_id);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->to_addr_line1)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('to_addr_line1')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->to_addr_line1);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->to_addr_line2)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('to_addr_line2')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->to_addr_line2);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->toCity->city_name)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('to_city_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->toCity->city_name);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->toState->state_name)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('to_state_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->toState->state_name);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->to_contact_number)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('to_contact_number')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->to_contact_number);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->to_contact_person)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('to_contact_person')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->to_contact_person);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->to_zip)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('to_zip')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->to_zip);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->from_addr_line1)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('from_addr_line1')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->from_addr_line1);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->from_addr_line2)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('from_addr_line2')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->from_addr_line2);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->fromCity->city_name)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('from_city_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->fromCity->city_name);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->fromState->state_name)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('from_state_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->fromState->state_name);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->from_contact)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('from_contact')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->from_contact);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->from_zip)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('from_zip')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->from_zip);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->pkg_weight)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('pkg_weight')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->pkg_weight);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->pkg_dimension_w)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('pkg_dimension_w')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->pkg_dimension_w);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->pkg_dimension_h)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('pkg_dimension_h')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->pkg_dimension_h);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->pkg_dimension_l)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('pkg_dimension_l')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->pkg_dimension_l);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->number_of_articles)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('number_of_articles')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->number_of_articles);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->billed_weight)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('billed_weight')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->billed_weight);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->pkg_type)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('pkg_type')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->pkg_type);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->amount)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->amount);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->transactionType->transaction_type_name)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('transaction_type_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->transactionType->transaction_type_name);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->agent->account_name)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('agent_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->agent->account_name);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->forwarding_no)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('forwarding_no')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->forwarding_no);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->forwardingCompany->forwarding_company_name)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('forwarding_company_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->forwardingCompany->forwarding_company_name);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->forwarding_updated)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('forwarding_updated')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->forwarding_updated);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->paymentType->payment_type_name)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('payment_type_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->paymentType->payment_type_name);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->modified_on)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('modified_on')); ?>:</b>
            </div>
<div class="field_value">
                <?php
                echo date('D, d M y H:i:s', strtotime($data->modified_on));
                ?>

        </div>
        </div>

        <?php
    }
    ?>
    <?php
    if (!empty($data->created_on)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('created_on')); ?>:</b>
            </div>
<div class="field_value">
                <?php
                echo date('D, d M y H:i:s', strtotime($data->created_on));
                ?>

        </div>
        </div>

        <?php
    }
    ?>
    <?php
    if (!empty($data->modifiedBy->username)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('modified_by')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->modifiedBy->username);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->createdBy->username)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->createdBy->username);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
</div>