<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if(is_client_logged_in() && $navigationEnabled){

$_announcements = get_announcements_for_user(false);

if(count($_announcements) > 0){ ?>

<div class="col-12 mt-4">
<div class="card">
    <?php foreach($_announcements as $__announcement){ ?>
        <div class="card-header bg-warning text-dark">
            <div class="text-info alert-dismissible" role="alert">
                <a href="<?php echo site_url('clients/dismiss_announcement/'.$__announcement['announcementid']); ?>" class="close"><span aria-hidden="true">&times;</span></a>
                <h4 class="font-weight-bold text-dark mb-0">
                    <?php echo _l('announcement'); ?>! 
                   </h4>
            </div>
        </div>
        <div class="card-body announcement mbot15 tc-content ">
           
                    
                    <h4 class="font-weight-bold"><?php echo $__announcement['name']; ?></h4>
                    <div class="announcement-message text-primary">
                        <?php echo check_for_links($__announcement['message']); ?>
                    </div>
        </div>
        <div class="card-footer bg-light text-dark">
                <span class="pull-left">            <?php if($__announcement['showname'] == 1){ echo _l('announcement_from').' '. $__announcement['userid']; } ?>
                </span>
                <span class="pull-right">
                    
                        <?php echo _l('announcement_date',_dt($__announcement['dateadded'])); ?>
                </span>
        </div>
            <?php } ?>
</div>
</div>


    <?php } ?>
<?php } ?>
