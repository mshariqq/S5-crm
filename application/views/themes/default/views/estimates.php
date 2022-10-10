<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="page-header">
    <ol class="breadcrumb"><!-- breadcrumb -->
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-home"></i>  Home</a></li>
        <li class="breadcrumb-item active"><a href="#">Estimates</a></li>
       
    </ol><!-- End breadcrumb -->
    <div class="ml-auto pull-right">
  
    </div>
</div>

<div class="card">
    <div class="card-body">
        <?php get_template_part('estimates_stats'); ?>
        <hr />
        <?php get_template_part('estimates_table'); ?>
    </div>
</div>
