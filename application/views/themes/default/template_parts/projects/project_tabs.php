<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    #DS75F67 li a i{
        margin-right: 10px;
    }
</style>
<?php 

if(isset($_GET['group'])){
    $nav_grou_par = $_GET['group'];
}

?>

<?php 

if(im_mobile()){ ?>

<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="#"><?php echo _l("Project Menu")  ?></a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        
        <ul id="DS75F67" class="navbar-nav mr-auto mt-2 mt-lg-0">

                <li role="presentation" class=" <?php if($nav_grou_par == 'project_overview'){echo 'active';} ?> nav-item">
                    <a class="nav-link" data-group="project_overview" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_overview'); ?>" role="tab"> <i class="fa fa-th" aria-hidden="true"></i> <?php echo _l('project_overview'); ?></a>
                </li>

                <?php if($project->settings->view_tasks == 1 && $project->settings->available_features['project_tasks'] == 1){ ?>
                <li role="presentation" class="nav-item   <?php if($nav_grou_par == 'project_tasks'){echo 'active';} ?>">
                    <a class="nav-link" data-group="project_tasks" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_tasks'); ?>" role="tab"> <i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo _l('tasks'); ?></a>
                </li>
                <?php } ?>

                <?php if($project->settings->view_timesheets == 1 && $project->settings->available_features['project_timesheets'] == 1){ ?>
                <li role="presentation" class="nav-item  <?php if($nav_grou_par == 'project_timesheets'){echo 'active';} ?>">
                    <a class="nav-link" data-group="project_timesheets" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_timesheets'); ?>" role="tab"> <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo _l('project_timesheets'); ?></a>
                </li>
                <?php } ?>

                <?php if($project->settings->view_milestones == 1 && $project->settings->available_features['project_milestones'] == 1){ ?>
                <li role="presentation" class="nav-item  <?php if($nav_grou_par == 'project_milestones'){echo 'active';} ?>">
                    <a class="nav-link" data-group="project_milestones" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_milestones'); ?>" role="tab"> <i class="fa fa-rocket" aria-hidden="true"></i> <?php echo _l('project_milestones'); ?></a>
                </li>
                <?php } ?>

                <?php if($project->settings->available_features['project_files'] == 1) { ?>
                <li role="presentation" class="nav-item  <?php if($nav_grou_par == 'project_files'){echo 'active';} ?>">
                    <a class="nav-link" data-group="project_files" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_files'); ?>" role="tab"> <i class="fa fa-files-o" aria-hidden="true"></i> <?php echo _l('project_files'); ?></a>
                </li>
                <?php } ?>

                <?php if($project->settings->available_features['project_discussions'] == 1) { ?>
                <li role="presentation" class="nav-item  <?php if($nav_grou_par == 'project_discussions'){echo 'active';} ?>">
                    <a class="nav-link" data-group="project_discussions" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_discussions'); ?>" role="tab"> <i class="fa fa-commenting" aria-hidden="true"></i> <?php echo _l('project_discussions'); ?></a>
                </li>
                <?php } ?>

                <?php if($project->settings->view_gantt == 1 && $project->settings->available_features['project_gantt'] == 1){ ?>
                <li role="presentation" class="nav-item  <?php if($nav_grou_par == 'project_gantt'){echo 'active';} ?>">
                    <a class="nav-link" data-group="project_gantt" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_gantt'); ?>" role="tab"> <i class="fa fa-align-left" aria-hidden="true"></i> <?php echo _l('project_gant'); ?></a>
                </li>
                <?php } ?>

                <?php if(has_contact_permission('support') && $project->settings->available_features['project_tickets'] == 1){ ?>
                <li role="presentation" class="nav-item  <?php if($nav_grou_par == 'project_tickets'){echo 'active';} ?>">
                    <a class="nav-link" data-group="project_tickets" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_tickets'); ?>" role="tab"> <i class="fa fa-life-ring" aria-hidden="true"></i> <?php echo _l('project_tickets'); ?></a>
                </li>
                <?php } ?>

                <?php if(has_contact_permission('contracts') && $project->settings->available_features['project_contracts'] == 1){ ?>
                <li role="presentation" class="nav-item  <?php if($nav_grou_par == 'project_contracts'){echo 'active';} ?>">
                    <a class="nav-link" data-group="project_contracts" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_contracts'); ?>" role="tab"> <i class="fa fa-life-ring" aria-hidden="true"></i> <?php echo _l('contracts'); ?></a>
                </li>
                <?php } ?>

                <?php if(has_contact_permission('estimates') && $project->settings->available_features['project_estimates'] == 1){ ?>
                <li role="presentation" class="nav-item  <?php if($nav_grou_par == 'project_estimates'){echo 'active';} ?>">
                    <a class="nav-link" data-group="project_estimates" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_estimates'); ?>" role="tab"> <i class="fa fa-sun-o" aria-hidden="true"></i> <?php echo _l('estimates'); ?></a>
                </li>
                <?php } ?>

                <?php if(has_contact_permission('invoices') && $project->settings->available_features['project_invoices'] == 1){ ?>
                <li role="presentation" class="nav-item  <?php if($nav_grou_par == 'project_invoices'){echo 'active';} ?>">
                    <a class="nav-link" data-group="project_invoices" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_invoices'); ?>" role="tab"> <i class="fa fa-sun-o" aria-hidden="true"></i> <?php echo _l('project_invoices'); ?></a>
                </li>
                <?php } ?>

                <?php if($project->settings->view_activity_log == 1 && $project->settings->available_features['project_activity'] == 1){ ?>
                <li role="presentation" class="nav-item  <?php if($nav_grou_par == 'project_activity'){echo 'active';} ?>">
                    <a class="nav-link" data-group="project_activity" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_activity'); ?>" role="tab"> <i class="fa fa-exclamation" aria-hidden="true"></i> <?php echo _l('project_activity'); ?></a>
                </li>
                <?php } ?>

        </ul>


       
    </div>
</nav>
<?php }else{ ?>

    <ul class="nav nav-pills flex-column" role="tablist">

<li role="presentation" class=" <?php if($nav_grou_par == 'project_overview'){echo 'active';} ?> nav-item text-dark project_tab_overview">
    <a data-group="project_overview" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_overview'); ?>" role="tab"><i class="fa fa-th" aria-hidden="true"></i> <?php echo _l('project_overview'); ?></a>
</li>

<?php if($project->settings->view_tasks == 1 && $project->settings->available_features['project_tasks'] == 1){ ?>
<li role="presentation" class="nav-item text-dark project_tab_tasks  <?php if($nav_grou_par == 'project_tasks'){echo 'active';} ?>">
    <a data-group="project_tasks" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_tasks'); ?>" role="tab"><i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo _l('tasks'); ?></a>
</li>
<?php } ?>

<?php if($project->settings->view_timesheets == 1 && $project->settings->available_features['project_timesheets'] == 1){ ?>
<li role="presentation" class="nav-item text-dark project_tab_timesheets <?php if($nav_grou_par == 'project_timesheets'){echo 'active';} ?>">
    <a data-group="project_timesheets" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_timesheets'); ?>" role="tab"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo _l('project_timesheets'); ?></a>
</li>
<?php } ?>

<?php if($project->settings->view_milestones == 1 && $project->settings->available_features['project_milestones'] == 1){ ?>
<li role="presentation" class="nav-item text-dark project_tab_milestones <?php if($nav_grou_par == 'project_milestones'){echo 'active';} ?>">
    <a data-group="project_milestones" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_milestones'); ?>" role="tab"><i class="fa fa-rocket" aria-hidden="true"></i> <?php echo _l('project_milestones'); ?></a>
</li>
<?php } ?>

<?php if($project->settings->available_features['project_files'] == 1) { ?>
<li role="presentation" class="nav-item text-dark project_tab_files <?php if($nav_grou_par == 'project_files'){echo 'active';} ?>">
    <a data-group="project_files" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_files'); ?>" role="tab"><i class="fa fa-files-o" aria-hidden="true"></i> <?php echo _l('project_files'); ?></a>
</li>
<?php } ?>

<?php if($project->settings->available_features['project_discussions'] == 1) { ?>
<li role="presentation" class="nav-item text-dark project_tab_discussions <?php if($nav_grou_par == 'project_discussions'){echo 'active';} ?>">
    <a data-group="project_discussions" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_discussions'); ?>" role="tab"><i class="fa fa-commenting" aria-hidden="true"></i> <?php echo _l('project_discussions'); ?></a>
</li>
<?php } ?>

<?php if($project->settings->view_gantt == 1 && $project->settings->available_features['project_gantt'] == 1){ ?>
<li role="presentation" class="nav-item text-dark project_tab_gantt <?php if($nav_grou_par == 'project_gantt'){echo 'active';} ?>">
    <a data-group="project_gantt" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_gantt'); ?>" role="tab"><i class="fa fa-align-left" aria-hidden="true"></i> <?php echo _l('project_gant'); ?></a>
</li>
<?php } ?>

<?php if(has_contact_permission('support') && $project->settings->available_features['project_tickets'] == 1){ ?>
<li role="presentation" class="nav-item text-dark project_tab_tickets <?php if($nav_grou_par == 'project_tickets'){echo 'active';} ?>">
    <a data-group="project_tickets" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_tickets'); ?>" role="tab"><i class="fa fa-life-ring" aria-hidden="true"></i> <?php echo _l('project_tickets'); ?></a>
</li>
<?php } ?>

<?php if(has_contact_permission('contracts') && $project->settings->available_features['project_contracts'] == 1){ ?>
<li role="presentation" class="nav-item text-dark project_tab_contracts <?php if($nav_grou_par == 'project_contracts'){echo 'active';} ?>">
    <a data-group="project_contracts" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_contracts'); ?>" role="tab"><i class="fa fa-life-ring" aria-hidden="true"></i> <?php echo _l('contracts'); ?></a>
</li>
<?php } ?>

<?php if(has_contact_permission('estimates') && $project->settings->available_features['project_estimates'] == 1){ ?>
<li role="presentation" class="nav-item text-dark project_tab_estimates <?php if($nav_grou_par == 'project_estimates'){echo 'active';} ?>">
    <a data-group="project_estimates" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_estimates'); ?>" role="tab"><i class="fa fa-sun-o" aria-hidden="true"></i> <?php echo _l('estimates'); ?></a>
</li>
<?php } ?>

<?php if(has_contact_permission('invoices') && $project->settings->available_features['project_invoices'] == 1){ ?>
<li role="presentation" class="nav-item text-dark project_tab_invoices <?php if($nav_grou_par == 'project_invoices'){echo 'active';} ?>">
    <a data-group="project_invoices" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_invoices'); ?>" role="tab"><i class="fa fa-sun-o" aria-hidden="true"></i> <?php echo _l('project_invoices'); ?></a>
</li>
<?php } ?>

<?php if($project->settings->view_activity_log == 1 && $project->settings->available_features['project_activity'] == 1){ ?>
<li role="presentation" class="nav-item text-dark project_tab_activity <?php if($nav_grou_par == 'project_activity'){echo 'active';} ?>">
    <a data-group="project_activity" href="<?php echo site_url('clients/project/'.$project->id.'?group=project_activity'); ?>" role="tab"><i class="fa fa-exclamation" aria-hidden="true"></i> <?php echo _l('project_activity'); ?></a>
</li>
<?php } ?>

</ul>


<?php 
}

?>


