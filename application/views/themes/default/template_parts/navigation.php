<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="app-header header hor-topheader d-flex">
   <div class="container">
      <div class="d-flex">
         
            <?php get_company_logo('','navbar-brand logo'); ?>
               <!-- <img src="../assets/images/brand/logo.png" class="header-brand-img main-logo" alt="Hogo logo"> -->
               <!-- <img src="../assets/images/brand/icon.png" class="header-brand-img icon-logo" alt="Hogo logo"> -->
         <a id="horizontal-navtoggle" class="animated-arrow hor-toggle"><span></span></a>

         <!-- <a href="#" data-toggle="search" class="nav-link nav-link  navsearch"><i class="fa fa-search"></i></a>search icon -->
         
         <div id="NavSearchComp" class="header-form pt-3">
            <?php echo form_open(site_url('knowledge-base/search'),array('method'=>'GET','id'=>'kb-search-form')); ?>
               <div class="search-element mr-3">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                  <span class="Search-icon" style="top: 10px"><i class="fa fa-search"></i></span>
               </div>
               <?php echo form_close(); ?>
         </div>
         
      
         <div class="d-flex order-lg-2 ml-auto header-rightmenu">
            <div class="dropdown">
               <a class="nav-link icon full-screen-link" id="fullscreen-button">
                  <i class="fe fe-maximize-2"></i>
               </a>
            </div><!-- full-screen -->
            <div class="dropdown header-notify">
               <a class="nav-link icon" data-toggle="dropdown" aria-expanded="false">
                  <i class="fe fe-bell "></i>
                  <span class="pulse bg-success"></span>
               </a>
               <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
                  <a href="#" class="dropdown-item text-center">4 New Notifications</a>
                  <div class="dropdown-divider"></div>
                 
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item text-center">View all Notifications</a>
               </div>
            </div><!-- notifications -->
            <div class="dropdown header-user">
               <a class="nav-link leading-none siderbar-link" data-toggle="sidebar-right" data-target=".sidebar-right">
                  <span class="mr-3 d-none d-lg-block ">
                     <span class="text-gray-white"><span class="ml-2">
                        <?php 
                           if(is_client_logged_in()){
                              echo get_contact_full_name(get_contact_user_id());
                           } else {
                              echo _l('clients_nav_profile');
                           }
                        ?> 
                     </span></span>
                  </span>
                  <span class="avatar avatar-md brround">
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
               </a>
               <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <div class="header-user text-center mt-4 pb-4">
                     <span class="avatar avatar-xxl brround"><img src="../assets/images/users/female/33.png" alt="Profile-img" class="avatar avatar-xxl brround"></span>
                     <a href="#" class="dropdown-item text-center font-weight-semibold user h3 mb-0">Alison</a>
                     <small>Web Designer</small>
                  </div>

                  <a class="dropdown-item" href="#">
                     <i class="dropdown-icon mdi mdi-account-outline "></i> Spruko technologies
                  </a>
                  <a class="dropdown-item" href="#">
                     <i class="dropdown-icon  mdi mdi-account-plus"></i> Add another Account
                  </a>
                  <div class="card-body border-top">
                     <div class="row">
                        <div class="col-6 text-center">
                           <a class="" href=""><i class="dropdown-icon mdi  mdi-message-outline fs-30 m-0 leading-tight"></i></a>
                           <div>Inbox</div>
                        </div>
                        <div class="col-6 text-center">
                           <a class="" href=""><i class="dropdown-icon mdi mdi-logout-variant fs-30 m-0 leading-tight"></i></a>
                           <div>Sign out</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div><!-- profile -->
            <div class="dropdown">
               <a class="nav-link icon siderbar-link" data-toggle="sidebar-right" data-target=".sidebar-right">
                  <i class="fe fe-more-horizontal"></i>
               </a>
            </div><!-- Right-siebar-->
         </div>
      </div>
   </div>
</div>

				<!-- Horizontal-menu -->
				<div class="horizontal-main hor-menu clearfix">
					<div class="horizontal-mainwrapper container clearfix">
						<nav class="horizontalMenu clearfix">
							<ul class="horizontalMenu-list">
                        <li aria-haspopup>
                           <a href="<?php echo base_url() ?>">
                              <i class="mdi mdi-apps"></i>
                              Dashboard</a>
                        </li>
                     <?php hooks()->do_action('customers_navigation_start'); ?>
                     <?php foreach($menu as $item_id => $item) { ?>
                        <li class="customers-nav-item-<?php echo $item_id; ?>"
                        aria-haspopup="true"
                           <?php echo _attributes_to_string(isset($item['li_attributes']) ? $item['li_attributes'] : []); ?>>
                           <a href="<?php echo $item['href']; ?>"
                              <?php echo _attributes_to_string(isset($item['href_attributes']) ? $item['href_attributes'] : []); ?>>
                              <?php
                              if(!empty($item['icon'])){
                                 echo '<i class="'.$item['icon'].'"></i> ';
                              }
                              echo $item['name'];
                              ?>
                           </a>
                        </li>
                     <?php } ?>
                     <?php hooks()->do_action('customers_navigation_end'); ?>
                    
                     <?php hooks()->do_action('customers_navigation_after_profile'); ?>

								<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="typcn typcn-point-of-interest-outline"></i> More <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="https://www.shariqq.com">Homepage</a></li>
										<li aria-haspopup="true"><a href="https://www.shariqq.com/about-md-shariqq">About Shariqq.com</a></li>
										<li aria-haspopup="true"><a href="https://www.shariqq.com/contact">Contact</a></li>
										<li aria-haspopup="true"><a href="https://www.shariqq.com/policies">Policies</a></li>
										<li aria-haspopup="true"><a href="https://www.shariqq.com/disclaimer">Disclaimer</a></li>
										<li aria-haspopup="true"><a href="https://www.shariqq.com/products">Products</a></li>
										<li aria-haspopup="true"><a href="https://www.shariqq.com/services">Services</a></li>
										<li aria-haspopup="true"><a href="https://www.shariqq.com/md-shariqq/portfolio">Portfolio</a></li>
										<li aria-haspopup="true"><a href="https://www.shariqq.com/reviews">Reviews</a></li>
									</ul>
								</li>
							</ul>
						</nav>
						<!--Nav end -->
					</div>
				</div>
				<!-- Horizontal-menu end -->