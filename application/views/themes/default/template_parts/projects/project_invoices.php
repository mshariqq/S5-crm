<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if(!im_mobile()) { ?>
<!-- only desktop -->
<table class="table dt-table table-invoices table-hover table-striped" data-order-col="1" data-order-type="desc">
    <thead class="bg-primary">
        <tr>
            <th><?php echo _l('clients_invoice_dt_number'); ?></th>
            <th><?php echo _l('clients_invoice_dt_date'); ?></th>
            <th><?php echo _l('clients_invoice_dt_duedate'); ?></th>
            <th><?php echo _l('clients_invoice_dt_amount'); ?></th>
            <th><?php echo _l('clients_invoice_dt_status'); ?></th>
            <?php
            $custom_fields = get_custom_fields('invoice',array('show_on_client_portal'=>1));
            foreach($custom_fields as $field){ ?>
                <th><?php echo $field['name']; ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach($invoices as $invoice){ ?>
            <tr>
                <td data-order="<?php echo $invoice['number']; ?>">
                <a href="<?php echo site_url('invoice/' . $invoice['id'] . '/' . $invoice['hash']); ?>" class="invoice-number"><?php echo format_invoice_number($invoice['id']); ?></a>
            </td>
                <td data-order="<?php echo $invoice['date']; ?>"><?php echo _d($invoice['date']); ?></td>
                <td data-order="<?php echo $invoice['duedate']; ?>"><?php echo _d($invoice['duedate']); ?></td>
                <td data-order="<?php echo $invoice['total']; ?>"><?php echo app_format_money($invoice['total'], $invoice['currency_name']); ?></td>
                <td><?php echo format_invoice_status($invoice['status'], 'pull-left', true); ?></td>
                <?php foreach($custom_fields as $field){ ?>
                    <td><?php echo get_custom_field_value($invoice['id'],$field['id'],'invoice'); ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php } else { ?>

<!-- ONLY MOBILE -->
<div class="col-12 p-0">
    <div class="row">
        <?php foreach($invoices as $invoice){ ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="bold no-margin">
                                <a href="<?php echo site_url('invoice/' . $invoice['id'] . '/' . $invoice['hash']); ?>" class="invoice-number text-primary"><?php echo format_invoice_number($invoice['id']); ?></a>

                                    <!-- <?php echo format_invoice_number($invoice['id']); ?> -->
                                </h4>
                                <p class=" no-margin"> <span class="text-muted"><?php echo _l("Created : ") ?></span> <?php echo _d($invoice['date']); ?></p>
                                <p class=" no-margin"> <span class="text-muted"><?php echo _l("Due Date : ") ?></span> <?php echo _d($invoice['duedate']); ?></p>

                            </div>
                          
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12 mb-0 p-0">
                                <h4 class="bold no-margin pull-left mb-0 font-weight-bold"><?php echo app_format_money($invoice['total'], $invoice['currency_name']); ?></h4>
                                <p class="text-muted no-margin pull-right mb-0"><?php echo format_invoice_status($invoice['status'], 'pull-left', true); ?></p>
                            </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<?php } ?>

