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
											<h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">My Balance: RM<?=number_format($walletdata['balance'],2)?></h1>
											<!--end::Title-->
											<!--begin::Breadcrumb-->
											<span class="badge badge-info badge-lg">STAFF ID (<?=$staffdata['staff_id']?>)</span>
											<!--end::Breadcrumb-->
										</div>
										<!--end::Page title-->
										<!--begin::Actions-->
										<div class="d-flex align-items-center gap-2 gap-lg-3">
											
											
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
									<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
										<!--begin::Col-->
										<div class="col-xxl-12">
											<!--begin::Chart widget 26-->
											<div class="card card-flush overflow-hidden h-xl-100">
												<!--begin::Header-->
												<div class="card-header pt-7 mb-2">
													<!--begin::Title-->
													<h3 class="card-title text-gray-800 fw-bold">Transaction History</h3>
													<!--end::Title-->
													<!--begin::Toolbar-->
													
													<!--end::Toolbar-->
												</div>
												<!--end::Header-->
												<!--begin::Card body-->
												<div class="card-body d-flex justify-content-between flex-column pt-0 pb-1 px-0">
													<!--begin::Info-->
													<div class="px-9 mb-5">
														<!--begin::Statistics-->
														<div class="d-flex align-items-center mb-2">
															<!--begin::Currency-->
															<span class="fs-4 fw-semibold text-gray-500 align-self-start me-1">RM</span>
															<!--end::Currency-->
															<!--begin::Value-->
															<span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2"><?=$total_current?></span>
															<!--end::Value-->
															<!--begin::Label-->
															
															<!--end::Label-->
														</div>
														<!--end::Statistics-->
														<!--begin::Description-->
														<span class="fs-6 fw-semibold text-gray-500">Transactions in <?=$currentMonthName?></span>
														<!--end::Description-->
													</div>
													<!--end::Info-->
													<!--begin::Chart-->
													<div id="kt_charts_widget_26" class="min-h-auto ps-4 pe-6" data-kt-chart-info="Transactions" style="height: 300px"></div>
													<!--end::Chart-->
												</div>
												<!--end::Card body-->
											</div>
											<!--end::Chart widget 26-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
									<!--begin::Row-->
									<div class="row g-5 g-xl-10">
										<div class="col-xl-12">
											<!--begin::Chart widget 15-->
											<div class="card card-flush h-xl-100">
												<!--begin::Header-->
												<div class="card-header pt-7">
													<!--begin::Title-->
													<h3 class="card-title align-items-start flex-column">
														<span class="card-label fw-bold text-gray-900">Transaction History</span>
														<span class="text-gray-500 pt-2 fw-semibold fs-6">Statistics by Month</span>
													</h3>
													<!--end::Title-->
													<!--begin::Toolbar-->
													
													<!--end::Toolbar-->
												</div>
												<!--end::Header-->
												<!--begin::Body-->
												<div class="card-body pt-5">
													<!--begin::Chart container-->
													<div id="kt_charts_widget_15_chart" class="min-h-auto ps-4 pe-6 mb-3 h-350px"></div>
													<!--end::Chart container-->
												</div>
												<!--end::Body-->
											</div>
											<!--end::Chart widget 15-->
										</div>
									</div>
									<!--end::Row-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>