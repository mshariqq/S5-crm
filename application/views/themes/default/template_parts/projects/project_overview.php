<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- <style>
  .project-percent {
    position: absolute;
    font-size: 33px;
    font-weight: 500;
    top: 35%;
    left: 0;
    right: 0;
}

.project-file-image {
    border: 1px solid #f0f0f0;
    border-radius: 4px;
    margin-right: 15px;
}
.project-overview-progress-bar {
    height: 50px;
    background-color: #7C838B;
    position: relative;
}

.project-overview-progress-bar .project-progress-number {
    font-size: 16px;
    position: absolute;
    display: block;
    width: 100%;
    color: #fff;
    font-weight: 500;
    margin-top: 15px;
    text-shadow: 0px 0px 2px #333;
}
.project-overview-column {
        margin-top: 15px;
    }
    .project_file_discusssions_area,
.project_file_area {
    overflow-y: scroll;
    height: 400px;
}
@media(max-width:768px) {

  .project_file_discusssions_area,
  .project_file_area {
      height: auto !important;
  }

  .project_file_discusssions_area {
          margin-top: 30px;
      }

}

.project-progress-bars i {
    font-size: 24px;
}

.project-progress-bars i:not(.text-success) {
    color: #bfbfbf;
}

.project-info-bg {
    background: #FBFBFB !important;
    color: #333 !important;
    border-top: 1px solid #E4E5E7;
    border-left: 1px solid #E4E5E7;
    border-right: 1px solid #E4E5E7;
    font-weight: 500;
}
.team-members .panel-body {
    padding: 0px;
}

.team-members .media-left {
    padding: 10px;
}

.team-members .media-body {
    padding-right: 10px;
    padding-top: 12px;
}

.team-members .media:last-child {
    border-bottom: 0px;
}

.team-members .media {
    margin-top: 0px;
    border-bottom: 1px solid #f0f0f0;
}
</style> -->
<div class="row">
  <div class="col-md-6">
      <div class="card border">
        <div class="">
          <b><?php echo _l('project_overview'); ?></b>
      <table class="table table-borded no-margin table-hover table-striped">
        <tbody>
          <tr>
            <td class="bold"><?php echo _l('project'); ?> <?php echo _l('the_number_sign'); ?></td>
            <td><?php echo $project->id; ?></td>
          </tr>
          <?php if($project->settings->view_finance_overview == 1){ ?>
            <tr class="project-billing-type">
              <td class="bold"><?php echo _l('project_billing_type'); ?></td>
              <td>
              <?php
                  if($project->billing_type == 1){
                    $type_name = 'project_billing_type_fixed_cost';
                  } else if($project->billing_type == 2){
                    $type_name = 'project_billing_type_project_hours';
                  } else {
                    $type_name = 'project_billing_type_project_task_hours';
                  }
                  echo _l($type_name);
              ?>
            </td>
          </tr>
        <?php } ?>
        <?php if(($project->billing_type == 1 || $project->billing_type == 2) && $project->settings->view_finance_overview == 1){
        echo '<tr class="project-cost">';
        if($project->billing_type == 1){
          echo '<td class="bold">'._l('project_total_cost').'</td>';
          echo '<td>'.app_format_money($project->project_cost, $currency).'</td>';
        } else {
          echo '<td class="bold">'._l('project_rate_per_hour').'</td>';
          echo '<td>'.app_format_money($project->project_rate_per_hour, $currency).'</td>';
        }
        echo '<tr>';
        }
        ?>
        <tr>
          <td class="bold"><?php echo _l('project_status'); ?></td>
          <td><?php echo $project_status['name']; ?></td>
        </tr>
        <tr>
          <td class="bold"><?php echo _l('project_start_date'); ?></td>
          <td><?php echo _d($project->start_date); ?></td>
        </tr>
        <?php if($project->deadline){ ?>
          <tr>
            <td class="bold"><?php echo _l('project_deadline'); ?></td>
            <td><?php echo _d($project->deadline); ?></td>
          </tr>
        <?php } ?>
        <?php if($project->date_finished){ ?>
          <tr class="text-success">
            <td class="bold"><?php echo _l('project_completed_date'); ?></td>
            <td><?php echo _d($project->date_finished); ?></td>
          </tr>
        <?php } ?>
        <?php if($project->billing_type == 1 && $project->settings->view_task_total_logged_time == 1){ ?>
          <tr class="project-total-logged-hours">
            <td class="bold"><?php echo _l('project_overview_total_logged_hours'); ?></td>
            <td><?php echo seconds_to_time_format($this->projects_model->total_logged_time($project->id)); ?></td>
          </tr>
        <?php } ?>
        <?php $custom_fields = get_custom_fields('projects',array('show_on_client_portal'=>1));
        if(count($custom_fields) > 0){ ?>
          <?php foreach($custom_fields as $field){ ?>
            <?php $value = get_custom_field_value($project->id,$field['id'],'projects');
            if($value == ''){continue;} ?>
            <tr>
              <td class="bold"><?php echo ucfirst($field['name']); ?></td>
              <td><?php echo $value; ?></td>
            </tr>
          <?php } ?>
        <?php } ?>
      </tbody>
      </table>
    </div>
      </div>
      
  </div>

  <!-- project progress circle -->
  <div class="col-md-6 text-center">

            <div class="col-12">
                      <h3 class="mb-3 font-weight-600"><?php echo _l('project_progress_text'); ?></h3>
                      <div class="chart-circle" data-value="<?php echo $percent; ?>" data-thickness="20" data-color="rgb(255, 204, 0, 0.7)">
                        <div class="chart-circle-value"><div class="text-xl">
                          <h4 class="mb-0">
                          <?php
                            // convert to 100% scale
                            $percent = $percent * 100;
                            echo $percent . '%';
                          ?>
                          </h4>
                        </div></div>
                      </div>
                      <p>It may vary in some cases!</p>

                </div>


  </div>


