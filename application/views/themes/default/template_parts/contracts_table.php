<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<!-- if mobile -->
<?php if(!is_mobile()){ ?>
    
<table class="table dt-table table-contracts table-bordered table-hover table-striped" data-order-col="4" data-order-type="asc">
  <thead class="bg-primary text-white">
    <tr>
      <th class="th-contracts-subject"><?php echo _l('clients_contracts_dt_subject'); ?></th>
      <th class="th-contracts-type"><?php echo _l('clients_contracts_type'); ?></th>
      <th class="th-contracts-signature"><?php echo _l('signature'); ?></th>
      <th class="th-contracts-start-date"><?php echo _l('clients_contracts_dt_start_date'); ?></th>
      <th class="th-contracts-end-date"><?php echo _l('clients_contracts_dt_end_date'); ?></th>
      <?php
      $custom_fields = get_custom_fields('contracts',array('show_on_client_portal'=>1));
      foreach($custom_fields as $field){ ?>
        <th><?php echo $field['name']; ?></th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach($contracts as $contract){
      $expiry_class = '';
      if (!empty($contract['dateend'])) {
        $_date_end = date('Y-m-d', strtotime($contract['dateend']));
        if ($_date_end < date('Y-m-d')) {
          $expiry_class = 'alert-danger';
        }
      }
      ?>
      <tr class="<?php echo $expiry_class; ?>">
        <td>
          <?php
          echo '<a href="'.site_url('contract/'.$contract['id'].'/'.$contract['hash']).'" class="td-contract-url">'.$contract['subject'].'</a>';
          ?>
        </td>
        <td><?php echo $contract['type_name']; ?></td>
        <td>
          <?php
          if(!empty($contract['signature'])) {
           echo '<span class="text-success td-contract-is-signed">' . _l('is_signed') . '</span>';
         } else {
           echo '<span class="text-muted td-contract-not-signed">' . _l('is_not_signed') . '</span>';
         }
         ?>
       </td>
       <td data-order="<?php echo $contract['datestart']; ?>"><?php echo _d($contract['datestart']); ?></td>
       <td data-order="<?php echo $contract['dateend']; ?>"><?php echo _d($contract['dateend']); ?></td>
       <?php foreach($custom_fields as $field){ ?>
         <td><?php echo get_custom_field_value($contract['id'],$field['id'],'contracts'); ?></td>
       <?php } ?>
     </tr>
   <?php } ?>
 </tbody>
</table>
<?php } else  {?>

<!-- FOR MOBILE -->
<div class="col-12 p-0">
        <div class="row">
            <?php foreach($contracts as $contract){
                $expiry_class = '';
                if (!empty($contract['dateend'])) {
                  $_date_end = date('Y-m-d', strtotime($contract['dateend']));
                  if ($_date_end < date('Y-m-d')) {
                    $expiry_class = 'alert-danger';
                  }
                }
                ?>

                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                          <h5 class="font-weight-bold"> <?php
                            echo '<a href="'.site_url('contract/'.$contract['id'].'/'.$contract['hash']).'" class="td-contract-url">'.$contract['subject'].'</a>';
                            ?></h5>
                            <p><?php echo _l("Started") ?>  <span class="tag bg-success pull-right"><?php echo _d($contract['datestart']); ?></span> </p>
                            <p><?php echo _l("Expiry ") ?> <span class="tag bg-danger pull-right"><?php echo _d($contract['dateend']); ?></span></p>
                            <span class="text-primary"><?php echo $contract['type_name'] . " Renewal"; ?> </span>
                            <br>
                            <a href="<?php echo site_url('contract/'.$contract['id'].'/'.$contract['hash']); ?>" class="btn btn-primary btn-sm">Open <i class="fa fa-eye"></i> </a>
                      </div>
                    </div>
                  </div>

            <?php } ?>


        </div>
</div>

<?php } ?>


