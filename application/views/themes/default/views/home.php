<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="col-md-12 mt-3">
	<h3 id="greeting"></h3>
</div>
	<div class="col-md-8 section-client-dashboard">
		<h3 id="greeting" class="no-mtop"></h3>

		<?php if(has_contact_permission('projects')) { ?>
			<div class="card">
				<div class="card-header">
				<h4><?php echo _l('projects_summary'); ?></h4>
				</div>
				<div class="card-body">
					<div class="row">
						<?php get_template_part('projects/project_summary'); ?>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php hooks()->do_action('client_area_after_project_overview'); ?>
	</div>

	<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h4 class="float-left float-start"><?php echo _l('clients_quick_invoice_info'); ?></h4>
			<p class="ml-auto mb-0">
				<?php if(has_contact_permission('invoices')){ ?>
						<a class="btn btn-indigo" href="<?php echo site_url('clients/statement'); ?>"><?php echo _l('view_account_statement'); ?></a>
				<?php } ?>
			</p>
		</div>
			<?php
			if(has_contact_permission('invoices')){ ?>
				<div class="card-body">
					
					<?php get_template_part('invoices_stats'); ?>
					<hr />
					<div class="row">
						<div class="col-md-3">
							<?php if(count($payments_years) > 0){ ?>
								<div class="form-group">
									<select data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>" class="form-control" id="payments_year" name="payments_years" data-width="100%" onchange="total_income_bar_report();" data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>">
										<?php foreach($payments_years as $year) { ?>
											<option value="<?php echo $year['year']; ?>"<?php if($year['year'] == date('Y')){echo 'selected';} ?>>
												<?php echo $year['year']; ?>
											</option>
										<?php } ?>
									</select>
								</div>
							<?php } ?>
							<?php if(is_client_using_multiple_currencies()){ ?>
								<div id="currency" class="form-group mtop15" data-toggle="tooltip" title="<?php echo _l('clients_home_currency_select_tooltip'); ?>">
									<select data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>" class="form-control" name="currency">
										<?php foreach($currencies as $currency){
											$selected = '';
											if($currency['isdefault'] == 1){
												$selected = 'selected';
											}
											?>
											<option value="<?php echo $currency['id']; ?>" <?php echo $selected; ?>><?php echo $currency['symbol']; ?> - <?php echo $currency['name']; ?></option>
										<?php } ?>
									</select>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="relative" style="max-height:400px;">
								<canvas id="client-home-chart" height="400" class="animated fadeIn"></canvas>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		
	</div>

	<script>
		var greetDate = new Date();
		var hrsGreet = greetDate.getHours();

		var greet;
		if (hrsGreet < 12)
			greet = "<?php echo _l('good_morning'); ?>";
		else if (hrsGreet >= 12 && hrsGreet <= 17)
			greet = "<?php echo _l('good_afternoon'); ?>";
		else if (hrsGreet >= 17 && hrsGreet <= 24)
			greet = "<?php echo _l('good_evening'); ?>";

		if(greet) {
			document.getElementById('greeting').innerHTML =
			'<b>' + greet + ' <?php echo $contact->firstname; ?>!</b>';
		}
	</script>
