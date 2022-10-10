<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- Right-sidebar-->
<div class="sidebar sidebar-right sidebar-animate">
						<div class="tab-menu-heading siderbar-tabs border-0">
							<div class="tabs-menu ">
								<!-- Tabs -->
								<ul class="nav panel-tabs">
									<li class=""><a href="#tab"  class="active" data-toggle="tab">My Profile</a></li>
									<li class=""><a href="#tab1" data-toggle="tab">Timer
                                    <span class="tag bg-success <?php if ($totalTimers = count($startedTimers) == 0){ echo ' hide'; }?>">
                                        <?php echo count($startedTimers); ?>
                                    </span>
                                    </a></li>
									<li><a href="#tab2" data-toggle="tab">Activity</a></li>
								</ul>
							</div>
						</div>
						<div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
							<div class="tab-content border-top">
                                <!-- profile -->
								<div class="tab-pane active " id="tab">
									<div class="card-body p-0">
										<div class="header-user text-center mt-4 pb-4">
											<span class="avatar avatar-xxl brround">
                                                <?php echo staff_profile_image($current_user->staffid,array('avatar', 'avatar-xxl', 'brround', 'img','pull-left')); ?>

                                                <!-- <img src="<?php echo base_url(); ?>assets/themes/default/images/users/female/33.png" alt="Profile-img" class="avatar avatar-xxl brround"> -->
                                            </span>
											<div class="dropdown-item text-center font-weight-semibold user h3 mb-0">
                                                <?php echo $current_user->firstname . ' ' . $current_user->lastname; ?>
                                            </div>
											<small> <?php echo $current_user->email; ?></small>
											<div class="card-body">
                                                <a href="<?php echo base_url('admin/todo') ?>" class="btn btn-indigo"> <i class="mdi mdi-check"></i> Todo List</a>
											</div>
										</div>
                                        <a href="#" class="open_newsfeed desktop dropdown-item  border-top" data-toggle="tooltip" title="<?php echo _l('whats_on_your_mind'); ?>" data-placement="bottom">
                                            <i class="fa fa-share fa-fw fa-lg" aria-hidden="true"></i>
                                            What's on your Mind
                                        </a>

										<a class="dropdown-item  border-top" href="<?php echo admin_url('profile'); ?>">
											<i class="dropdown-icon mdi mdi-account-outline "></i> My Account
										</a>
										<a class="dropdown-item border-top" href="<?php echo admin_url('staff/timesheets'); ?>">
											<i class="dropdown-icon  mdi mdi-account-plus"></i> My Timesheets
										</a>
                                        <a class="dropdown-item border-top" href="<?php echo admin_url('staff/edit_profile'); ?>">
											<i class="dropdown-icon  mdi mdi-pen"></i> Edit Profile
										</a>
										<div class="card-body border-top">
											<div class="row">
												<div class="col-4 text-center">
													<a class="" href=""><i class="dropdown-icon mdi  mdi-message-outline fs-30 m-0 leading-tight"></i></a>
													<div>Inbox</div>
												</div>
												<div class="col-4 text-center">
													<a class="" href="<?php echo base_url('admin//settings') ?>"><i class="dropdown-icon mdi mdi-tune fs-30 m-0 leading-tight"></i></a>
													<div>Settings</div>
												</div>
												<div class="col-4 text-center">
													<a class="" onclick="logout(); return false;"><i class="dropdown-icon mdi mdi-logout-variant fs-30 m-0 leading-tight"></i></a>
													<div>Sign out</div>
												</div>
											</div>
										</div>
									</div>
								</div>
                                <!-- timer -->
								<div class="tab-pane" id="tab1">
									<div class="chat">
                                        <div class="card">
                                            <div class="card-body">
                                                <?php $this->load->view('admin/tasks/started_timers',array('startedTimers'=>$startedTimers)); ?>

                                            </div>
                                        </div>
									</div>
								</div>
								<div class="tab-pane  " id="tab2">
                                    <!-- <?php $this->load->view('admin/includes/notifications'); ?> -->
								</div>
								
							</div>
						</div>
					</div><!-- End Rightsidebar-->

					<!--footer-->
					<footer class="footer">
						<div class="container">
							<div class="row align-items-center flex-row-reverse">
								<div class="col-lg-12 col-sm-12   text-center">
									<a href="#">SHRIQQ.COM</a> ~ Crafted by <a href="https://www.shariqq.com/">Md Shariqq</a>
								</div>
							</div>
						</div>
					</footer>
					<!-- End Footer-->

				</div>
				<!-- End app-content-->
			</div>
		</div>
		<!-- End Page -->
        
		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<!-- Jquery js-->
<!-- <script src="<?php echo base_url(); ?>assets/themes/default/js/vendors/jquery-3.2.1.min.js"></script> -->

<!--Bootstrap.min js-->
<script src="<?php echo base_url(); ?>assets/themes/default/plugins/bootstrap/popper.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/themes/default/plugins/bootstrap/js/bootstrap.min.js"></script> -->

<!--Jquery Sparkline js-->
<!-- <script src="<?php echo base_url(); ?>assets/themes/default/js/vendors/jquery.sparkline.min.js"></script> -->

<!-- Chart Circle js-->
<!-- <script src="<?php echo base_url(); ?>assets/themes/default/js/vendors/circle-progress.min.js"></script> -->

<!-- Star Rating js-->
<!-- <script src="<?php echo base_url(); ?>assets/themes/default/plugins/rating/jquery.rating-stars.js"></script> -->

<!--Moment js-->
<!-- <script src="<?php echo base_url(); ?>assets/themes/default/plugins/moment/moment.min.js"></script> -->

<!-- Daterangepicker js-->
<!-- <script src="<?php echo base_url(); ?>assets/themes/default/plugins/bootstrap-daterangepicker/daterangepicker.js"></script> -->

<!-- Horizontal-menu js -->
<script src="<?php echo base_url(); ?>assets/themes/default/plugins/horizontal-menu/horizontalmenu.js"></script>

<!-- Sidebar Accordions js -->
<script src="<?php echo base_url(); ?>assets/themes/default/plugins/accordion1/js/easyResponsiveTabs.js"></script>

<!-- Custom scroll bar js-->
<script src="<?php echo base_url(); ?>assets/themes/default/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

<!--Owl Carousel js -->
<!-- <script src="<?php echo base_url(); ?>assets/themes/default/plugins/owl-carousel/owl.carousel.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/themes/default/plugins/owl-carousel/owl-main.js"></script> -->

<!-- Rightsidebar js -->
<script src="<?php echo base_url(); ?>assets/themes/default/plugins/sidebar/sidebar.js"></script>

<!-- Charts js-->
<!-- <script src="<?php echo base_url(); ?>assets/themes/default/plugins/chart/chart.bundle.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/themes/default/plugins/chart/utils.js"></script> -->

<!--Time Counter js-->
<!-- <script src="<?php echo base_url(); ?>assets/themes/default/plugins/counters/jquery.missofis-countdown.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/themes/default/plugins/counters/counter.js"></script> -->

<!--Morris  Charts js-->
<!-- <script src="<?php echo base_url(); ?>assets/themes/default/plugins/morris/raphael-min.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/themes/default/plugins/morris/morris.js"></script> -->

<!-- Custom-charts js-->
<!-- <script src="<?php echo base_url(); ?>assets/themes/default/js/index1.js"></script> -->

<!-- Custom js-->
<script src="<?php echo base_url(); ?>assets/themes/default/js/custom2.js"></script>