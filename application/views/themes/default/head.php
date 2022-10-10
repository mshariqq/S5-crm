<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="<?php echo $locale; ?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php if (isset($title)){ echo $title; } ?></title>

		<?php echo compile_theme_css(); ?>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/themes/default/plugins/bootstrap/css/bootstrap.min.css">

		<!-- Dashboard css -->
		<link href="<?php echo base_url() ?>assets/themes/default/css/style.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="<?php echo base_url() ?>assets/themes/default/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!-- Horizontal-menu css -->
		<link href="<?php echo base_url() ?>assets/themes/default/plugins/horizontal-menu/dropdown-effects/fade-down.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>assets/themes/default/plugins/horizontal-menu/horizontalmenu.css" rel="stylesheet">

		<!--Daterangepicker css-->
		<link href="<?php echo base_url() ?>assets/themes/default/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

		<!-- Rightsidebar css -->
		<link href="<?php echo base_url() ?>assets/themes/default/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!-- Sidebar Accordions css -->
		<link href="<?php echo base_url() ?>assets/themes/default/plugins/accordion1/css/easy-responsive-tabs.css" rel="stylesheet">

		<!-- Owl Theme css-->
		<link href="<?php echo base_url() ?>assets/themes/default/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

		<!-- Morris  Charts css-->
		<link href="<?php echo base_url() ?>assets/themes/default/plugins/morris/morris.css" rel="stylesheet" />

		<!--Select2 css -->
		<link href="<?php echo base_url() ?>assets/themes/default/plugins/select2/select2.min.css" rel="stylesheet" />
		
		<!---Font icons css-->
		<link href="<?php echo base_url() ?>assets/themes/default/plugins/iconfonts/plugin.css" rel="stylesheet" />
		<link href="<?php echo base_url() ?>assets/themes/default/plugins/iconfonts/icons.css" rel="stylesheet" />
		<link href="<?php echo base_url() ?>assets/themes/default/fonts/fonts/font-awesome.min.css" rel="stylesheet">

		<link rel="stylesheet" href="<?php echo base_url() ?>assets/themes/default/plugins/multipleselect/multiple-select.css">
	
		<link href="<?php echo base_url() ?>assets/themes/default/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
		<link href="<?php echo base_url() ?>assets/themes/default/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />
		
		<link href="<?php echo base_url() ?>assets/themes/default/plugins/tabs/style.css" rel="stylesheet" />

		<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
	
		<?php app_customers_head(); ?>

</head>
<body class="app sidebar-mini rtl <?php echo strtolower($this->agent->browser()); ?><?php if(is_mobile()){echo ' mobile';}?><?php if(isset($bodyclass)){echo ' ' . $bodyclass; } ?>" <?php if($isRTL == 'true'){ echo 'dir="rtl"';} ?>>
	<?php hooks()->do_action('customers_after_body_start'); ?>

		<!--Global-Loader-->
		<div id="global-loader">
			<img src="<?php echo base_url(theme_assets_path()) ?>/images/icons/loader.svg" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">