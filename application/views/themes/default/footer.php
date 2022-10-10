<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="pusher"></div>
<!-- Right-sidebar-->
<div class="sidebar sidebar-right sidebar-animate">
						<div class="tab-menu-heading siderbar-tabs border-0">
							<div class="tabs-menu ">
								<!-- Tabs -->
								<ul class="nav panel-tabs">
									<li class=""><a href="#tab"  class="active" data-toggle="tab">My Profile</a></li>
									<!-- <li class=""><a href="#tab1" data-toggle="tab">Chat</a></li>
									<li><a href="#tab2" data-toggle="tab">Activity</a></li>
									<li><a href="#tab3" data-toggle="tab">Todo</a></li> -->
								</ul>
							</div>
						</div>
						<div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
							<div class="tab-content border-top">
								<div class="tab-pane active " id="tab">
									<div class="card-body p-0">
										<div class="header-user text-center mt-4 pb-4">
											<span class="avatar avatar-xxl brround">
												<?php 
													if(is_client_logged_in()){
													// echo ;
													echo '<img src="'.contact_profile_image_url($contact->id,'thumb').'" alt="Guest Thumbnail" class="avatar avatar-md brround">
													';
													} else {
													$guest_img = base_url( theme_assets_path().  '/images/users/avatars/1.png');
													echo '<img src="'.$guest_img.'" alt="Guest Thumbnail" class="avatar avatar-md brround">
													';
													}
												?>
											</span>
											<div class="dropdown-item text-center font-weight-semibold user h3 mb-0">
												<?php if(is_client_logged_in()){
													echo get_contact_full_name(get_contact_user_id());
												 }else {
													echo "Guest User";
												 }
												 ?>
											</div>
											<small>
												<?php
												 print_r(get_client(get_contact_user_id())->company);
												?>
											</small>
											
										</div>
										
										
										<?php 
											if(is_client_logged_in()){ ?>

											<a class="dropdown-item border-top" href="<?php echo site_url('clients/profile'); ?>">
												<i class="dropdown-icon  mdi mdi-arrow-right"></i> <?php echo _l('clients_nav_profile'); ?>
											</a>
											
												<?php if($contact->is_primary == 1){ ?>
													<?php if(can_loggged_in_user_manage_contacts()) { ?>
														<a class="dropdown-item border-top" href="<?php echo site_url('contacts'); ?>">
															<i class="dropdown-icon  mdi mdi-arrow-right"></i><?php echo _l('clients_nav_contacts'); ?>
														</a>
														
													<?php } ?>
													<a class="dropdown-item border-top" href="<?php echo site_url('clients/company'); ?>">
															<i class="dropdown-icon  mdi mdi-arrow-right"></i><?php echo _l('client_company_info'); ?>
														</a>
													
												<?php } ?>
												<?php if(can_logged_in_contact_update_credit_card()){ ?>
													<a class="dropdown-item border-top" href="<?php echo site_url('clients/credit_card'); ?>">
														<i class="dropdown-icon  mdi mdi-arrow-right"></i>
														<?php echo _l('credit_card'); ?>
													</a>
													
												<?php } ?>
												<?php if (is_gdpr() && get_option('show_gdpr_in_customers_menu') == '1') { ?>
													<a class="dropdown-item border-top" href="<?php echo site_url('clients/gdpr'); ?>">
														<i class="dropdown-icon  mdi mdi-arrow-right"></i>
														<?php echo _l('gdpr_short'); ?>
													</a>
													
												<?php } ?>
												<a class="dropdown-item border-top" href="<?php echo site_url('clients/announcements'); ?>">
														<i class="dropdown-icon  mdi mdi-arrow-right"></i>
														<?php echo _l('announcements'); ?>
														<?php if($total_undismissed_announcements != 0){ ?>
														<span class="badge"><?php echo $total_undismissed_announcements; ?></span>
														<?php } ?>
												</a>
												
												<?php if(!is_language_disabled()) {
													?>
												
														<a class="dropdown-item border-top">
															<select class="form-control select2 custom-select" name="" id="ChangeLanguageSelect">
																<?php foreach($this->app->get_available_languages() as $user_lang) { ?>
																	<option value="<?php echo $user_lang; ?>" <?php if(get_contact_language() == $user_lang){echo 'selected';} ?>>
																		<?php echo ucfirst($user_lang); ?>
																	</option>
																<?php } ?>
															</select>
																</a>
													
													
												<?php } ?>
												
										<?php	}else {
											if(!is_language_disabled()) {
												?>
											
													<a class="dropdown-item border-top">
														<select class="form-control select2 custom-select" name="" id="ChangeLanguageSelect">
															<?php foreach($this->app->get_available_languages() as $user_lang) { ?>
																<option value="<?php echo $user_lang; ?>" <?php if(get_contact_language() == $user_lang){echo 'selected';} ?>>
																	<?php echo ucfirst($user_lang); ?>
																</option>
															<?php } ?>
														</select>
															</a>
												
												
											<?php } 
											echo "<p>Please login for full Menu options</p>";
										
										}
										?>
									
										<div class="card-body border-top">
											<div class="row">
												
												<div class="col-6 text-center">
												
													<a class="" href="<?php echo site_url('clients/company'); ?>"><i class="dropdown-icon mdi mdi-tune fs-30 m-0 leading-tight"></i></a>
													<div>
													<?php echo _l('client_company_info'); ?>

													</div>
												</div>
												<div class="col-6 text-center">
													<a class="" href="<?php echo site_url('authentication/logout'); ?>"><i class="dropdown-icon mdi mdi-logout-variant fs-30 m-0 leading-tight"></i></a>
													<div>
													<?php echo _l('clients_nav_logout'); ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab1">
									<div class="chat">
										<div class="contacts_card">
											<div class="input-group p-3">
												<input type="text" placeholder="Search..." class="form-control search">
												<div class="input-group-prepend">
													<span class="input-group-text search_btn  "><i class="fa fa-search"></i></span>
												</div>
											</div>
											<ul class="contacts mb-0">
												<li class="active">
													<div class="d-flex bd-highlight">
														<div class="img_cont">
															<img src="<?php echo base_url() ?>assets/themes/default/images/users/male/3.jpg" class="rounded-circle user_img" alt="img">
															<span class="online_icon"></span>
														</div>
														<div class="user_info">
															<h6 class="mt-1 mb-0 ">Maryam Naz</h6>
															<small class="text-muted">Maryam is online</small>
														</div>
														<div class="float-right text-right ml-auto mt-auto mb-auto"><small>01-02-2019</small></div>
													</div>
												</li>
												
											</ul>
										</div>
									</div>
								</div>
								<div class="tab-pane  " id="tab2">
									<div class="list d-flex align-items-center border-bottom p-4">
										<div class="">
											<span class="avatar bg-primary brround avatar-md">CH</span>
										</div>
										<div class="wrapper w-100 ml-3">
											<p class="mb-0 d-flex">
												<b>New Websites is Created</b>
											</p>
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex align-items-center">
													<i class="mdi mdi-clock text-muted mr-1"></i>
													<small class="text-muted ml-auto">30 mins ago</small>
													<p class="mb-0"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="list d-flex align-items-center border-bottom p-4">
										<div class="">
											<span class="avatar bg-danger brround avatar-md">N</span>
										</div>
										<div class="wrapper w-100 ml-3">
											<p class="mb-0 d-flex">
												<b>Prepare For the Next Project</b>
											</p>
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex align-items-center">
													<i class="mdi mdi-clock text-muted mr-1"></i>
													<small class="text-muted ml-auto">2 hours ago</small>
													<p class="mb-0"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="list d-flex align-items-center border-bottom p-4">
										<div class="">
											<span class="avatar bg-info brround avatar-md">S</span>
										</div>
										<div class="wrapper w-100 ml-3">
											<p class="mb-0 d-flex">
												<b>Decide the live Discussion Time</b>
											</p>
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex align-items-center">
													<i class="mdi mdi-clock text-muted mr-1"></i>
													<small class="text-muted ml-auto">3 hours ago</small>
													<p class="mb-0"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="list d-flex align-items-center border-bottom p-4">
										<div class="">
											<span class="avatar bg-warning brround avatar-md">K</span>
										</div>
										<div class="wrapper w-100 ml-3">
											<p class="mb-0 d-flex">
												<b>Team Review meeting at yesterday at 3:00 pm</b>
											</p>
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex align-items-center">
													<i class="mdi mdi-clock text-muted mr-1"></i>
													<small class="text-muted ml-auto">4 hours ago</small>
													<p class="mb-0"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="list d-flex align-items-center border-bottom p-4">
										<div class="">
											<span class="avatar bg-success brround avatar-md">R</span>
										</div>
										<div class="wrapper w-100 ml-3">
											<p class="mb-0 d-flex">
												<b>Prepare for Presentation</b>
											</p>
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex align-items-center">
													<i class="mdi mdi-clock text-muted mr-1"></i>
													<small class="text-muted ml-auto">1 days ago</small>
													<p class="mb-0"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="list d-flex align-items-center  border-bottom p-4">
										<div class="">
											<span class="avatar bg-pink brround avatar-md">MS</span>
										</div>
										<div class="wrapper w-100 ml-3">
											<p class="mb-0 d-flex">
												<b>Prepare for Presentation</b>
											</p>
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex align-items-center">
													<i class="mdi mdi-clock text-muted mr-1"></i>
													<small class="text-muted ml-auto">1 days ago</small>
													<p class="mb-0"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="list d-flex align-items-center border-bottom p-4">
										<div class="">
											<span class="avatar bg-purple brround avatar-md">L</span>
										</div>
										<div class="wrapper w-100 ml-3">
											<p class="mb-0 d-flex">
												<b>Prepare for Presentation</b>
											</p>
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex align-items-center">
													<i class="mdi mdi-clock text-muted mr-1"></i>
													<small class="text-muted ml-auto">45 mintues ago</small>
													<p class="mb-0"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="list d-flex align-items-center p-4">
										<div class="">
											<span class="avatar bg-blue brround avatar-md">U</span>
										</div>
										<div class="wrapper w-100 ml-3">
											<p class="mb-0 d-flex">
												<b>Prepare for Presentation</b>
											</p>
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex align-items-center">
													<i class="mdi mdi-clock text-muted mr-1"></i>
													<small class="text-muted ml-auto">2 days ago</small>
													<p class="mb-0"></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab3">
									<div class="">
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
												<span class="custom-control-label">Do Even More..</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2" checked="">
												<span class="custom-control-label">Find an idea.</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox3" value="option3" checked="">
												<span class="custom-control-label">Hangout with friends</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox4" value="option4" >
												<span class="custom-control-label">Do Something else</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox5" value="option5" >
												<span class="custom-control-label">Eat healthy, Eat Fresh..</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox6" value="option6" checked="">
												<span class="custom-control-label">Finsh something more..</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox7" value="option7" checked="">
												<span class="custom-control-label">Do something more</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox8" value="option8" >
												<span class="custom-control-label">Updated more files</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox9" value="option9" >
												<span class="custom-control-label">System updated</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										<div class="d-flex p-3 border-top border-bottom">
											<label class="custom-control custom-checkbox mb-0">
												<input type="checkbox" class="custom-control-input" name="example-checkbox10" value="option10" >
												<span class="custom-control-label">Settings Changings...</span>
											</label>
											<span class="ml-auto">
												<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
												<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
											</span>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div><!-- End Rightsidebar-->

					<!--footer-->
					<footer class="footer">
						<div class="container">
							<div class="row align-items-center flex-row-reverse">
								<div class="col-lg-12 col-sm-12   text-center">
								<span class="copyright-footer"><?php echo date('Y'); ?> <?php echo _l('clients_copyright', get_option('companyname')); ?></span>
				<?php if(is_gdpr() && get_option('gdpr_show_terms_and_conditions_in_footer') == '1') { ?>
					- <a href="<?php echo terms_url(); ?>" class="terms-and-conditions-footer"><?php echo _l('terms_and_conditions'); ?></a>
				<?php } ?>
				<?php if(is_gdpr() && is_client_logged_in() && get_option('show_gdpr_link_in_footer') == '1') { ?>
					- <a href="<?php echo site_url('clients/gdpr'); ?>" class="gdpr-footer"><?php echo _l('gdpr_short'); ?></a>
				<?php } ?>								</div>
							</div>
						</div>
					</footer>
					<!-- End Footer-->

							<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>



</div>
</div>


