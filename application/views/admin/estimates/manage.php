<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
	<div class="side-app content">
		<div class="row">
			<?php $this->load->view('admin/estimates/list_template'); ?>
		</div>
	</div>
</div>
<?php $this->load->view('admin/includes/modals/sales_attach_file'); ?>
<script>var hidden_columns = [2,5,6,8,9];</script>
<?php init_tail(); ?>
<script>
	$(function(){
		init_estimate();
	});
</script>
<?php $this->load->view('admin/includes/custom_footer') ?>

</body>
</html>
