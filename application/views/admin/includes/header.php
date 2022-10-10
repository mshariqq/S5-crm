<?php defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
?>
<li id="top_search" class="dropdown" data-toggle="tooltip" data-placement="bottom" data-title="<?php echo _l('search_by_tags'); ?>">
   <input type="search" id="search_input" class="form-control" placeholder="<?php echo _l('top_search_placeholder'); ?>">
   <div id="search_results">
   </div>
   <ul class="dropdown-menu search-results animated fadeIn no-mtop search-history" id="search-history">
   </ul>
</li>
<li id="top_search_button">
   <button class="btn"><i class="fa fa-search"></i></button>
</li>


<?php
$top_search_area = ob_get_contents();
ob_end_clean();

$totalQuickActionsRemoved = 0;
$quickActions = $this->app->get_quick_actions_links();
foreach($quickActions as $key => $item){
 if(isset($item['permission'])){
  if(!has_permission($item['permission'],'','create')){
    $totalQuickActionsRemoved++;
  }
}
}
?>

<!-- Custom -->

<!--app-header-->
<div  class="app-header header hor-topheader d-flex">
   <div class="container">
      <div class="d-flex">
            <?php get_company_logo(get_admin_uri().'/') ?>
            <!-- <a class="header-brand" href="index.html">
            <img src="../assets/images/brand/logo.png" class="header-brand-img main-logo" alt="Hogo logo">
            <img src="../assets/images/brand/icon.png" class="header-brand-img icon-logo" alt="Hogo logo"> -->
         </a><!-- logo-->
         <a id="horizontal-navtoggle" class="animated-arrow hor-toggle"><span></span></a>
         
         <a href="#" data-toggle="search" class="nav-link nav-link  navsearch"><i class="fa fa-search"></i></a><!-- search icon -->
         
         <div class="header-form">
            <form class="form-inline">
               <div class="search-element mr-3">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                  <span class="Search-icon"><i class="fa fa-search"></i></span>
               </div>
            </form><!-- search-bar -->
         </div>

         <ul class="nav header-nav">

            <li class="nav-item dropdown header-option m-2">
               <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="fe fe-settings mr-2"></i>Settings
               </a>
               <div class="dropdown-menu dropdown-menu-left">
                     <ul class="p-4">
                       

                        <?php if($totalQuickActionsRemoved != count($quickActions)){ ?>
                        <li class="quick-links">
                           <ul class="dropdown-menu" aria-labelledby="dropdownQuickLinks">
                                 <?php
                                    foreach($quickActions as $key => $item){
                                    $url = '';
                                    if(isset($item['permission'])){
                                       if(!has_permission($item['permission'],'','create')){
                                       continue;
                                    }
                                    }
                                    if(isset($item['custom_url'])){
                                    $url = $item['url'];
                                    } else {
                                    $url = admin_url(''.$item['url']);
                                    }
                                    $href_attributes = '';
                                    if(isset($item['href_attributes'])){
                                    foreach ($item['href_attributes'] as $key => $val) {
                                       $href_attributes .= $key . '=' . '"' . $val . '"';
                                    }
                                    }
                                    ?>
                                 <li>
                                    <a href="<?php echo $url; ?>" <?php echo $href_attributes; ?>>
                                    <i class="fa fa-plus-square-o"></i>
                                    <?php echo $item['name']; ?>
                                    </a>
                                 </li>
                                 <?php } ?>
                              </ul>
                        </li>
                        <?php } ?>

                        <?php
                           hooks()->do_action('before_render_aside_menu');
                           ?>

                        <?php foreach($sidebar_menu as $key => $item){
                           if((isset($item['collapse']) && $item['collapse']) && count($item['children']) === 0) {
                           continue;
                           }
                           ?>

                        <li class="menu-item-<?php echo $item['slug']; ?>"
                           <?php echo _attributes_to_string(isset($item['li_attributes']) ? $item['li_attributes'] : []); ?>>
                           <a href="<?php echo count($item['children']) > 0 ? '#' : $item['href']; ?>"
                           aria-expanded="false"
                           <?php echo _attributes_to_string(isset($item['href_attributes']) ? $item['href_attributes'] : []); ?>>
                              <i class="<?php echo $item['icon']; ?> menu-icon"></i>
                              <span class="menu-text">
                              <?php echo _l($item['name'],'', false); ?>
                              </span>
                              <?php if(count($item['children']) > 0){ ?>
                              <span class="fa arrow pleft5"></span>
                              <?php } ?>
                              <?php if (isset($item['badge'], $item['badge']['value']) && !empty($item['badge'])) {?>
                                 <span class="badge pull-right 
                                 <?=isset($item['badge']['type']) &&  $item['badge']['type'] != '' ? "bg-{$item['badge']['type']}" : 'bg-info' ?>"
                                 <?=(isset($item['badge']['type']) &&  $item['badge']['type'] == '') ||
                                          isset($item['badge']['color']) ? "style='background-color: {$item['badge']['color']}'" : '' ?>>
                                 <?= $item['badge']['value'] ?>
                              </span>
                              <?php } ?>
                              </a>
                           <?php if(count($item['children']) > 0){ ?>
                           <ul class=" collapse" aria-expanded="false">
                              <?php foreach($item['children'] as $submenu){
                                 ?>
                              <li class="sub-menu-item-<?php echo $submenu['slug']; ?>"
                              <?php echo _attributes_to_string(isset($submenu['li_attributes']) ? $submenu['li_attributes'] : []); ?>>
                              <a href="<?php echo $submenu['href']; ?>"
                                 <?php echo _attributes_to_string(isset($submenu['href_attributes']) ? $submenu['href_attributes'] : []); ?>>
                                 <?php if(!empty($submenu['icon'])){ ?>
                                 <i class="<?php echo $submenu['icon']; ?> menu-icon"></i>
                                 <?php } ?>
                                 <span class="sub-menu-text">
                                    <?php echo _l($submenu['name'],'',false); ?>
                                 </span>
                                 </a>
                              <?php if (isset($submenu['badge'], $submenu['badge']['value']) && !empty($submenu['badge'])) {?>
                                 <span class="badge pull-right 
                                 <?=isset($submenu['badge']['type']) &&  $submenu['badge']['type'] != '' ? "bg-{$submenu['badge']['type']}" : 'bg-info' ?>"
                                 <?=(isset($submenu['badge']['type']) &&  $submenu['badge']['type'] == '') ||
                                 isset($submenu['badge']['color']) ? "style='background-color: {$submenu['badge']['color']}'" : '' ?>>
                                 <?= $submenu['badge']['value'] ?>
                              </span>
                              <?php } ?>
                              </li>
                              <?php } ?>
                           </ul>
                           <?php } ?>
                        </li>

                        <?php hooks()->do_action('after_render_single_aside_menu', $item); ?>

                        <?php } ?>

                        <?php if($this->app->show_setup_menu() == true && (is_staff_member() || is_admin())){ ?>
                        <li<?php if(get_option('show_setup_menu_item_only_on_hover') == 1) { echo ' style="display:none;"'; } ?> id="setup-menu-item">
                           <a href="#" class="open-customizer"><i class="fa fa-cog menu-icon"></i>
                           <span class="menu-text">
                              <?php echo _l('setting_bar_heading'); ?>
                              <?php
                                 if ($modulesNeedsUpgrade = $this->app_modules->number_of_modules_that_require_database_upgrade()) {
                                    echo '<span class="badge menu-badge bg-warning">' . $modulesNeedsUpgrade . '</span>';
                                 }
                              ?>
                           </span>
                           </a>
                           <?php } ?>
                        </li>
                        <?php hooks()->do_action('after_render_aside_menu'); ?>
                     </ul>
               </div>
            </li>
         </ul>

         <div class="d-flex order-lg-2 ml-auto header-rightmenu">
            <div class="dropdown">
               <a  class="nav-link icon full-screen-link" id="fullscreen-button">
                  <i class="fe fe-maximize-2"></i>
               </a>
            </div><!-- full-screen -->

            <div class="dropdown header-notify">
               <a class="nav-link icon" data-toggle="dropdown" aria-expanded="false">
                  <i class="fe fe-bell "></i>
                  <?php if($current_user->total_unread_notifications > 0){ ?>
                     <span class="pulse bg-success"></span>
                     <span class="label icon-total-indicator bg-warning icon-notifications"><?php echo $current_user->total_unread_notifications; ?></span>
                  <?php } ?>
               </a>
               <div style="max-height: 90vh; overflow:scroll" class="dropdown-menu dropdown-menu-right dropdown-menu-arrow p-3">
                  <a href="#" class="dropdown-item text-left text-danger">
                     <?php echo $current_user->total_unread_notifications ?> Notifications

                  </a>
                  <a href="#" class="btn btn-sm btn-info mb-2" onclick="mark_all_notifications_as_read_inline(); return false;"><?php echo _l('mark_all_as_read'); ?></a>
                  <br>
                  <a href="#" class="text-left btn btn-sm btn-success mb-3">View all</a>
                  <br>
                  <ul class="border-top">
                  <?php
                              $_notifications = $this->misc_model->get_user_notifications();
                              foreach($_notifications as $notification){ ?>
                                 <li class="relative mb-2 notification-wrapper" data-notification-id="<?php echo $notification['id']; ?>">
                                    <?php if(!empty($notification['link'])){ ?>
                                    <a href="<?php echo admin_url($notification['link']); ?>" class="notification-top notification-link">
                                    <?php } ?>
                                    <div class="notification-box<?php if($notification['isread_inline'] == 0){echo ' unread';} ?>">
                                       <?php
                                       if(($notification['fromcompany'] == NULL && $notification['fromuserid'] != 0) || ($notification['fromcompany'] == NULL && $notification['fromclientid'] != 0)){
                                          if($notification['fromuserid'] != 0){
                                          // echo staff_profile_image($notification['fromuserid'],array('staff-profile-image-small','img-circle notification-image','pull-left'));
                                       } else {
                                          // echo '<img width="5px" height: "5px" src="'.contact_profile_image_url($notification['fromclientid']).'" class="client-profile-image-small img-circle pull-left notification-image">';
                                       }
                                    }
                                    ?>
                                    <div class="media-body">
                                       <?php
                                       $additional_data = '';
                                       if(!empty($notification['additional_data'])){
                                          $additional_data = unserialize($notification['additional_data']);

                                          $i = 0;
                                          foreach($additional_data as $data){
                                          if(strpos($data,'<lang>') !== false){
                                             $lang = get_string_between($data, '<lang>', '</lang>');
                                             $temp = _l($lang);
                                             if(strpos($temp,'project_status_') !== FALSE){
                                                $status = get_project_status_by_id(strafter($temp, 'project_status_'));
                                                $temp = $status['name'];
                                             }
                                             $additional_data[$i] = $temp;
                                          }
                                          $i++;
                                          }
                                       }
                                       $description = _l($notification['description'], $additional_data);
                                       if(($notification['fromcompany'] == NULL && $notification['fromuserid'] != 0)
                                          || ($notification['fromcompany'] == NULL && $notification['fromclientid'] != 0)){
                                       if($notification['fromuserid'] != 0){
                                          $description = $notification['from_fullname']. ' - ' . $description;
                                       } else {
                                          $description = $notification['from_fullname']. ' - ' . $description . '<br /><span class="label inline-block mtop5 label-info">'._l('is_customer_indicator').'</span>';
                                       }
                                    }
                                    echo '<span class="notification-title">'. $description .'</span>'; ?><br />
                                    <small class="text-muted">
                                       <span class="text-has-action" data-placement="right" data-toggle="tooltip" data-title="<?php echo _dt($notification['date']); ?>">
                                          <?php echo time_ago($notification['date']); ?>
                                       </span>
                                    </small>
                                    </div>
                                 </div>
                                 <?php if(!empty($notification['link'])){ ?>
                                 </a>
                              <?php } ?>
                              <?php if($notification['isread_inline'] == 0){ ?>
                                 <a href="#" class="text-muted pull-right not-mark-as-read-inline" onclick="set_notification_read_inline(<?php echo $notification['id']; ?>);" data-placement="left" data-toggle="tooltip" data-title="<?php echo _l('mark_as_read'); ?>"><small><i class="fa fa-circle-thin" aria-hidden="true"></i></small></a>
                              <?php } ?>
                              </li>
                     <?php } ?>
                  </ul>
               </div>
            </div><!-- notifications -->

            <div class="dropdown header-user">
               <a class="nav-link leading-none siderbar-link"  data-toggle="sidebar-right" data-target=".sidebar-right">
                  <span class="mr-3 d-none d-lg-block ">
                     <span class="text-gray-white"><span class="ml-2">
                        <?php echo $current_user->firstname . $current_user->lastname; ?>
                     </span></span>
                  </span>
                  <span class="avatar avatar-md brround">
                     <?php echo staff_profile_image($current_user->staffid,array('avatar', 'avatar-md', 'brround', 'img','img-responsive','staff-profile-image-small','pull-left')); ?>

                     <!-- <img src="../assets/images/users/female/33.png" alt="Profile-img" class="avatar avatar-md brround"> -->
                  </span>
               </a>
               <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <div class="header-user text-center mt-4 pb-4">
                     <span class="avatar avatar-xxl brround">
                        <?php echo staff_profile_image($current_user->staffid,array('avatar', 'avatar-md', 'brround', 'img','pull-left')); ?>
                     </span>
                     <a href="#" class="dropdown-item text-center font-weight-semibold user h3 mb-0">Alison</a>
                     <small>
                        <?php echo $current_user->email; ?>
                     </small>
                  </div>

                 
               </div>
            </div><!-- profile -->
            <div class="dropdown">
               <a  class="nav-link icon siderbar-link" data-toggle="sidebar-right" data-target=".sidebar-right">
                  <i class="fe fe-more-horizontal"></i>
               </a>
            </div><!-- Right-siebar-->
         </div>

      </div>
   </div>
