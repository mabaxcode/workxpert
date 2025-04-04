<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
						<!--begin::Wrapper-->
						<div class="app-sidebar-wrapper">
							<div id="kt_app_sidebar_wrapper" class="hover-scroll-y my-5 my-lg-2 mx-4" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header" data-kt-scroll-wrappers="#kt_app_sidebar_wrapper" data-kt-scroll-offset="5px">
								<!--begin::Sidebar menu-->
								<div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false" class="app-sidebar-menu-primary menu menu-column menu-rounded menu-sub-indention menu-state-bullet-primary px-3 mb-5">
								
									<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
										<a class="menu-link" href="<?=base_url('admin')?>">
											<span class="menu-icon">
												<i class="ki-outline ki-home-2 fs-2"></i>
											</span>
											<span class="menu-title">Dashboard</span>
										</a>
										</a>
									</div>

									<div data-kt-menu-trigger="click" class="menu-item menu-accordion show">
										<!--begin:Menu link-->
										<span class="menu-link">
											<!-- <span class="menu-icon">
												<i class="ki-outline ki-briefcase fs-2"></i>
											</span> -->
											<span class="menu-icon">
											<i class="ki-duotone ki-bank fs-2">
											 <span class="path1"></span>
											 <span class="path2"></span>
											</i>
										</span>
											<span class="menu-title">Company Information</span>
											<!-- <span class="menu-arrow"></span> -->
										</span>
									</div>

									<div data-kt-menu-trigger="click" class="menu-item menu-accordion show">
										<!--begin:Menu link-->
										<span class="menu-link">
											<!-- <span class="menu-icon">
												<i class="ki-outline ki-briefcase fs-2"></i>
											</span> -->
											<span class="menu-icon">
											<i class="ki-duotone ki-file fs-2">
												<span class="path1"></span>
												 <span class="path2"></span>
												 <span class="path3"></span>
												 <span class="path4"></span>
											</i>
										</span>
											<span class="menu-title">All Jobs</span>
											<!-- <span class="menu-arrow"></span> -->
										</span>
									</div>
								
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="click" class="menu-item menu-accordion show">
										<!--begin:Menu link-->
										<span class="menu-link">
											<!-- <span class="menu-icon">
												<i class="ki-outline ki-briefcase fs-2"></i>
											</span> -->
											<span class="menu-icon">
											<i class="ki-duotone ki-profile-user fs-2">
												<span class="path1"></span>
												 <span class="path2"></span>
												 <span class="path3"></span>
												 <span class="path4"></span>
											</i>
										</span>
											<span class="menu-title">Candidates</span>
											<!-- <span class="menu-arrow"></span> -->
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<?/*
										<div class="menu-sub menu-sub-accordion">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link <? if($this->uri->segment(2) == 'addStaff') {echo "active";} ?> " href="<?=base_url('admin/addStaff')?>" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">New Staff</span>
												</a>
												<!--end:Menu link-->
											</div>
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link <? if($this->uri->segment(2) == 'manageStaff') {echo "active";} ?> " href="<?=base_url('admin/manageStaff')?>" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Registered Staff</span>
												</a>
												<!--end:Menu link-->
											</div>
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link <? if($this->uri->segment(2) == 'topupEwallet') {echo "active";} ?> " href="<?=base_url('admin/topupEwallet')?>" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Top Up E-Wallet</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
										*/?>
										<!--end:Menu sub-->
									</div>
									<div data-kt-menu-trigger="click" class="menu-item menu-accordion show">
										<!--begin:Menu link-->
										<span class="menu-link">
											<!-- <span class="menu-icon">
												<i class="ki-outline ki-briefcase fs-2"></i>
											</span> -->
											<span class="menu-icon">
											<i class="ki-duotone ki-file fs-2">
												<span class="path1"></span>
												 <span class="path2"></span>
												 <span class="path3"></span>
												 <span class="path4"></span>
											</i>
										</span>
											<span class="menu-title">Interviews</span>
											<!-- <span class="menu-arrow"></span> -->
										</span>
									</div>
									<!--end:Menu item-->
									<?/*
									<div data-kt-menu-trigger="click" class="menu-item menu-accordion show">
										<!--begin:Menu link-->
										<span class="menu-link">
											<span class="menu-icon">
												<i class="ki-outline ki-briefcase fs-2"></i>
											</span>
											<span class="menu-title">Vendor Management</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-accordion">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link <? if($this->uri->segment(2) == 'addVendor') {echo "active";} ?> " href="<?=base_url('admin/addVendor')?>" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">New Vendor</span>
												</a>
												<!--end:Menu link-->
											</div>
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link <? if($this->uri->segment(2) == 'manageVendor') {echo "active";} ?> " href="<?=base_url('admin/manageVendor')?>" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Registered Vendor</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
										<!--end:Menu sub-->
									</div>
									*/?>
								</div>
								<!--end::Sidebar menu-->
							</div>
						</div>
						<!--end::Wrapper-->
					</div>