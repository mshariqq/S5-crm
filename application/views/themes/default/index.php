<?php defined('BASEPATH') or exit('No direct script access allowed');
echo theme_head_view();
get_template_part($navigationEnabled ? 'navigation' : '');
?>

<div class="bg-white p-3 header-secondary header-submenu">
   <div class="container ">
      <div class="row">
         <div class="col">
            <div class="d-flex">
               <a class="btn btn-success" href="https://wa.me/<?php echo get_option('invoice_company_phonenumber') ?>"><i class="fa fa-whatsapp mr-1 mt-1"></i>Open Whatsapp </a>
            </div>
         </div>
         <div class="col col-auto">
            <a class="btn btn-dark mt-4 mt-sm-0" href="<?php echo site_url('clients/files'); ?>"><i class="fa fa-file" aria-hidden="true"></i> <?php echo _l('customer_profile_files'); ?></a>
            <a class="btn btn-indigo mt-4 mt-sm-0" href="<?php echo site_url('clients/calendar'); ?>"><i class="fa fa-calendar-minus-o" aria-hidden="true"></i> <?php echo _l('calendar'); ?>
            </a>
            <!-- <a class="btn btn-light mt-4 mt-sm-0" href="#"><i class="fe fe-help-circle mr-1 mt-1"></i>  Support</a> -->
            <!-- <a class="btn btn-success mt-4 mt-sm-0" href="#"><i class="fe fe-plus mr-1 mt-1"></i> Add New</a> -->
         </div>
      </div>
   </div>
</div>

<div id="wrapper" class="container content-area">
   <div id="content" class="side-app">

         <div class="row">
            <?php get_template_part('alerts'); ?>
         </div>

      <?php if(isset($knowledge_base_search)){ ?>
         <?php get_template_part('knowledge_base/search'); ?>
      <?php } ?>

         <?php hooks()->do_action('customers_content_container_start'); ?>
         <div class="row">
            
            <?php
            /**
             * Don't show calendar for invoices, estimates, proposals etc.. views where no navigation is included or in kb area
             */
            if(is_client_logged_in() && $subMenuEnabled && !isset($knowledge_base_search)){ ?>
            
               <!-- <ul class="submenu customer-top-submenu">
                  <?php hooks()->do_action('before_customers_area_sub_menu_start'); ?>
                  <li class="customers-top-submenu-files">
                     <a href="<?php echo site_url('clients/files'); ?>"><i class="fa fa-file" aria-hidden="true"></i> <?php echo _l('customer_profile_files'); ?></a>
                  </li>
                  <li class="customers-top-submenu-calendar">
                     <a href="<?php echo site_url('clients/calendar'); ?>"><i class="fa fa-calendar-minus-o" aria-hidden="true"></i> <?php echo _l('calendar'); ?>
                  </a>
               </li>
                  <?php hooks()->do_action('after_customers_area_sub_menu_end'); ?>
               </ul>
               <div class="clearfix"></div> -->
            <?php } ?>
            <?php echo theme_template_view(); ?>
         </div>
   </div>
   <?php
   echo theme_footer_view();
   ?>
</div>
   
<!-- Jquery js-->
<script src="<?php echo base_url() ?>assets/themes/default/js/vendors/jquery-3.2.1.min.js"></script>

<!--Bootstrap.min js-->
<script src="<?php echo base_url() ?>assets/themes/default/plugins/bootstrap/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/themes/default/plugins/bootstrap/js/bootstrap.min.js"></script>

<!--Jquery Sparkline js-->
<script src="<?php echo base_url() ?>assets/themes/default/js/vendors/jquery.sparkline.min.js"></script>

<!-- Chart Circle js-->
<script src="<?php echo base_url() ?>assets/themes/default/js/vendors/circle-progress.min.js"></script>

<!-- Star Rating js-->
<script src="<?php echo base_url() ?>assets/themes/default/plugins/rating/jquery.rating-stars.js"></script>

<!--Moment js-->
<script src="<?php echo base_url() ?>assets/themes/default/plugins/moment/moment.min.js"></script>

<!-- Daterangepicker js-->
<script src="<?php echo base_url() ?>assets/themes/default/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Horizontal-menu js -->
<script src="<?php echo base_url() ?>assets/themes/default/plugins/horizontal-menu/horizontalmenu.js"></script>

<!-- Sidebar Accordions js -->
<script src="<?php echo base_url() ?>assets/themes/default/plugins/accordion1/js/easyResponsiveTabs.js"></script>

<!-- Custom scroll bar js-->
<script src="<?php echo base_url() ?>assets/themes/default/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

<!--Owl Carousel js -->
<script src="<?php echo base_url() ?>assets/themes/default/plugins/owl-carousel/owl.carousel.js"></script>
<script src="<?php echo base_url() ?>assets/themes/default/plugins/owl-carousel/owl-main.js"></script>

<!-- Rightsidebar js -->
<script src="<?php echo base_url() ?>assets/themes/default/plugins/sidebar/sidebar.js"></script>

<!-- Charts js-->
<script src="<?php echo base_url() ?>assets/themes/default/plugins/chart/chart.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/themes/default/plugins/chart/utils.js"></script>

<!--Time Counter js-->
<script src="<?php echo base_url() ?>assets/themes/default/plugins/counters/jquery.missofis-countdown.js"></script>
<script src="<?php echo base_url() ?>assets/themes/default/plugins/counters/counter.js"></script>


<!--Morris  Charts js-->
<script src="<?php echo base_url() ?>assets/themes/default/plugins/morris/raphael-min.js"></script>
<script src="<?php echo base_url() ?>assets/themes/default/plugins/morris/morris.js"></script>

<!--Select2 js -->
<script src="<?php echo base_url() ?>assets/themes/default/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo base_url() ?>assets/themes/default/js/select2.js"></script>

<script src="<?php echo base_url() ?>assets/themes/default/plugins/multipleselect/multiple-select.js"></script>
<script src="<?php echo base_url() ?>assets/themes/default/plugins/multipleselect/multi-select.js"></script>


<!---Tabs js-->
<script src="<?php echo base_url() ?>assets/themes/default/plugins/tabs/jquery.multipurpose_tabcontent.js"></script>
<script src="<?php echo base_url() ?>assets/themes/default/plugins/tabs/tabs.js"></script>


<?php
/* Always have app_customers_footer() just before the closing </body>  */
app_customers_footer();
/**
   * Check for any alerts stored in session
   */
  app_js_alerts();

?>

<!-- Custom-charts js-->
<script src="<?php echo base_url() ?>assets/themes/default/js/index1.js"></script>
<script src="<?php echo base_url() ?>assets/themes/default/js/custom2.js"></script>


</body>
</html>