</div>
<!--app-header end-->

<!-- Horizontal-menu -->
<div class="horizontal-main hor-menu clearfix">
   <div class="horizontal-mainwrapper container clearfix">
      <nav class="horizontalMenu clearfix">
         <ul class="horizontalMenu-list metis-menu">

            <li aria-haspopup="true">
               <a href="<?php echo base_url('admin') ?>"> <i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
            </li>

            <li aria-haspopup="true"><a href="#" class="sub-icon"><i class="si si-diamond"></i> Business <i class="fa fa-angle-down horizontal-icon"></i></a>
               <ul class="sub-menu">
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/leads') ?>">Leads</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/Clients') ?>">Clients</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/utilities/calendar') ?>">Calendar</a></li>

               </ul>
            </li>

            <li aria-haspopup="true"><a href="#" class="sub-icon"><i class="typcn typcn-chart-pie-outline"></i> Operations <i class="fa fa-angle-down horizontal-icon"></i></a>
               <ul class="sub-menu">
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/projects') ?>">Projects</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/tasks') ?>">Tasks</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/subscriptions') ?>">Subscriptions</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/contracts') ?>">Contracts</a></li>

               </ul>
            </li>

            
            <li aria-haspopup="true"><a href="#" class="sub-icon"><i class="typcn typcn-contacts"></i> Books & Accounts <i class="fa fa-angle-down horizontal-icon"></i></a>
               <ul class="sub-menu">
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/invoice_items') ?>">Products</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/estimates') ?>">Estimates</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/estimate_request') ?>">Estimate Request</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/proposals') ?>">Proposals</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/invoices') ?>">Invoices</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/payments') ?>">Payments</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/credit_notes') ?>">Credit Notes</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/expenses') ?>">Expenses</a></li>
               </ul>
            </li>

            <li aria-haspopup="true"><a href="#" class="sub-icon"><i class="typcn typcn-messages"></i> IT Tickets <i class="fa fa-angle-down horizontal-icon"></i></a>
               <ul class="sub-menu">
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/tickets/index/1') ?>">Open</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/tickets/index/2') ?>">In Progress</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/tickets/index/3') ?>">Answered</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/tickets/index/4') ?>">On Hold</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/tickets/index/5') ?>">Closed</a></li>
            
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/utilities/pipe_log') ?>">Ticket Piepelog</a></li>

               </ul>
            </li>

            <li aria-haspopup="true"><a href="#" class="sub-icon"><i class="typcn typcn-social-flickr"></i> More <i class="fa fa-angle-down horizontal-icon"></i></a>
               <ul class="sub-menu">
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/knowledge_base') ?>">Knowledge Base</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/utilities/media') ?>">Media Files</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/utilities/bulk_pdf_exporter') ?>">Bulk PDF Export</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/utilities/calendar') ?>">Calendar</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/announcements') ?>">Announcements</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/utilities/activity_log') ?>">Activity Log</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/backup') ?>">DB Backup</a></li>

                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/utilities/activity_log') ?>">Activity Log</a></li>

               </ul>
            </li>

            <li aria-haspopup="true"><a href="#" class="sub-icon"><i class="typcn typcn-chart-pie"></i> Reports <i class="fa fa-angle-down horizontal-icon"></i></a>
               <ul class="sub-menu">
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/reports/sales') ?>">Sales</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/reports/expenses') ?>">Expenses</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/reports/expenses_vs_income') ?>">Expense vs Invome</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/reports/leads') ?>">Leads</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/staff/timesheets?view=all') ?>">Timesheets</a></li>
                  <li aria-haspopup="true"><a href="<?php echo base_url('admin/reports/knowledge_base_articles') ?>">Knowledge Base Articles</a></li>


               </ul>
            </li>

            

            <!-- <li class="dashboard_user<?php if($totalQuickActionsRemoved == count($quickActions)){echo ' dashboard-user-no-qa';}?>">
               <?php echo _l('welcome_top',$current_user->firstname); ?> <i class="fa fa-power-off top-left-logout pull-right" data-toggle="tooltip" data-title="<?php echo _l('nav_logout'); ?>" data-placement="right" onclick="logout(); return false;"></i>
            </li> -->

            <!-- Quick Links -->
            <!-- <?php if($totalQuickActionsRemoved != count($quickActions)){ ?>

               <li aria-haspopup="true"><a href="#" class="sub-icon"><i class="typcn typcn-point-of-interest-outline"></i> New <i class="fa fa-angle-down horizontal-icon"></i></a>
                  <ul class="sub-menu">
                        <?php
                           foreach($quickActions as $key => $item){
                           $url = '';
                           if(isset($item['permission'])){
                              if(!has_permission($item['permission'],'','create')){
                              continue;
                           }
                           }
                           if(isset($item['custom_url'])){
                           $url = $item['url'];
                           } else {
                           $url = admin_url(''.$item['url']);
                           }
                           $href_attributes = '';
                           if(isset($item['href_attributes'])){
                           foreach ($item['href_attributes'] as $key => $val) {
                              $href_attributes .= $key . '=' . '"' . $val . '"';
                           }
                           }
                           ?>
                              <li aria-haspopup="true">
                                 <a href="<?php echo $url; ?>" <?php echo $href_attributes; ?>>
                                 <?php echo $item['name']; ?>
                                 </a>
                              </li>
                        <?php } ?>
                
                  </ul>
               </li>

            <?php } ?> -->

            <!--Foreach Menu Dynamic -->
            <!-- <?php
                  hooks()->do_action('before_render_aside_menu');
            ?>
            <?php foreach($sidebar_menu as $key => $item){
                  if((isset($item['collapse']) && $item['collapse']) && count($item['children']) === 0) {
                  continue;
                  }
                  ?>

               <li class="menu-item-<?php echo $item['slug']; ?>"

                  <?php echo _attributes_to_string(isset($item['li_attributes']) ? $item['li_attributes'] : []); ?>>


                  <a href="<?php echo count($item['children']) > 0 ? '#' : $item['href']; ?>"
                  aria-expanded="false"
                  <?php echo _attributes_to_string(isset($item['href_attributes']) ? $item['href_attributes'] : []); ?>>

                     <i class="<?php echo $item['icon']; ?> menu-icon"></i>

                     <span class="menu-text">

                     <?php echo _l($item['name'],'', false); ?>

                     </span>

                     <?php if(count($item['children']) > 0){ ?>

                     <span class="fa arrow pleft5"></span>

                     <?php } ?>

                     <?php if (isset($item['badge'], $item['badge']['value']) && !empty($item['badge'])) {?>
                        <span class="badge pull-right 
                        <?=isset($item['badge']['type']) &&  $item['badge']['type'] != '' ? "bg-{$item['badge']['type']}" : 'bg-info' ?>"
                        <?=(isset($item['badge']['type']) &&  $item['badge']['type'] == '') ||
                                 isset($item['badge']['color']) ? "style='background-color: {$item['badge']['color']}'" : '' ?>>
                        <?= $item['badge']['value'] ?>
                     </span>
                     <?php } ?>

                     </a>
                  <?php if(count($item['children']) > 0){ ?>
                  <ul class="nav nav-second-level collapse" aria-expanded="false">
                     <?php foreach($item['children'] as $submenu){
                        ?>
                     <li class="sub-menu-item-<?php echo $submenu['slug']; ?>"
                     <?php echo _attributes_to_string(isset($submenu['li_attributes']) ? $submenu['li_attributes'] : []); ?>>
                     <a href="<?php echo $submenu['href']; ?>"
                        <?php echo _attributes_to_string(isset($submenu['href_attributes']) ? $submenu['href_attributes'] : []); ?>>
                        <?php if(!empty($submenu['icon'])){ ?>
                        <i class="<?php echo $submenu['icon']; ?> menu-icon"></i>
                        <?php } ?>
                        <span class="sub-menu-text">
                           <?php echo _l($submenu['name'],'',false); ?>
                        </span>
                        </a>
                     <?php if (isset($submenu['badge'], $submenu['badge']['value']) && !empty($submenu['badge'])) {?>
                        <span class="badge pull-right 
                        <?=isset($submenu['badge']['type']) &&  $submenu['badge']['type'] != '' ? "bg-{$submenu['badge']['type']}" : 'bg-info' ?>"
                        <?=(isset($submenu['badge']['type']) &&  $submenu['badge']['type'] == '') ||
                        isset($submenu['badge']['color']) ? "style='background-color: {$submenu['badge']['color']}'" : '' ?>>
                        <?= $submenu['badge']['value'] ?>
                     </span>
                     <?php } ?>
                     </li>
                     <?php } ?>
                  </ul>
                  <?php } ?>
               </li>

            <?php hooks()->do_action('after_render_single_aside_menu', $item); ?>

            <?php } ?> -->
         
         </ul>
      </nav>
      <!--Nav end -->
   </div>
