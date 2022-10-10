<?php defined('BASEPATH') or exit('No direct script access allowed');

$where = array('clientid'=>get_client_user_id());


	foreach($project_statuses as $status){ ?>

		<div class="col-md-2 col-6 list-status projects-status <?php if(im_mobile()){ echo 'mb-3 border-bottom pb-'; } ?>  ">
	
			<a href="<?php echo site_url('clients/projects/'.$status['id']); ?>" class="<?php if(isset($list_statuses) && in_array($status['id'], $list_statuses)){echo 'active';} ?>">
				<?php $where['status'] = $status['id']; ?>
	
				<h3 class="bold"><?php echo total_rows(db_prefix().'projects',$where); ?></h3>
	
				<span style="color:<?php echo $status['color']; ?>">
	
					<?php echo $status['name']; ?>
				</a>
		</div>
<?php } ?>
	
