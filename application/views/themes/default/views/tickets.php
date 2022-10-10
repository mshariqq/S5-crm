<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="col-12">
  <div class="page-header">
      <ol class="breadcrumb"><!-- breadcrumb -->
          <li class="breadcrumb-item"><a href="#"> <i class="fa fa-home"></i>  Home</a></li>
          <li class="breadcrumb-item"><a href="#">Support</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tickets</li>
      </ol><!-- End breadcrumb -->
      <div class="ml-auto pull-right">
    
      </div>
  </div>
</div>

<?php if(im_mobile()){ ?>

  <div class="col-12">
    <h3 class="font-weight-bold"><?php echo _l("Tickets") ?></h3>
  </div>

  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <p>You have a new Request? <br> <a href="<?php echo site_url('clients/open_ticket'); ?>" class="btn btn-indigo new-ticket">
          <?php echo _l('clients_ticket_open_subject'); ?>
          <i class="mdi mdi-plus-box"></i>
        </a> </p>
      </div>
    </div>
  </div>

  <?php get_template_part('tickets_table'); ?>


  <div class="col-12" >
    <div class="card">
      <div class="card-body d-flex flex-column">

            <h6 class="text-dark font-weight-bold pull-left "><?php echo _l('tickets_summary'); ?></h6>
            <div class="row">
              <?php foreach(get_clients_area_tickets_summary($ticket_statuses) as $status){ ?>

                <div class="col-6">

                    <div class="card border p-3">
                      <a href="<?php echo $status['url']; ?>" class="<?php if(in_array($status['ticketstatusid'], $list_statuses)){echo 'active';} ?>">
                        <h5 class="bold ticket-status-heading mb-0">
                          <?php echo $status['total_tickets'] ?>
                        </h5>
                        <span style="color:<?php echo $status['statuscolor']; ?>">
                          <?php echo $status['translated_name']; ?>
                        </span>
                      </a>
                    </div>

                </div>
              <?php } ?>
            </div>
      </div>
    </div>
  </div>

  

<?php } else { ?>
  <div class="panel_s card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-dark font-weight-bold pull-left no-mtop tickets-summary-heading"><?php echo _l('tickets_summary'); ?></h3>
        <a href="<?php echo site_url('clients/open_ticket'); ?>" class="btn btn-indigo new-ticket pull-right">
          <?php echo _l('clients_ticket_open_subject'); ?>
          <i class="mdi mdi-plus-box"></i>
        </a>
        <div class="clearfix"></div>
        
      </div>
      <?php foreach(get_clients_area_tickets_summary($ticket_statuses) as $status){ ?>
        <div class="col-md-2 list-status ticket-status">
         <a href="<?php echo $status['url']; ?>" class="<?php if(in_array($status['ticketstatusid'], $list_statuses)){echo 'active';} ?>">
            <h3 class="bold ticket-status-heading">
              <?php echo $status['total_tickets'] ?>
            </h3>
            <span style="color:<?php echo $status['statuscolor']; ?>">
              <?php echo $status['translated_name']; ?>
            </span>
          </a>
        </div>
    <?php } ?>
    </div>
  <div class="clearfix"></div>
  <?php get_template_part('tickets_table'); ?>
</div>

<?php } ?>

