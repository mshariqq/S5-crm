<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="<?php echo $locale; ?>">
<head>
    <?php $isRTL = (is_rtl() ? 'true' : 'false'); ?>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1" />

    <title><?php echo isset($title) ? $title : get_option('companyname'); ?></title>

    <?php echo app_compile_css(); ?>

    <?php render_admin_js_variables(); ?>

    <!-- Custom Theme CSS LINKS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/themes/default/css/admin.css') ?>">
    <link href="<?php echo base_url(); ?>assets/themes/default/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />
    <!-- Horizontal-menu css -->
    <link href="<?php echo base_url(); ?>assets/themes/default/plugins/horizontal-menu/dropdown-effects/fade-down.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/themes/default/plugins/horizontal-menu/horizontalmenu.css" rel="stylesheet">
    <!-- Rightsidebar css -->
    <link href="<?php echo base_url(); ?>assets/themes/default/plugins/sidebar/sidebar.css" rel="stylesheet">

    <!-- Sidebar Accordions css -->
    <link href="<?php echo base_url(); ?>assets/themes/default/plugins/accordion1/css/easy-responsive-tabs.css" rel="stylesheet">
    <!-- Owl Theme css-->
    <link href="<?php echo base_url(); ?>assets/themes/default/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

    <!-- Morris  Charts css-->
    <link href="<?php echo base_url(); ?>assets/themes/default/plugins/morris/morris.css" rel="stylesheet" />

    <!---Font icons css-->
    <link href="<?php echo base_url(); ?>assets/themes/default/plugins/iconfonts/plugin.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/themes/default/plugins/iconfonts/icons.css" rel="stylesheet" />
    <link  href="<?php echo base_url(); ?>assets/themes/default/fonts/fonts/font-awesome.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/themes/default/plugins/tabs/style.css" rel="stylesheet" />

    <!-- // Custom Theme CSS LINKS END -->
    <script>
        var totalUnreadNotifications = <?php echo $current_user->total_unread_notifications; ?>,
        proposalsTemplates = <?php echo json_encode(get_proposal_templates()); ?>,
        contractsTemplates = <?php echo json_encode(get_contract_templates()); ?>,
        billingAndShippingFields = ['billing_street','billing_city','billing_state','billing_zip','billing_country','shipping_street','shipping_city','shipping_state','shipping_zip','shipping_country'],
        isRTL = '<?php echo $isRTL; ?>',
        taskid,taskTrackingStatsData,taskAttachmentDropzone,taskCommentAttachmentDropzone,newsFeedDropzone,expensePreviewDropzone,taskTrackingChart,cfh_popover_templates = {},_table_api;
    </script>

    <?php app_admin_head(); ?>

</head>

<?php

$bodyclass .= ' app sidebar-mini ';
?>
<body <?php echo admin_body_class(isset($bodyclass) ? $bodyclass : ' app sidebar-mini '); ?><?php if($isRTL === 'true'){ echo 'dir="rtl"';}; ?>>
<?php hooks()->do_action('after_body_start'); ?>

<div class="page">
    <div class="page-main">