</div>
<!-- Horizontal-menu end -->

<!--Header submenu -->
<div style="display:none" class="bg-white p-3 header-secondary header-submenu">
   <div class="container ">
      <div class="row">
         <div class="col">
            <div class="d-flex">
               <a class="btn btn-danger" href="#"><i class="fe fe-rotate-cw mr-1 mt-1"></i> Upgrade </a>
            </div>
         </div>
         <div class="col col-auto">
            <a class="btn btn-light mt-4 mt-sm-0" href="#"><i class="fe fe-help-circle mr-1 mt-1"></i>  Support</a>
            <a class="btn btn-success mt-4 mt-sm-0" href="#"><i class="fe fe-plus mr-1 mt-1"></i> Add New</a>
         </div>
      </div>
   </div>
</div><!--End Header submenu -->

<!-- Custom end -->

<!-- OLD -->
<div style="display:none" id="header">

   <div class="hide-menu"><i class="fa fa-align-left"></i></div>
   <div id="logo">
      <?php get_company_logo(get_admin_uri().'/') ?>
   </div>

   <nav>
      <div class="small-logo">
         <span class="text-primary">
            <?php get_company_logo(get_admin_uri().'/') ?>
         </span>
      </div>
      <div class="mobile-menu">
         <button type="button" class="navbar-toggle visible-md visible-sm visible-xs mobile-menu-toggle collapsed" data-toggle="collapse" data-target="#mobile-collapse" aria-expanded="false">
            <i class="fa fa-chevron-down"></i>
         </button>
         <ul class="mobile-icon-menu">
            <?php
               // To prevent not loading the timers twice
            if(is_mobile()){ ?>
               <li class="dropdown notifications-wrapper header-notifications">
                  <?php $this->load->view('admin/includes/notifications'); ?>
               </li>
               <li class="header-timers">
                  <a href="#" id="top-timers" class="dropdown-toggle top-timers" data-toggle="dropdown"><i class="fa fa-clock-o fa-fw fa-lg"></i>
                     <span class="label bg-success icon-total-indicator icon-started-timers<?php if ($totalTimers = count($startedTimers) == 0){ echo ' hide'; }?>"><?php echo count($startedTimers); ?></span>
                  </a>
                  <ul class="dropdown-menu animated fadeIn started-timers-top width300" id="started-timers-top">
                     <?php $this->load->view('admin/tasks/started_timers',array('startedTimers'=>$startedTimers)); ?>
                  </ul>
               </li>
            <?php } ?>
         </ul>
         <div class="mobile-navbar collapse" id="mobile-collapse" aria-expanded="false" style="height: 0px;" role="navigation">
            <ul class="nav navbar-nav">
               <li class="header-my-profile"><a href="<?php echo admin_url('profile'); ?>"><?php echo _l('nav_my_profile'); ?></a></li>
               <li class="header-my-timesheets"><a href="<?php echo admin_url('staff/timesheets'); ?>"><?php echo _l('my_timesheets'); ?></a></li>
               <li class="header-edit-profile"><a href="<?php echo admin_url('staff/edit_profile'); ?>"><?php echo _l('nav_edit_profile'); ?></a></li>
               <?php if(is_staff_member()){ ?>
                  <li class="header-newsfeed">
                   <a href="#" class="open_newsfeed mobile">
                     <?php echo _l('whats_on_your_mind'); ?>
                  </a>
               </li>
            <?php } ?>
            <li class="header-logout"><a href="#" onclick="logout(); return false;"><?php echo _l('nav_logout'); ?></a></li>
         </ul>
      </div>
   </div>
   <ul class="nav navbar-nav navbar-right">
      <?php
      if(!is_mobile()){
       echo $top_search_area;
    } ?>

    <?php hooks()->do_action('after_render_top_search'); ?>

    <li class="icon header-user-profile" data-toggle="tooltip" title="<?php echo get_staff_full_name(); ?>" data-placement="bottom">
      <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="false">
         <?php echo staff_profile_image($current_user->staffid,array('img','img-responsive','staff-profile-image-small','pull-left')); ?>
      </a>
      <ul class="dropdown-menu animated fadeIn">
         <li class="header-my-profile"><a href="<?php echo admin_url('profile'); ?>"><?php echo _l('nav_my_profile'); ?></a></li>
         <li class="header-my-timesheets"><a href="<?php echo admin_url('staff/timesheets'); ?>"><?php echo _l('my_timesheets'); ?></a></li>
         <li class="header-edit-profile"><a href="<?php echo admin_url('staff/edit_profile'); ?>"><?php echo _l('nav_edit_profile'); ?></a></li>
         <?php if(!is_language_disabled()){ ?>
            <li class="dropdown-submenu pull-left header-languages">
               <a href="#" tabindex="-1"><?php echo _l('language'); ?></a>
               <ul class="dropdown-menu dropdown-menu">
                  <li class="<?php if($current_user->default_language == ""){echo 'active';} ?>"><a href="<?php echo admin_url('staff/change_language'); ?>"><?php echo _l('system_default_string'); ?></a></li>
                  <?php foreach($this->app->get_available_languages() as $user_lang) { ?>
                     <li<?php if($current_user->default_language == $user_lang){echo ' class="active"';} ?>>
                     <a href="<?php echo admin_url('staff/change_language/'.$user_lang); ?>"><?php echo ucfirst($user_lang); ?></a>
                  <?php } ?>
               </ul>
            </li>
         <?php } ?>
         <li class="header-logout">
            <a href="#" onclick="logout(); return false;"><?php echo _l('nav_logout'); ?></a>
         </li>
      </ul>
   </li>

   <?php if(is_staff_member()){ ?>
      <li class="icon header-newsfeed">
         <a href="#" class="open_newsfeed desktop" data-toggle="tooltip" title="<?php echo _l('whats_on_your_mind'); ?>" data-placement="bottom"><i class="fa fa-share fa-fw fa-lg" aria-hidden="true"></i></a>
      </li>
   <?php } ?>

   <li class="icon header-todo">
      <a href="<?php echo admin_url('todo'); ?>" data-toggle="tooltip" title="<?php echo _l('nav_todo_items'); ?>" data-placement="bottom"><i class="fa fa-check-square-o fa-fw fa-lg"></i>
         <span class="label bg-warning icon-total-indicator nav-total-todos<?php if($current_user->total_unfinished_todos == 0){echo ' hide';} ?>"><?php echo $current_user->total_unfinished_todos; ?></span>
      </a>
   </li>

   <li class="icon header-timers timer-button" data-placement="bottom" data-toggle="tooltip" data-title="<?php echo _l('my_timesheets'); ?>">
      <a href="#" id="top-timers" class="dropdown-toggle top-timers" data-toggle="dropdown">
         <i class="fa fa-clock-o fa-fw fa-lg" aria-hidden="true"></i>
         <span class="label bg-success icon-total-indicator icon-started-timers<?php if ($totalTimers = count($startedTimers) == 0){ echo ' hide'; }?>">
            <?php echo count($startedTimers); ?>
         </span>
      </a>
      <ul class="dropdown-menu animated fadeIn started-timers-top width350" id="started-timers-top">
         <?php $this->load->view('admin/tasks/started_timers',array('startedTimers'=>$startedTimers)); ?>
      </ul>
   </li>

   <li class="dropdown notifications-wrapper header-notifications" data-toggle="tooltip" title="<?php echo _l('nav_notifications'); ?>" data-placement="bottom">
      <?php $this->load->view('admin/includes/notifications'); ?>
   </li>

</ul>
</nav>
</div>
<div id="mobile-search" class="<?php if(!is_mobile()){echo 'hide';} ?>">
   <ul>
      <?php
      if(is_mobile()){
       echo $top_search_area;
    } ?>
 </ul>
</div>
<!-- OLD END -->

  <!-- app-content-->
  <div class="container content-area">
