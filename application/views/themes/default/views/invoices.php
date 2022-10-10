<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="page-header">
    <ol class="breadcrumb"><!-- breadcrumb -->
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-home"></i>  Home</a></li>
        <li class="breadcrumb-item active"><a href="#">Invoices</a></li>
       
    </ol><!-- End breadcrumb -->
    <div class="ml-auto pull-right">
  
    </div>
</div>


<div class="card section-heading section-invoices">
    <div class="card-body">
        <h4 class="no-margin section-text pull-left"><?php echo _l('clients_my_invoices'); ?></h4>
        <?php if(has_contact_permission('invoices')){ ?>
            <a href="<?php echo site_url('clients/statement'); ?>" class="view-account-statement btn btn-indigo pull-right"><?php echo _l('view_account_statement'); ?> <i class="mdi mdi-page-last"></i> </a>
        <?php } ?>
    </div>
</div>


<div class="card">
 <div class="card-body">
     <?php get_template_part('invoices_stats'); ?>
     <hr />
     <table class="table dt-table table-invoices table-striped table-hover" data-order-col="1" data-order-type="desc">
         <thead class="bg-indigo">
            <tr>
                <th class="th-invoice-number"><?php echo _l('clients_invoice_dt_number'); ?></th>
                <th class="th-invoice-date"><?php echo _l('clients_invoice_dt_date'); ?></th>
                <th class="th-invoice-duedate"><?php echo _l('clients_invoice_dt_duedate'); ?></th>
                <th class="th-invoice-amount"><?php echo _l('clients_invoice_dt_amount'); ?></th>
                <th class="th-invoice-status"><?php echo _l('clients_invoice_dt_status'); ?></th>
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
                    <td data-order="<?php echo $invoice['number']; ?>"><a href="<?php echo site_url('invoice/' . $invoice['id'] . '/' . $invoice['hash']); ?>" class="invoice-number"><?php echo format_invoice_number($invoice['id']); ?></a></td>
                    <td data-order="<?php echo $invoice['date']; ?>"><?php echo _d($invoice['date']); ?></td>
                    <td data-order="<?php echo $invoice['duedate']; ?>"><?php echo _d($invoice['duedate']); ?></td>
                    <td data-order="<?php echo $invoice['total']; ?>"><?php echo app_format_money($invoice['total'], $invoice['currency_name']); ?></td>
                    <td><?php echo format_invoice_status($invoice['status'], 'inline-block', true); ?></td>
                    <?php foreach($custom_fields as $field){ ?>
                        <td><?php echo get_custom_field_value($invoice['id'],$field['id'],'invoice'); ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
