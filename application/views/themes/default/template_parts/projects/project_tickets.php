<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<a href="<?php echo site_url('clients/open_ticket?project_id='.$project->id); ?>" class="btn btn-indigo mbot15">
	<?php echo _l('clients_ticket_open_subject'); ?>
	<i class="mdi mdi-ticket"></i>
</a>
<?php get_template_part('tickets_table'); ?>
