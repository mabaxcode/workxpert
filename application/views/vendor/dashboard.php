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
											<!-- <a href="#" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">Add Product</a> -->
											<a href="<?=base_url('vendor/addProduct')?>" class="btn btn-flex btn-primary h-40px fs-7 fw-bold">+ Add Product</a>
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
														<span class="fs-4hx text-white fw-bold me-6"><?=$total_product?></span>
														<div class="fw-bold fs-6 text-white">
															<span class="d-block">Total</span>
															<span class="">Active Product</span>
														</div>
													</div>
													<!--end::Info-->
												</div>
												<!--end::Card body-->
												<!--begin::Card footer-->
												<div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
													<!--begin::Progress-->
													<div class="fw-bold text-white py-2">
														<!-- <span class="fs-1 d-block">386</span> -->
														<span class="opacity-50"><?=$store_name?></span>
													</div>
													<!--end::Progress-->
												</div>
												<!--end::Card footer-->
											</div>
											<!--end::Card widget 3-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-xl-6">
											<div class="card h-xl-100">
												<!--begin::Header-->
												<div class="card-header position-relative min-h-50px p-0 border-bottom-2">
													<!--begin::Nav-->
													<ul class="nav nav-pills nav-pills-custom d-flex position-relative w-100">
														<!--begin::Item-->
														<li class="nav-item mx-0 p-0 w-50">
															<!--begin::Link-->
															<a class="nav-link btn btn-color-muted active border-0 h-100 px-0" data-bs-toggle="pill" id="kt_forms_widget_1_tab_1" href="#kt_forms_widget_1_tab_content_1">
																<!--begin::Subtitle-->
																<span class="nav-text fw-bold fs-4 mb-3">Cashier</span>
																<!--end::Subtitle-->
																<!--begin::Bullet-->
																<span class="bullet-custom position-absolute z-index-2 w-100 h-2px top-100 bottom-n100 bg-primary rounded"></span>
																<!--end::Bullet-->
															</a>
															<!--end::Link-->
														</li>
														<!--end::Item-->
													</ul>
													<!--end::Nav-->
												</div>
												<!--end::Header-->
												<!--begin::Body-->
												<div class="card-body">
													<!--begin::Tab Content-->
													<div class="tab-content">
														<!--begin::Tap pane-->
														<div class="tab-pane fade active show" id="kt_forms_widget_1_tab_content_1">
															<!--begin::Input group-->

															<span class="error-message" id="err-product" style="color: red; display: none;"></span>

															<div class="form-floating border border-gray-300 rounded mb-7">

																<select class="form-select form-select-transparent" data-control="select2" data-placeholder="Select an option" onchange="populate_price(this.value)" id="idd-product-name-payment">
																    <option></option>
																    <? foreach($products as $key){ ?>
																    <option value="<?=$key['id']?>"><?=$key['name']?></option>
																	<? } ?>
																</select>

																
																<label for="floatingInputValue">Product Name</label>

															</div>

															<!--end::Input group-->
															<!--begin::Row-->
															<div class="row mb-7">
																<!--begin::Col-->
																<div class="col-6">
																	<!--begin::Input group-->
																	<div class="form-floating">
																		<input type="text" class="form-control text-gray-800 fw-bold" id="product-pricing-idd" disabled />
																		<!-- <input type="text" id="product-pricing-idd" name="price" class="form-control min-salary" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0', 'prefix': 'RM' " disabled> -->
																		<label for="floatingInputValue">Price(RM)</label>
																	</div>
																	<!--end::Input group-->
																</div>
																<!--end::Col-->
																<!--begin::Col-->
																<div class="col-6">
																	<!--begin::Input group-->
																	<div class="form-floating">
																		<input type="number" id="default-quantity-idd" class="form-control text-gray-800 fw-bold" oninput="calc_total_price(this.value)" />
																		<label for="floatingInputValue">Quantity</label>
																	</div>
																	<span class="error-message" id="err-quantity" style="color: red; display: none;"></span>
																	<!--end::Input group-->
																</div>

																<!--end::Col-->
															</div>
															<div class="row mb-7">
																<!--begin::Col-->
																<div class="col-12">
																	<!--begin::Input group-->
																	<div class="form-floating">
																		<!-- <input type="text" name="total_price" class="form-control min-salary" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0', 'prefix': 'RM' " disabled> -->

																		<input type="text" class="form-control text-gray-800 fw-bold" id="total-pricing-idd" disabled />
																		<label for="floatingInputValue">Total Price(RM)</label>
																	</div>
																	<!--end::Input group-->
																</div>
																<!--end::Col-->
															</div>
															<div class="row mb-7">
																<!--begin::Col-->
																<div class="col-12">
																	<!--begin::Input group-->
																	<div class="">
																		<input type="text" id="idd-staff-id-payment" class="form-control" placeholder="Enter Staff ID">
																	</div>
																	<span class="error-message" id="err-staff-id" style="color: red; display: none;"></span>
																	<!--end::Input group-->
																</div>
																<!--end::Col-->
															</div>
															<!--end::Row-->
															<!--begin::Action-->
															<div class="d-flex align-items-end">
																<a href="#" data-bs-toggle="modal" class="btn btn-primary fs-3 w-100 btn-make-payment">Make Payment</a>
															</div>
															<!--end::Action-->
														</div>
														<!--end::Tap pane-->
														
													</div>
													<!--end::Tab Content-->
												</div>
												<!--end: Card Body-->
											</div>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
					
									
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>