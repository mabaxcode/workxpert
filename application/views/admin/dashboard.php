<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar pt-6 pb-2">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
									<!--begin::Toolbar wrapper-->
									<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
										<!--begin::Page title-->
										<div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
											<!--begin::Title-->
											<h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">E - Wallet</h1>
											<!--end::Title-->
											<!--begin::Breadcrumb-->
											<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
												<!--begin::Item-->
												<li class="breadcrumb-item text-muted">
													<a href="index.html" class="text-muted text-hover-primary">Home</a>
												</li>
												<!--end::Item-->
												<!--begin::Item-->
												<li class="breadcrumb-item">
													<span class="bullet bg-gray-500 w-5px h-2px"></span>
												</li>
												<!--end::Item-->
												<!--begin::Item-->
												<li class="breadcrumb-item text-muted">Dashboards</li>
												<!--end::Item-->
											</ul>
											<!--end::Breadcrumb-->
										</div>
										<!--end::Page title-->
										<!--begin::Actions-->
										<div class="d-flex align-items-center gap-2 gap-lg-3">
											<a href="<?=base_url('admin/addStaff')?>" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">Add Staff</a>
											<a href="<?=base_url('admin/addVendor')?>" class="btn btn-flex btn-primary h-40px fs-7 fw-bold">Add Vendor</a>
										</div>
										<!--end::Actions-->
									</div>
									<!--end::Toolbar wrapper-->
								</div>
								<!--end::Toolbar container-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-fluid">
									<!--begin::Row-->
									<div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
										<!--begin::Col-->
										<div class="col-xl-6">
											<!--begin::Card widget 3-->
											<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100" style="background-color: #F1416C;background-image:url('<?=base_url()?>assets/media/svg/shapes/wave-bg-red.svg')">
												<!--begin::Header-->
												<div class="card-header pt-5 mb-3">
													<!--begin::Icon-->
													<div class="d-flex flex-center rounded-circle h-80px w-80px" style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #F1416C">
														<i class="ki-outline ki-user-tick text-white fs-2qx lh-0"></i>
													</div>
													<!--end::Icon-->
												</div>
												<!--end::Header-->
												<!--begin::Card body-->
												<div class="card-body d-flex align-items-end mb-3">
													<!--begin::Info-->
													<div class="d-flex align-items-center">
														<span class="fs-4hx text-white fw-bold me-6"><?=$total_staff?></span>
														<div class="fw-bold fs-6 text-white">
															<span class="d-block">Total</span>
															<span class="">Registered Staff </span>
														</div>
													</div>
													<!--end::Info-->
												</div>
												<!--end::Card body-->
												<!--begin::Card footer-->
												<div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
													<!--begin::Progress-->
													<!-- <div class="fw-bold text-white py-2">
														<span class="fs-1 d-block"></span>
														<span class="opacity-50">Problems Solved</span>
													</div> -->
													<!--end::Progress-->
												</div>
												<!--end::Card footer-->
											</div>
											<!--end::Card widget 3-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-xl-6">
											<!--begin::Card widget 3-->
											<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100" style="background-color: #7239EA;background-image:url('<?=base_url()?>assets/media/svg/shapes/wave-bg-purple.svg')">
												<!--begin::Header-->
												<div class="card-header pt-5 mb-3">
													<!--begin::Icon-->
													<div class="d-flex flex-center rounded-circle h-80px w-80px" style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #7239EA">
														<i class="ki-outline ki-shop text-white fs-2qx lh-0"></i>
													</div>
													<!--end::Icon-->
												</div>
												<!--end::Header-->
												<!--begin::Card body-->
												<div class="card-body d-flex align-items-end mb-3">
													<!--begin::Info-->
													<div class="d-flex align-items-center">
														<span class="fs-4hx text-white fw-bold me-6"><?=$total_vendor?></span>
														<div class="fw-bold fs-6 text-white">
															<span class="d-block">Total</span>
															<span class="">Registered Vendor</span>
														</div>
													</div>
													<!--end::Info-->
												</div>
												<!--end::Card body-->
												<!--begin::Card footer-->
												<div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
													<!--begin::Progress-->
													<!-- <div class="fw-bold text-white py-2">
														<span class="fs-1 d-block">386</span>
														<span class="opacity-50">Generated Leads</span>
													</div> -->
													<!--end::Progress-->
												</div>
												<!--end::Card footer-->
											</div>
											<!--end::Card widget 3-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
							
					
									
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>