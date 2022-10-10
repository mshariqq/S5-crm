<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if(count($ticket_replies) > 1){ ?>
<a href="#top" id="toplink">↑</a>
<a href="#bot" id="botlink">↓</a>
<?php } ?>


<div class="col-12">
    <div class="page-header">
        <ol class="breadcrumb"><!-- breadcrumb -->
            <li class="breadcrumb-item"><a href="#"> <i class="fa fa-home"></i>  Home</a></li>
            <li class="breadcrumb-item"><a href="#">Support</a></li>
            <li class="breadcrumb-item " aria-current="page">Tickets</li>
            <li class="breadcrumb-item active" aria-current="page">
                <?php echo $ticket->subject; ?>
            </li>
        </ol><!-- End breadcrumb -->
        <div class="ml-auto pull-right">
    
        </div>
    </div>
</div>

<?php if(im_mobile()){ ?>

    
    <div class="col-12">
        <h4 class="font-weight-bold"> # <?php echo $ticket->id . " ~ " . $ticket->subject ?></h4>
    </div>

    <!-- top alerts -->
    <?php if($ticket->project_id != 0){ ?>

    <div class="col-md-12 single-ticket-project-area">
        <div class="alert alert-info">
            <?php echo _l('ticket_linked_to_project','<a href="'.site_url('clients/project/'.$ticket->project_id).'"><b>'.get_project_name_by_id($ticket->project_id).'</b></a>') ;?>
        </div>
    </div>

    <?php } ?>

        
    <?php set_ticket_open($ticket->clientread,$ticket->ticketid,false); ?>

    <?php echo form_hidden('ticket_id',$ticket->ticketid); ?>
    <div class="col-12">
                        <ul class="list-group">
                            <li class="list-group-item ">
                            <?php echo _l('clients_ticket_single_department', '<span class="pull-right bold text-primary">'.$ticket->department_name.'</span>'); ?>

                            </li>
                            <li class="list-group-item">
                            <?php echo _l('clients_ticket_single_submitted','<span class="pull-right bold text-primary">'._dt($ticket->date).'</span>'); ?>

                            </li>
                            <li class="list-group-item ">
                                <?php echo _l('ticket_dt_submitter'); ?>:
                                <span class="pull-right text-primary">
                                    <?php echo $ticket->submitter; ?>
                                </span>
                            </li>

                            <li class="list-group-item">
                                <?php echo _l('ticket_dt_status'); ?>:
                                <span class="pull-right">
                                    <span class="label inline-block" style="border:1px solid <?php echo $ticket->statuscolor; ?>;color:<?php echo $ticket->statuscolor; ?>">
                                        <?php echo ticket_status_translate($ticket->ticketstatusid); ?>
                                    </span>
                                </span>
                            </li>

                            <li class="list-group-item">
                                <?php echo _l('ticket_dt_priority'); ?>:
                                <?php echo _l('clients_ticket_single_priority','<span class="pull-right bold">'.ticket_priority_translate($ticket->priorityid).'</span>'); ?>

                            </li>

                            <li class="list-group-item">
                                <?php echo _l('ticket_dt_last_reply'); ?>:
                                <span class="pull-right">
                                    <?php echo time_ago($ticket->lastreply); ?>
                                </span>
                            </li>

                            <li class="list-group-item">
                                <?php echo _l('ticket_assigned'); ?>:
                                <span class="pull-right">
                                    <?php if($ticket->assigned != 0){
                                        echo get_staff_full_name($ticket->assigned);
                                    } else {
                                        echo _l('ticket_not_assigned');
                                    }
                                    ?>
                                </span>
                            </li>

                            <li class="list-group-item">
                            <?php if(get_option('services') == 1 && !empty($ticket->service_name)){ ?>
                                    <hr class="hr-10" />
                                    <p>
                                        <?php echo _l('service') . ': <span class="pull-right bold">'.$ticket->service_name.'</span>'; ?>
                                    </p>
                                <?php } ?>
                            </li>

                        </ul>
    </div>


    <div class="col-12">
        <br>
    </div>

    <!-- chat box -->
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <?php echo _l('Conversations'); ?>
            </div>
            <div class="card-body p-1">
                <div id="TicketMobileConversationBox" class="bg-light text-dark p-2">
                    <!-- default ticket open -->
                    <p class="text-muted text-center"><?php echo _l("Ticket Opened") ?></p>
                    <?php if($ticket->admin == NULL || $ticket->admin == 0){ ?>
                        <div id="TicketMobileConversationBox_client" class="bg-primary text-white">
                            <!-- message -->
                            <p class="mb-0">
                                <?php echo check_for_links($ticket->message); ?><br />

                            </p>

                            <!-- user & date -->
                            <p>
                            <small class="pull-right font-italic text-muted"> <i class="fa fa-user"></i>
                                <?php echo $ticket->submitter; ?></small>
                            </p>
                        </div>
                        <p class="text-right">
                                    <?php if(count($ticket->attachments) > 0){
                                        
                                        foreach($ticket->attachments as $attachment){
                                        $path = get_upload_path_by_type('ticket').$ticket->ticketid.'/'.$attachment['file_name'];
                                        $is_image = is_image($path);
                                       
                                        ?>
                                        <a href="<?php echo site_url('download/file/ticket/'. $attachment['id']); ?>" class="inline-block mbot5 text-right">
                                            <i class="<?php echo get_mime_class($attachment['filetype']); ?>"></i> <?php echo $attachment['file_name']; ?>
                                            <?php if($is_image){ ?>
                                            <img width="auto" height="100px" src="<?php echo site_url('download/preview_image?path='.protected_file_url_by_path($path).'&type='.$attachment['filetype']); ?>" class="">
                                            <?php } ?>
                                        </a>
                                        <?php
                                     
                                            }
                                        } ?>
                        </p>
                        <p class="text-right">                    <small class="text-right"><?php echo _l('ticket_posted',_dt($ticket->date)); ?></small>
                        </p>
                        
                    <?php } else { ?>
                        <div id="TicketMobileConversationBox_staff" class="bg-success text-white text-left">
                            <!-- message -->
                            <p class="mb-0">
                                <?php echo check_for_links($ticket->message); ?><br />

                            </p>

                            <!-- user & date -->
                            <p>
                            <small class="pull-left font-italic text-muted"> <i class="fa fa-user"></i>
                                <?php echo $ticket->opened_by; ?>

                                <span class="">
                                (<?php echo _l('ticket_staff_string'); ?>)
                                </span>
                            </small>
                            </p>
                        </div>
                        <p class="text-left">
                                    <?php if(count($ticket->attachments) > 0){
                                        
                                        foreach($ticket->attachments as $attachment){
                                        $path = get_upload_path_by_type('ticket').$ticket->ticketid.'/'.$attachment['file_name'];
                                        $is_image = is_image($path);
                                       
                                        ?>
                                        <a href="<?php echo site_url('download/file/ticket/'. $attachment['id']); ?>" class="inline-block mbot5 text-right">
                                            <i class="<?php echo get_mime_class($attachment['filetype']); ?>"></i> <?php echo $attachment['file_name']; ?>
                                            <?php if($is_image){ ?>
                                            <img width="auto" height="100px" src="<?php echo site_url('download/preview_image?path='.protected_file_url_by_path($path).'&type='.$attachment['filetype']); ?>" class="">
                                            <?php } ?>
                                        </a>
                                        <?php
                                     
                                            }
                                        } ?>
                        </p>
                        <p class="text-left">                    <small class="text-left"><?php echo _l('ticket_posted',_dt($ticket->date)); ?></small>
                        </p>
                    <?php  } ?>
                    



                    <!-- replies -->
                    <?php foreach($ticket_replies as $reply){ ?>
                            <?php if($reply['admin'] == NULL){ ?>
                                <div id="TicketMobileConversationBox_client" class="bg-primary text-white">
                                    <!-- message -->
                                    <p class="mb-0">
                                        <?php echo check_for_links($reply['message']); ?><br />

                                    </p>

                                    <!-- user & date -->
                                    <p>
                                    <small class="pull-right font-italic text-muted"> <i class="fa fa-user"></i>
                                        <?php echo $reply['submitter']; ?></small>
                                    </p>
                                </div>
                                <p class="text-right">
                                    <?php if(count($reply['attachments']) > 0){
                                        
                                        foreach($reply['attachments'] as $attachment){
                                        $path = get_upload_path_by_type('ticket').$ticket->ticketid.'/'.$attachment['file_name'];
                                        $is_image = is_image($path);
                                       
                                        ?>
                                        <a href="<?php echo site_url('download/file/ticket/'. $attachment['id']); ?>" class="inline-block mbot5 text-right">
                                            <i class="<?php echo get_mime_class($attachment['filetype']); ?>"></i> <?php echo $attachment['file_name']; ?>
                                            <?php if($is_image){ ?>
                                            <img width="auto" height="100px" src="<?php echo site_url('download/preview_image?path='.protected_file_url_by_path($path).'&type='.$attachment['filetype']); ?>" class="">
                                            <?php } ?>
                                        </a>
                                        <?php
                                     
                                            }
                                        } ?>
                                </p>
                                <p class="text-right">                    <small class="text-right"><?php echo _l('ticket_posted',_dt($reply['date'])); ?></small>
                                </p>
                        
                            <?php } else { ?>
                                <div id="TicketMobileConversationBox_staff" class="bg-success text-white text-left">
                                    <!-- message -->
                                    <p class="mb-0">
                                        <?php echo check_for_links($reply['message']); ?><br />

                                    </p>

                                    <!-- user & date -->
                                    <p>
                                    <small class="pull-left font-italic text-muted"> <i class="fa fa-user"></i>
                                        <?php echo $reply['submitter']; ?>

                                        <span class="">
                                        (<?php echo _l('ticket_staff_string'); ?>)
                                        </span>
                                    </small>
                                    </p>
                                </div>
                                <p class="text-left">
                                    <?php if(count($reply['attachments']) > 0){
                                        
                                        foreach($reply['attachments'] as $attachment){
                                        $path = get_upload_path_by_type('ticket').$ticket->ticketid.'/'.$attachment['file_name'];
                                        $is_image = is_image($path);
                                       
                                        ?>
                                        <a href="<?php echo site_url('download/file/ticket/'. $attachment['id']); ?>" class="inline-block mbot5 text-left">
                                            <i class="<?php echo get_mime_class($attachment['filetype']); ?>"></i> <?php echo $attachment['file_name']; ?>
                                            <?php if($is_image){ ?>
                                            <img width="auto" height="100px" src="<?php echo site_url('download/preview_image?path='.protected_file_url_by_path($path).'&type='.$attachment['filetype']); ?>" class="mtop5">
                                            <?php } ?>
                                        </a>
                                        <?php 
                                     
                                            }
                                        } ?>
                                </p>
                                <p class="text-left">                    <small class="text-left"><?php echo _l('ticket_posted',_dt($reply['date'])); ?></small>
                                </p>
                            <?php  } ?>
                            <hr>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
           <div class="card-body">
            <h6><?php echo _l("Add new reply") ?></h6>
                <?php echo form_open_multipart($this->uri->uri_string(),array('id'=>'ticket-reply')); ?>

                    <textarea name="message" class="form-control" rows="8"></textarea>

                            <?php echo form_error('message'); ?>
                                <br>

                            <div class="input-group col-11">
                                    <label for="attachment" class="control-label"><?php echo _l('clients_ticket_attachments'); ?></label>
                                    <div class="input-group input-group-sm">
                                     <input type="file" extension="<?php echo str_replace(['.', ' '], '', get_option('ticket_attachments_file_extensions')); ?>" filesize="<?php echo file_upload_max_size(); ?>" class="form-control" name="attachments[0]" accept="<?php echo get_ticket_form_accepted_mimes(); ?>">
                                     <span class="input-group-btn">
                                        <button class="btn btn-success add_more_attachments p8-half" data-max="<?php echo get_option('maximum_allowed_ticket_attachments'); ?>" type="button"><i class="fa fa-plus"></i></button>
                                        </span>
                            </div>

                                    <button class="mt-2 btn btn-indigo" type="submit" data-form="#ticket-reply" autocomplete="off" data-loading-text="<?php echo _l('wait_text'); ?>"><?php echo _l('ticket_single_add_reply'); ?>
                                        <i class="mdi mdi-comment"></i>
                                    </button>

                <?php echo form_close(); ?>
           </div>


        </div>
    </div>



<?php } else { ?>
<!-- DESKTOP -->
    
<div class="col-12">
        <h4 class="font-weight-bold"> # <?php echo $ticket->id . " ~ " . $ticket->subject ?></h4>
    </div>

    <!-- top alerts -->
    <?php if($ticket->project_id != 0){ ?>

    <div class="col-md-12 single-ticket-project-area">
        <div class="alert alert-info">
            <?php echo _l('ticket_linked_to_project','<a href="'.site_url('clients/project/'.$ticket->project_id).'"><b>'.get_project_name_by_id($ticket->project_id).'</b></a>') ;?>
        </div>
    </div>

    <?php } ?>

        
    <?php set_ticket_open($ticket->clientread,$ticket->ticketid,false); ?>

    <?php echo form_hidden('ticket_id',$ticket->ticketid); ?>

    <div class="col-3">
                        <ul class="list-group">
                            <li class="list-group-item ">
                            <?php echo _l('clients_ticket_single_department', '<span class="pull-right bold text-primary">'.$ticket->department_name.'</span>'); ?>

                            </li>
                            <li class="list-group-item">
                            <?php echo _l('clients_ticket_single_submitted','<span class="pull-right bold text-primary">'._dt($ticket->date).'</span>'); ?>

                            </li>
                            <li class="list-group-item ">
                                <?php echo _l('ticket_dt_submitter'); ?>:
                                <span class="pull-right text-primary">
                                    <?php echo $ticket->submitter; ?>
                                </span>
                            </li>

                            <li class="list-group-item">
                                <?php echo _l('ticket_dt_status'); ?>:
                                <span class="pull-right">
                                    <span class="label inline-block" style="border:1px solid <?php echo $ticket->statuscolor; ?>;color:<?php echo $ticket->statuscolor; ?>">
                                        <?php echo ticket_status_translate($ticket->ticketstatusid); ?>
                                    </span>
                                </span>
                            </li>

                            <li class="list-group-item">
                                <?php echo _l('ticket_dt_priority'); ?>:
                                <?php echo _l('clients_ticket_single_priority','<span class="pull-right bold">'.ticket_priority_translate($ticket->priorityid).'</span>'); ?>

                            </li>

                            <li class="list-group-item">
                                <?php echo _l('ticket_dt_last_reply'); ?>:
                                <span class="pull-right">
                                    <?php echo time_ago($ticket->lastreply); ?>
                                </span>
                            </li>

                            <li class="list-group-item">
                                <?php echo _l('ticket_assigned'); ?>:
                                <span class="pull-right">
                                    <?php if($ticket->assigned != 0){
                                        echo get_staff_full_name($ticket->assigned);
                                    } else {
                                        echo _l('ticket_not_assigned');
                                    }
                                    ?>
                                </span>
                            </li>

                            <li class="list-group-item">
                            <?php if(get_option('services') == 1 && !empty($ticket->service_name)){ ?>
                                    <hr class="hr-10" />
                                    <p>
                                        <?php echo _l('service') . ': <span class="pull-right bold">'.$ticket->service_name.'</span>'; ?>
                                    </p>
                                <?php } ?>
                            </li>

                        </ul>
    </div>

    <!-- chat box -->
    <div class="col-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <?php echo _l('Conversations'); ?>
            </div>
            <div class="card-body p-1">
                <div id="TicketMobileConversationBox" class="bg-light text-dark p-2">
                    <!-- default ticket open -->
                    <p class="text-muted text-center"><?php echo _l("Ticket Opened") ?></p>
                    <?php if($ticket->admin == NULL || $ticket->admin == 0){ ?>
                        <div id="TicketMobileConversationBox_client" class="bg-primary text-white">
                            <!-- message -->
                            <p class="mb-0">
                                <?php echo check_for_links($ticket->message); ?><br />

                            </p>

                            <!-- user & date -->
                            <p>
                            <small class="pull-right font-italic text-muted"> <i class="fa fa-user"></i>
                                <?php echo $ticket->submitter; ?></small>
                            </p>
                        </div>
                        <p class="text-right">
                                    <?php if(count($ticket->attachments) > 0){
                                        
                                        foreach($ticket->attachments as $attachment){
                                        $path = get_upload_path_by_type('ticket').$ticket->ticketid.'/'.$attachment['file_name'];
                                        $is_image = is_image($path);
                                       
                                        ?>
                                        <a href="<?php echo site_url('download/file/ticket/'. $attachment['id']); ?>" class="inline-block mbot5 text-right">
                                            <i class="<?php echo get_mime_class($attachment['filetype']); ?>"></i> <?php echo $attachment['file_name']; ?>
                                            <?php if($is_image){ ?>
                                            <img width="auto" height="100px" src="<?php echo site_url('download/preview_image?path='.protected_file_url_by_path($path).'&type='.$attachment['filetype']); ?>" class="">
                                            <?php } ?>
                                        </a>
                                        <?php
                                     
                                            }
                                        } ?>
                        </p>
                        <p class="text-right">                    <small class="text-right"><?php echo _l('ticket_posted',_dt($ticket->date)); ?></small>
                        </p>
                        
                    <?php } else { ?>
                        <div id="TicketMobileConversationBox_staff" class="bg-success text-white text-left">
                            <!-- message -->
                            <p class="mb-0">
                                <?php echo check_for_links($ticket->message); ?><br />

                            </p>

                            <!-- user & date -->
                            <p>
                            <small class="pull-left font-italic text-muted"> <i class="fa fa-user"></i>
                                <?php echo $ticket->opened_by; ?>

                                <span class="">
                                (<?php echo _l('ticket_staff_string'); ?>)
                                </span>
                            </small>
                            </p>
                        </div>
                        <p class="text-left">
                                    <?php if(count($ticket->attachments) > 0){
                                        
                                        foreach($ticket->attachments as $attachment){
                                        $path = get_upload_path_by_type('ticket').$ticket->ticketid.'/'.$attachment['file_name'];
                                        $is_image = is_image($path);
                                       
                                        ?>
                                        <a href="<?php echo site_url('download/file/ticket/'. $attachment['id']); ?>" class="inline-block mbot5 text-right">
                                            <i class="<?php echo get_mime_class($attachment['filetype']); ?>"></i> <?php echo $attachment['file_name']; ?>
                                            <?php if($is_image){ ?>
                                            <img width="auto" height="100px" src="<?php echo site_url('download/preview_image?path='.protected_file_url_by_path($path).'&type='.$attachment['filetype']); ?>" class="">
                                            <?php } ?>
                                        </a>
                                        <?php
                                     
                                            }
                                        } ?>
                        </p>
                        <p class="text-left">                    <small class="text-left"><?php echo _l('ticket_posted',_dt($ticket->date)); ?></small>
                        </p>
                    <?php  } ?>
                    



                    <!-- replies -->
                    <?php foreach($ticket_replies as $reply){ ?>
                            <?php if($reply['admin'] == NULL){ ?>
                                <div id="TicketMobileConversationBox_client" class="bg-primary text-white">
                                    <!-- message -->
                                    <p class="mb-0">
                                        <?php echo check_for_links($reply['message']); ?><br />

                                    </p>

                                    <!-- user & date -->
                                    <p>
                                    <small class="pull-right font-italic text-muted"> <i class="fa fa-user"></i>
                                        <?php echo $reply['submitter']; ?></small>
                                    </p>
                                </div>
                                <p class="text-right">
                                    <?php if(count($reply['attachments']) > 0){
                                        
                                        foreach($reply['attachments'] as $attachment){
                                        $path = get_upload_path_by_type('ticket').$ticket->ticketid.'/'.$attachment['file_name'];
                                        $is_image = is_image($path);
                                       
                                        ?>
                                        <a href="<?php echo site_url('download/file/ticket/'. $attachment['id']); ?>" class="inline-block mbot5 text-right">
                                            <i class="<?php echo get_mime_class($attachment['filetype']); ?>"></i> <?php echo $attachment['file_name']; ?>
                                            <?php if($is_image){ ?>
                                            <img width="auto" height="100px" src="<?php echo site_url('download/preview_image?path='.protected_file_url_by_path($path).'&type='.$attachment['filetype']); ?>" class="">
                                            <?php } ?>
                                        </a>
                                        <?php
                                     
                                            }
                                        } ?>
                                </p>
                                <p class="text-right">                    <small class="text-right"><?php echo _l('ticket_posted',_dt($reply['date'])); ?></small>
                                </p>
                        
                            <?php } else { ?>
                                <div id="TicketMobileConversationBox_staff" class="bg-success text-white text-left">
                                    <!-- message -->
                                    <p class="mb-0">
                                        <?php echo check_for_links($reply['message']); ?><br />

                                    </p>

                                    <!-- user & date -->
                                    <p>
                                    <small class="pull-left font-italic text-muted"> <i class="fa fa-user"></i>
                                        <?php echo $reply['submitter']; ?>

                                        <span class="">
                                        (<?php echo _l('ticket_staff_string'); ?>)
                                        </span>
                                    </small>
                                    </p>
                                </div>
                                <p class="text-left">
                                    <?php if(count($reply['attachments']) > 0){
                                        
                                        foreach($reply['attachments'] as $attachment){
                                        $path = get_upload_path_by_type('ticket').$ticket->ticketid.'/'.$attachment['file_name'];
                                        $is_image = is_image($path);
                                       
                                        ?>
                                        <a href="<?php echo site_url('download/file/ticket/'. $attachment['id']); ?>" class="inline-block mbot5 text-left">
                                            <i class="<?php echo get_mime_class($attachment['filetype']); ?>"></i> <?php echo $attachment['file_name']; ?>
                                            <?php if($is_image){ ?>
                                            <img width="auto" height="100px" src="<?php echo site_url('download/preview_image?path='.protected_file_url_by_path($path).'&type='.$attachment['filetype']); ?>" class="mtop5">
                                            <?php } ?>
                                        </a>
                                        <?php 
                                     
                                            }
                                        } ?>
                                </p>
                                <p class="text-left">                    <small class="text-left"><?php echo _l('ticket_posted',_dt($reply['date'])); ?></small>
                                </p>
                            <?php  } ?>
                            <hr>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
           <div class="card-body">
            <h6><?php echo _l("Add new reply") ?></h6>
                <?php echo form_open_multipart($this->uri->uri_string(),array('id'=>'ticket-reply')); ?>

                    <textarea name="message" class="form-control" rows="8"></textarea>

                            <?php echo form_error('message'); ?>
                                <br>

                            <div class="input-group col-11">
                                    <label for="attachment" class="control-label"><?php echo _l('clients_ticket_attachments'); ?></label>
                                    <div class="input-group input-group-sm">
                                     <input type="file" extension="<?php echo str_replace(['.', ' '], '', get_option('ticket_attachments_file_extensions')); ?>" filesize="<?php echo file_upload_max_size(); ?>" class="form-control" name="attachments[0]" accept="<?php echo get_ticket_form_accepted_mimes(); ?>">
                                     <span class="input-group-btn">
                                        <button class="btn btn-success add_more_attachments p8-half" data-max="<?php echo get_option('maximum_allowed_ticket_attachments'); ?>" type="button"><i class="fa fa-plus"></i></button>
                                        </span>
                            </div>

                                    <button class="mt-2 btn btn-indigo" type="submit" data-form="#ticket-reply" autocomplete="off" data-loading-text="<?php echo _l('wait_text'); ?>"><?php echo _l('ticket_single_add_reply'); ?>
                                        <i class="mdi mdi-comment"></i>
                                    </button>

                <?php echo form_close(); ?>
           </div>


        </div>
    </div>



<?php } ?>
