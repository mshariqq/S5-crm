<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<div class="col-12">

   <div class="row">
      <div class="col-md-3">
         <div class="mbot30">
            <div class="contract-html-logo" id="contractLogoCont">
               <?php echo get_dark_company_logo(); ?>
            </div>
         </div>
      </div>

      <div class="clearfix"></div>

   </div>

   <hr>

   <div class="top" data-sticky data-sticky-class="">
      <div class="container preview-sticky-container">
         <div class="row">
            <div class="col-md-12">
               <h4 class="pull-left no-mtop contract-html-subject font-weight-bold"><?php echo $contract->subject; ?><br />
                  <span class="tag bg-primary"><?php echo $contract->type_name; ?></span>
               </h4>

               <div class="visible-xs">
                  <div class="clearfix"></div>
               </div>

               <?php if($contract->signed == 0 && $contract->marked_as_signed == 0) { ?>

                  <button type="submit" id="accept_action" class="btn btn-success pull-right action-button mr-md-2"><?php echo _l('Sign & Start'); ?> <i class="fa fa-pencil" aria-hidden="true"></i> </button>
               
               <?php } ?>
              


               <?php echo form_open($this->uri->uri_string()); ?>
                  <button type="submit" class="btn btn-primary pull-right action-button mright5 contract-html-pdf mr-md2">
                  <i class="fa fa-file-pdf-o"></i> <?php echo _l('clients_invoice_html_btn_download'); ?> <i class="fa fa-download" aria-hidden="true"></i> </button>
               <?php echo form_hidden('action','contract_pdf'); ?>

               <?php echo form_close(); ?>

                  <?php if(is_client_logged_in() && has_contact_permission('contracts')){ ?>
                     <a href="<?php echo site_url('clients/contracts/'); ?>" class="btn btn-white mright5 pull-right action-button go-to-portal">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  <?php echo _l('client_go_to_dashboard'); ?>
                     </a>
               <?php } ?>
            </div>
            <?php 

               if($contract->signed =! 0 && $contract->marked_as_signed =! 0){ ?>

               <div class="col-12">
   
                     <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong><?php echo _l("Signed & Started") ?></strong> <?php echo _l("This contract is running!") ?>
                     </div>
               </div>
               
                  
            <?php   } ?>
         </div>
      </div>
   </div>
</div>

<div class="col-12">
   <hr>
</div>

