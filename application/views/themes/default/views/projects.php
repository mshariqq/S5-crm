<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="page-header">
    <ol class="breadcrumb"><!-- breadcrumb -->
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-home"></i>  Home</a></li>
        <li class="breadcrumb-item active"><a href="#">Projects</a></li>
       
    </ol><!-- End breadcrumb -->
    <div class="ml-auto pull-right">
  
    </div>
</div>

<div class="col-12">
<h2 class="no-margin section-text font-weight-bold"><?php echo _l('My Projects'); ?></h2>
</div>

<div class="card bg-light text-dark">
      <div class="card-header">
            <h4 class="text-dark mb-0"><?php echo _l('projects_summary'); ?></h4>
      </div>
   <div class="card-body">

      <div class="row">
                  <?php get_template_part('projects/project_summary'); ?>
      </div>

      <hr>

      <?php 
         if(im_mobile()){ ?>

            <?php foreach($projects as $project){ ?>
                  <div class="card">
                     
                     <div class="card-body">
                        <h4>
                           <a class="font-weight-bold" href="<?php echo site_url('clients/project/'.$project['id']); ?>"><?php echo $project['name']; ?></a>
                        </h4>
                        
                        <p>
                           <span class="tag bg-primary mb-1"><?php echo _l("Started : ") .  _d($project['start_date']); ?></span>
                           <span class="tag bg-warning mb-1"><?php echo _l("Deadline : ") .  _d($project['deadline']); ?></span>
                        </p>
                     </div>
                     <div class="card-footer">
                        <span class="pull-left">
                           <?php
                                    $status = get_project_status_by_id($project['status']);
                                    echo '<span class="label inline-block" style="color:'.$status['color'].';border:1px solid '.$status['color'].'">'.$status['name'].'</span>';
                                    ?>
                        </span>
                        <span class="pull-right">
                           <a href="<?php echo site_url('clients/project/'.$project['id']); ?>" class="btn btn-sm btn-primary">
                               Details <i class="mdi mdi-arrow-right"></i>
                           </a>
                        </span>
                     </div>
                  </div>
            <?php } ?>


      <?php   }else{ ?>
         <div class="table-responsive">
                     <table class="table dt-table table-projects table-hover table-striped" data-order-col="2" data-order-type="desc">
                        <thead class="bg-dark text-warning">
                           <tr>
                              <th class="th-project-name"><?php echo _l('project_name'); ?></th>
                              <th class="th-project-start-date"><?php echo _l('project_start_date'); ?></th>
                              <th class="th-project-deadline"><?php echo _l('project_deadline'); ?></th>
                              <th class="th-project-billing-type"><?php echo _l('project_billing_type'); ?></th>
                              <?php
                                 $custom_fields = get_custom_fields('projects',array('show_on_client_portal'=>1));
                                 foreach($custom_fields as $field){ ?>
                              <th><?php echo $field['name']; ?></th>
                              <?php } ?>
                              <th><?php echo _l('project_status'); ?></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach($projects as $project){ ?>
                           <tr>
                              <td><a href="<?php echo site_url('clients/project/'.$project['id']); ?>"><?php echo $project['name']; ?></a></td>
                              <td data-order="<?php echo $project['start_date']; ?>"><?php echo _d($project['start_date']); ?></td>
                              <td data-order="<?php echo $project['deadline']; ?>"><?php echo _d($project['deadline']); ?></td>
                              <td>
                                 <?php
                                    if($project['billing_type'] == 1){
                                    $type_name = 'project_billing_type_fixed_cost';
                                    } else if($project['billing_type'] == 2){
                                    $type_name = 'project_billing_type_project_hours';
                                    } else {
                                    $type_name = 'project_billing_type_project_task_hours';
                                    }
                                    echo _l($type_name);
                                    ?>
                              </td>
                              <?php foreach($custom_fields as $field){ ?>
                              <td><?php echo get_custom_field_value($project['id'],$field['id'],'projects'); ?></td>
                              <?php } ?>
                              <td>
                                 <?php
                                    $status = get_project_status_by_id($project['status']);
                                    echo '<span class="label inline-block" style="color:'.$status['color'].';border:1px solid '.$status['color'].'">'.$status['name'].'</span>';
                                    ?>
                              </td>
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
         </div>
      <?php   }
       ?>


   
   
   </div>
</div>