<!-- tasks progress in line bar -->

<?php if($project->settings->view_tasks == 1){ ?>
  <div class="col-md-<?php echo ($project->deadline ? 6 : 12); ?> project-progress-bars">
        <div class="card">
              <div class="card-body">
                    <div class="row">
                              <div class="col-md-9">
                                <p class="text-uppercase bold text-dark font-medium">
                                  <span class="tag bg-primary" dir="ltr"><?php echo $tasks_not_completed; ?> / <?php echo $total_tasks; ?></span>
                                  <span class="tag bg-info"><?php echo _l('project_open_tasks'); ?></span>
                                </p>
                                <p class="text-primary bold"><?php echo $tasks_not_completed_progress; ?>% Tasks Progress</p>
                              </div>
                                <div class="col-md-3 text-right">
                                  <i class="fa fa-check-circle<?php if($tasks_not_completed_progress >= 100){echo ' text-success';} ?>" aria-hidden="true"></i>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="progress progress-md mt-4">
                                    <?php 
                                                  $wPercentD = substr_replace(round($tasks_not_completed_progress) ,"", -1) . "5";
                                                  ?>
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success w-<?php echo $wPercentD ?>"></div>
                                    </div>
                              
                                </div>
                    </div>
              </div>

        </div>

</div>
<?php } ?>
<?php if($project->deadline){ ?>
  <div class="col-md-6">
            <div class="card">
                          <div class="card-body">
                                  <div class="row">
                                        <div class="col-md-9">
                                          <p class="text-uppercase bold text-dark font-medium">
                                          <span dir="ltr" class="tag bg-indigo"><?php echo $project_days_left; ?> / <?php echo $project_total_days; ?></span>
                                          <span class="tag bg-dark">  <?php echo _l('project_days_left'); ?></span>
                                          </p>
                                          <p class="text-indigo bold"><?php echo $project_time_left_percent; ?>% Day Progress Remaining</p>
                                        </div>
                                        <div class="col-md-3 text-right">

                                          <i class="fa fa-calendar-check-o<?php if($project_time_left_percent >= 100){echo ' text-success';} ?>" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="progress progress-md mt-4">
                                            <?php 
                                                  $wPercent = substr_replace(round($project_time_left_percent) ,"", -1) . "5";
                                                  ?>
                                              <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-<?php echo round( $wPercent); ?>"></div>
                                          </div>
                                        </div>
                                  </div>
                            </div>
            </div>
</div>
<?php } ?>