<div class="row col-12">
   <div class="col-md-8 contract-left">
      <div class="card mtop20">
         <div class="card-body tc-content padding-30 contract-html-content">
            <h4 class="font-weight-bold mb-0"><?php echo _l("Contract Contents") ?></h4>
            <hr>
            <?php echo $contract->content; ?>
         </div>
      </div>
   </div>
   <div class="col-md-4 contract-right">
                     <div class="card bg-light text-dark">
                        <div class="card-body">
                        <div class="inner mtop20 contract-html-tabs">
         <ul class="nav nav-tabs nav-tabs-flat mbot15" role="tablist">
            <li role="presentation" class="<?php if(!$this->input->get('tab') || $this->input->get('tab') === 'summary'){echo 'active';} ?>">
               <a href="#summary" aria-controls="summary" role="tab" data-toggle="tab">
               <i class="fa fa-file-text-o" aria-hidden="true"></i> <?php echo _l('summary'); ?></a>
            </li>
            <li role="presentation" class="<?php if($this->input->get('tab') === 'discussion'){echo 'active';} ?>">
               <a href="#discussion" aria-controls="discussion" role="tab" data-toggle="tab">
               <i class="fa fa-commenting-o" aria-hidden="true"></i> <?php echo _l('discussion'); ?>
               </a>
            </li>
         </ul>
         <div class="tab-content">
            <div role="tabpanel" class="tab-pane<?php if(!$this->input->get('tab') || $this->input->get('tab') === 'summary'){echo ' active';} ?>" id="summary">

                        <address class="contract-html-company-info">
                           <?php echo format_organization_info(); ?>
                        </address>
            

               <div class="row col-12">
                  <?php if($contract->contract_value != 0){ ?>

                     <div class="col-md-12 contract-value ">
                        <h4 class="bold mbot30">
                           <?php echo _l('contract_value'); ?>:
                           <b style="color: green" class="font-weight-bold"><?php echo app_format_money($contract->contract_value, get_base_currency()); ?></b>
                        </h4>
                     </div>

                  <?php } ?>

                  <div class="col-md-5 text-primary contract-number border ">
                     <?php echo _l('Contract Id'); ?>
                  </div>
                  <div class="col-md-7 contract-number border ">
                     <?php echo $contract->id; ?>
                  </div>
                  <div class="col-md-5 text-primary contract-start-date border ">
                     <?php echo _l('contract_start_date'); ?>
                  </div>
                  <div class="col-md-7 contract-start-date border ">
                     <?php echo _d($contract->datestart); ?>
                  </div>
                  <?php if(!empty($contract->dateend)){ ?>
                  <div class="col-md-5 text-primary contract-end-date border ">
                     <?php echo _l('contract_end_date'); ?>
                  </div>
                  <div class="col-md-7 contract-end-date border ">
                     <?php echo _d($contract->dateend); ?>
                  </div>
                  <?php } ?>
                  <?php if(!empty($contract->type_name)){ ?>
                  <div class="col-md-5 text-primary contract-type border">
                     <?php echo _l('contract_type'); ?>
                  </div>
                  <div class="col-md-7 contract-type border">
                     <?php echo $contract->type_name; ?>
                  </div>
                  <?php } ?>
                  <?php if($contract->signed == 1){ ?>
                  <div class="col-md-5 text-muted contract-type border">
                     <?php echo _l('date_signed'); ?>
                  </div>
                  <div class="col-md-7 contract-type">
                     <?php echo _d(explode(' ', $contract->acceptance_date)[0]); ?>
                  </div>
                  <?php } ?>
               </div>
               <?php if(count($contract->attachments) > 0){ ?>
               <div class="contract-attachments">
                  <div class="clearfix"></div>
                  <hr />
                  <p class="bold mbot15"><?php echo _l('contract_files'); ?></p>
                  <?php foreach($contract->attachments as $attachment){
                     $attachment_url = site_url('download/file/contract/'.$attachment['attachment_key']);
                     if(!empty($attachment['external'])){
                      $attachment_url = $attachment['external_link'];
                     }
                     ?>
                  <div class="col-md-12 row mbot15">
                     <div class="pull-left"><i class="<?php echo get_mime_class($attachment['filetype']); ?>"></i></div>
                     <a href="<?php echo $attachment_url; ?>"><?php echo $attachment['file_name']; ?></a>
                  </div>
                  <?php } ?>
               </div>
               <?php } ?>
            </div>
            <div role="tabpanel" class="tab-pane<?php if($this->input->get('tab') === 'discussion'){echo ' active';} ?>" id="discussion">
               <?php echo form_open($this->uri->uri_string()) ;?>
               <div class="contract-comment col-12">
                  
                  <textarea name="content" rows="4" class="form-control bg-white"></textarea>
                  
                  <button type="submit" class="btn btn-indigo btn-sm mtop10 pull-right mt-2" data-loading-text="<?php echo _l('wait_text'); ?>"><?php echo _l('proposal_add_comment'); ?> <i class="fa fa-comment" aria-hidden="true"></i> </button>
                  
                  <?php echo form_hidden('action','contract_comment'); ?>
               </div>

               <?php echo form_close(); ?>

               <div class="clearfix"></div>

               <?php
                  $comment_html = '';
                  foreach ($comments as $comment) {
                   $comment_html .= '<div class="contract_comment col-12 mt-1 bg-white border  mtop10 mbot20" data-commentid="' . $comment['id'] . '">';
                   if($comment['staffid'] != 0){

                    $comment_html .= staff_profile_image($comment['staffid'], array(
                     'staff-profile-image-small',
                     'media-object img-circle pull-left mright10'
                  ));

                  }

                     $comment_html .= '<div class="media-body  valign-middle">';
                        $comment_html .= '<div class="mt-0">';
                           $comment_html .= '<b>';
                              if($comment['staffid'] != 0){
                              $comment_html .= get_staff_full_name($comment['staffid']);
                              } else {
                              $comment_html .= _l('is_customer_indicator');
                              }
                           $comment_html .= '</b>';

                        $comment_html .= ' - <small class="mtop10 text-muted">' . time_ago($comment['dateadded']) . '</small>';
                        $comment_html .= '</div>';
                     $comment_html .= check_for_links($comment['content']) . '<br />';
                     $comment_html .= '</div>';
                  $comment_html .= '</div>';
                  }
                  echo $comment_html; ?>
            </div>
         </div>
      </div>
                        </div>
                     </div>
   </div>
</div>
<?php
   get_template_part('identity_confirmation_form', array('formData' => form_hidden('action', 'sign_contract')));
   ?>
<script>

   
$('body.identity-confirmation #accept_action').on('click', function() {
        var $submitForm = $('#identityConfirmationForm');
        if ($submitForm.length && !$submitForm.validate().checkForm()) {
            $('#identityConfirmationModal').modal({ show: true, backdrop: 'static', keyboard: false });
        } else {
            $(this).prop('disabled', true);
            $submitForm.submit();
        }
        return false;
    });

   $(function(){
      new Sticky('[data-sticky]');
      $(".contract-left table").wrap("<div class='table-responsive'></div>");
         // Create lightbox for contract content images
         $('.contract-html-content img').wrap( function(){ return '<a href="' + $(this).attr('src') + '" data-lightbox="contract"></a>'; });
      })
</script>

<br>
<br>
<br>
<br>
