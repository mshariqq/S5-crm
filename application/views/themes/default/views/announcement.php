<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="col-12">
<div class="card section-heading section-announcement">
    <div class="card-body">
        <h4 class="bold no-margin announcement-heading section-text"><?php echo $announcement->name; ?></h4>
        <div class="mtop5 announcement-date"><?php echo _l('announcement_date',_d($announcement->dateadded)); ?></div>
        <?php if($announcement->showname == 1){ echo _l('announcement_from') . ' ' . $announcement->userid; } ?>
    </div>
</div>
<div class="card">
    <div class="card-body tc-content announcement-content">
        <?php echo $announcement->message; ?>
    </div>
</div>

</div>
