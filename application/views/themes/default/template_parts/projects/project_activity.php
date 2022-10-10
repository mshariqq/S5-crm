<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<style>
    .projects-activity .activity-feed {
    overflow-y: scroll;
    height: 750px;
}

.activity-feed {
    padding: 15px;
    word-wrap: break-word;
}

.activity-feed .feed-item {
    position: relative;
    padding-bottom: 30px;
    padding-left: 30px;
    border-left: 2px solid #84c529;
}

.feed-item .text-has-action {
    margin-bottom: 7px;
    display: inline-block;
}

.activity-feed .feed-item:last-child {
    border-color: transparent;
}

.activity-feed .feed-item:after {
    content: "";
    display: block;
    position: absolute;
    top: 0;
    left: -6px;
    width: 10px;
    height: 10px;
    border-radius: 6px;
    background: #fff;
    border: 1px solid #4B5158;
}

.activity-feed .feed-item .date {
    position: relative;
    top: -5px;
    color: #4B5158;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: 500;
}

.activity-feed .feed-item .text {
    position: relative;
    top: -3px;
}

.lead-modal .activity-feed .feed-item {
    padding-top: 20px;
    border-right: 1px solid #eaeaea;
    border-top: 1px solid #eaeaea;
    padding-bottom: 15px;
    background: #fdfdfd;
}

.lead-modal .activity-feed .feed-item:first-child {
    border-top-right-radius: 3px;
}

.lead-modal .activity-feed .feed-item:last-child {
    border: 1px solid #eaeaea;
    border-bottom-right-radius: 3px;
}

.lead-modal .activity-feed .feed-item:after {
    top: -5px;
    border: 1px solid #84c529;
}

.feed-item img{
    border-radius: 50%;
    width: 30px;
    height: 30px;
    margin-right: 10px;
}
</style>
<h4 class="font-weight-bold"><?php echo _l("Recent Activities") ?></h4>
<div class="activity-feed col-12">
    <?php if($project->settings->view_activity_log == 1){ ?>
    <?php foreach($activity as $activity){
        ?>
        <div class="feed-item">
            <div class="date"><?php echo time_ago($activity['dateadded']); ?></div>

            <?php
            $fullname = $activity['fullname'];
            if($activity['staff_id'] != 0){ ?>

            <?php echo staff_profile_image($activity['staff_id'],array('staff-profile-image-small','pull-left mright10')); ?>
            
            <?php } else if($activity['contact_id'] != 0){ ?>
            
                <img width="auto" height="80px" src="<?php echo contact_profile_image_url($activity['contact_id']); ?>" class="client-profile-image-small pull-left mright10">
            
            <?php } ?>

            <div class="media-body">
                <div class="display-block">
                    <p class="mtop5 no-mbot">
                        <?php echo $fullname . ' - <b>'.$activity['description'].'</b>'; ?>
                    </p>
                    <p class="text-danger  mtop5"><?php echo $activity['additional_data']; ?></p>
                </div>
            </div>

            <hr class="hr-10" />
            
        </div>
        <?php } ?>
        <?php } ?>
    </div>