<?php if($project->settings->view_finance_overview == 1){ ?>
  <div class="col-md-12 project-overview-column">
        <div class="row">
            <div class="col-md-12">
                  <?php
                  if($project->billing_type == 3 || $project->billing_type == 2){ ?>

                    <div class="row">
                     
                        <div class="col-md-3">
                          <div class="card">
                            <div class="card-body">
                                <?php
                              $data = $this->projects_model->total_logged_time_by_billing_type($project->id);
                              ?>
                              <p class="text-uppercase text-muted"><?php echo _l('project_overview_logged_hours'); ?> <span class="bold"><?php echo $data['logged_time']; ?></span></p>
                              <p class="bold font-medium"><?php echo app_format_money($data['total_money'], $currency); ?></p>
                            </div>
                          </div>
                         
                        </div>

                        <div class="col-md-3">
                          <div class="card">
                            <div class="card-body">
                            <?php
                          $data = $this->projects_model->data_billable_time($project->id);
                          ?>
                          <p class="text-uppercase text-info"><?php echo _l('project_overview_billable_hours'); ?> <span class="bold"><?php echo $data['logged_time'] ?></span></p>
                          <p class="bold font-medium"><?php echo app_format_money($data['total_money'], $currency); ?></p>
                            </div>
                          </div>
                        
                        </div>

                          <div class="col-md-3">
                            <div class="card">
                              <div class="card-body">
                              <?php
                            $data = $this->projects_model->data_billed_time($project->id);
                            ?>
                            <p class="text-uppercase text-success"><?php echo _l('project_overview_billed_hours'); ?> <span class="bold"><?php echo $data['logged_time']; ?></span></p>
                            <p class="bold font-medium"><?php echo app_format_money($data['total_money'], $currency); ?></p>
                              </div>
                            </div>
                          
                          </div>


                            <div class="col-md-3">
                              <div class="card">
                                <div class="card-body">
                                <?php
                              $data = $this->projects_model->data_unbilled_time($project->id);
                              ?>
                              <p class="text-uppercase text-danger"><?php echo _l('project_overview_unbilled_hours'); ?> <span class="bold"><?php echo $data['logged_time']; ?></span></p>
                              <p class="bold font-medium"><?php echo app_format_money($data['total_money'], $currency); ?></p>
                                </div>
                              </div>
                            
                            </div>
                    </div>
                    
                  <?php } ?>
            </div>
        </div>
      <?php if($project->settings->available_features['project_expenses'] == 1){ ?>
        <div class="row">

        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
            <p class="text-uppercase text-muted font-weight-bold"><?php echo _l('project_overview_expenses'); ?></span></p>
          <p class="bold font-medium"><?php echo app_format_money(sum_from_table(db_prefix().'expenses',array('where'=>array('project_id'=>$project->id),'field'=>'amount')), $currency); ?></p>
      
            </div>
          </div>
           </div>

        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
            <p class="text-uppercase text-info font-weight-bold"><?php echo _l('project_overview_expenses_billable'); ?></span></p>
          <p class="bold font-medium"><?php echo app_format_money(sum_from_table(db_prefix().'expenses',array('where'=>array('project_id'=>$project->id,'billable'=>1),'field'=>'amount')), $currency); ?></p>
   
            </div>
          </div>
             </div>

        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
            <p class="text-uppercase text-success font-weight-bold"><?php echo _l('project_overview_expenses_billed'); ?></span></p>
          <p class="bold font-medium"><?php echo app_format_money(sum_from_table(db_prefix().'expenses',array('where'=>array('project_id'=>$project->id,'invoiceid !='=>'NULL','billable'=>1),'field'=>'amount')), $currency); ?></p>
    
            </div>
          </div>
              </div>

        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
            <p class="text-uppercase text-danger font-weight-bold"><?php echo _l('project_overview_expenses_unbilled'); ?></span></p>
          <p class="bold font-medium"><?php echo app_format_money(sum_from_table(db_prefix().'expenses',array('where'=>array('project_id'=>$project->id,'invoiceid IS NULL','billable'=>1),'field'=>'amount')), $currency); ?></p>
    
            </div>
          </div>
           </div>
      </div>
      <?php } ?>
</div>
<?php } ?>


<div class="col-md-12">
  <br>
</div>

<div class="clearfix"></div>

<div class=" col-md-<?php if($project->settings->view_team_members == 1){ echo 6; } else {echo 12;} ?>">

  <div class="card">
    <div class="card-header panel-heading bg-primary tet-white">
          <?php echo _l('project_description'); ?>
        </div>

        <div class="card-body panel-body no-radius tc-content project-description">
          <?php if(empty($project->description)){
          echo '<p class="text-muted text-center no-mbot">' . _l('no_description_project') . '</p>';
        }
        echo "<p class='text-dark'>".check_for_links($project->description)."</p>"; ?>
      </div>
  </div>

</div>
<?php if($project->settings->view_team_members == 1){ ?>
  <div class="col-md-6 team-members project-overview-column">
    <div class="card">
      <div class="card-header bg-primary text-white text-light panel-heading project-info-bg no-radius"><?php echo _l('project_members'); ?></div>
      <div class="card-body panel-body">
     <?php
     if(count($members) == 0){
      echo '<div class="media-body text-center text-muted"><p>'._l('no_project_members').'</p></div>';
    }
    foreach($members as $member){ ?>
      <div class="media border-bottom ">
        <div class="media-left">
         <?php echo staff_profile_image($member['staff_id'],array('staff-profile-image-small','media-object')); ?>
       </div>
       <div class="media-body">
         <h5 class="media-heading mb-0"><?php echo get_staff_full_name($member['staff_id']); ?></h5>
         <p class="text-muted">
          <a class="text-muted" href="mailto: <?php 
           // staf email
          echo $member['email'];
          ?>">
          <?php 
           // staf email
          echo $member['email'];
          ?>
                    <i class="mdi mdi-email"></i>

          </a>
         </p>
       </div>
     </div>
   <?php } ?>
 </div>
    </div>

</div>
<?php } ?>
</div>
