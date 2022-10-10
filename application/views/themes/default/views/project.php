<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php echo form_hidden('project_id',$project->id); ?>

<style>
        .kan-ban-col {
        width: 326px;
        height: 416px;
        margin-right: 6px;
        display: inline-block;
    }
    .tasks-phases .kan-ban-col  .panel-body {
        height: 100%;
        overflow-y: auto;
    }

    @media (max-width: 768px) {
        .kan-ban-col {
            width: 216px;
            height: 416px;
            margin-right: 6px;
            display: inline-block;
        }
    }
    .task-attachment .preview_image {
        margin: 0px;
        width: 100%;
    }

    .task-attachment .open-in-external {
        position: absolute;
        right: 30px;
    }

    .task-attachment .task-attachment-user {
        padding-bottom: 10px;
        display: inline-block;
        width: 100%;
        margin-left: 0px;
        border-bottom: 1px solid #f0f0f0;
    }
    .task-user {
        border: 1px solid #F0F0F0;
        padding: 2px;
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
        display: inline-block;
        position: relative;
    }

    .task-checklist-indicator {
        border-radius: 50%;
        border: 1px solid #f0f0f0;
        width: 20px;
        height: 21px;
        display: inline-block;
    }

    .task-checklist-indicator i {
        margin: 0 auto;
        vertical-align: middle;
        margin-left: 3px;
    }

    #task-comments {
        background: #FDFDFD;
        margin-right: -20px;
        margin-left: -20px;
        padding: 20px;
        display: inline-block;
    }
    .task-comment .task-attachment-col-more {
        display: block !important;
    }

    .comment-content .task-attachment-col:nth-child(2),
    .comment-content .task-attachment-col:nth-child(3),
    .comment-content .task-attachment-col:nth-child(4) {
        margin-top: 15px;
    }

    .task-comment .task-attachment-col {
        margin-left: 0;
        padding-left: 0;
    }
</style>

<!-- page header -->
<div class="col-12">
    <div class="page-header">
        <ol class="breadcrumb"><!-- breadcrumb -->
            <li class="breadcrumb-item"><a href="#"> <i class="fa fa-home"></i>  Home</a></li>
            <li class="breadcrumb-item"><a href="#">Projects</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $project->name; ?></li>
        </ol><!-- End breadcrumb -->
        <div class="ml-auto">
        
        </div>
    </div>
</div>

<?php if(!im_mobile()){ ?>
<!-- ONLY FOR DESKTOP -->
<div class="card section-heading section-project">
    <div class="card-body">
       <h3 class="bold mtop10 project-name pull-left"><?php echo $project->name; ?>
           <br> <span class="tag mt-2 text-white text-light" style="background-color:<?php echo $project_status['color']; ?>; font-size:16px;"><?php echo $project_status['name']; ?></span>
       </h3>
        <?php if($project->settings->view_tasks == 1 && $project->settings->create_tasks == 1){ ?>
        <a href="<?php echo site_url('clients/project/'.$project->id.'?group=new_task'); ?>" class="btn btn-indigo pull-right mtop5"><?php echo _l('new_task'); ?> <i class="mdi mdi-plus"></i> </a>
        <?php } ?>
   </div>
</div>

<div class="col-12">
    <div class="row">
        <div class="col-md-2 col-12">
        <?php get_template_part('projects/project_tabs'); ?>

        </div>
        <div class="col-md-10 col-12">
            <div class="card bg-light text-dark">
                <div class="card-body">
                <?php get_template_part('projects/'.$group); ?>

                </div>
            </div>
        </div>
    </div>
                                          

</div>


<?php }else { ?>
<!-- BY DEFAULT FOR MOBILE -->
<div class="col-12">
    <h3 class="font-weight-bold">
        <!-- project title -->
        <?php echo $project->name; ?>
    </h3>
    <?php get_template_part('projects/project_tabs'); ?>

</div>

<div class="col-12">
<div class="card bg-light text-dark" >
                <div class="card-body" style="overflow:scroll">
                <?php get_template_part('projects/'.$group); ?>

                </div>
            </div>
</div>
<?php } ?>

