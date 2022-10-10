<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<style>
  #contracts-by-type-chart{
    padding-top: 0px;
  }
</style>
<div class="page-header">
    <ol class="breadcrumb"><!-- breadcrumb -->
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-home"></i>  Home</a></li>
        <li class="breadcrumb-item active"><a href="#">Contracts</a></li>
       
    </ol><!-- End breadcrumb -->
    <div class="ml-auto pull-right">
  
    </div>
</div>


<div class="card">
  <div class="card-header">
    <h3 class="text-dark font-weight-bold mb-0"><?php echo _l('contract_summary_by_type'); ?></h3>

  </div>
  <div class="card-body">
    <div class="col-md-12">
      <div class="relative" style="max-height:300px;">
        <canvas class="chart" height="300" id="contracts-by-type-chart"></canvas>
      </div>
    </div>
    <div class="clearfix"></div>
    <?php get_template_part('contracts_table'); ?>
 </div>
</div>
<script>
  var contracts_by_type = '<?php echo $contracts_by_type_chart; ?>';
</script>
