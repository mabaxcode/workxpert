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
											<h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">Sale Transaction</h1>
											<!--end::Title-->
											<!--begin::Breadcrumb-->
											<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
												<!--begin::Item-->
												<li class="breadcrumb-item text-muted">
													<a href="index.html" class="text-muted text-hover-primary">Sale Transaction</a>
												</li>
												<!--end::Item-->
												<!--begin::Item-->
												<li class="breadcrumb-item">
													<span class="bullet bg-gray-500 w-5px h-2px"></span>
												</li>
												<!--end::Item-->
												<!--begin::Item-->
												<li class="breadcrumb-item text-muted">History</li>
												<!--end::Item-->
												
											</ul>
											<!--end::Breadcrumb-->
										</div>
										<!--end::Page title-->
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
									<!--begin::Card-->
									<div class="card">
										<!--begin::Card header-->
										<div class="card-header border-0 pt-6">
											<!--begin::Card title-->
											<div class="card-title">
												<!--begin::Search-->
												<div class="d-flex align-items-center position-relative my-1">
													<i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
													<input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search..." />
												</div>
												<!--end::Search-->
											</div>
											<!--begin::Card title-->
											
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<!--begin::Table-->
											<table class="table align-middle table-row-dashed fs-6 gy-5" id="dt_staff_list">
												<thead>
													<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
														<th>No.</th>
														<th class="min-w-125px">Staff</th>
														<th class="min-w-125px">Product</th>
														<th class="min-w-125px">Quantity</th>
														<th class="min-w-125px">Total Payment</th>
														<th class="min-w-125px">Status</th>
														<!-- <th class="text-end min-w-100px">Actions</th> -->
													</tr>
												</thead>
												<tbody class="text-gray-600 fw-semibold">
													<? if ($logs) { ?>
													<? $no = 1; ?>
													<? foreach ($logs as $key) { ?>
													<?
													$staffDetails = get_any_table_row(array('staff_id' => $key['staff_id']), 'staff_details');
													$productDetails = get_any_table_row(array('id' => $key['product_id']), 'product');
													?>
													<tr>
														<td><?=$no++?></td>
														<td class="d-flex align-items-center">
															<!--begin:: Avatar -->
															<!-- <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
																<a href="apps/user-management/users/view.html">
																	<div class="symbol-label">
																		<img src="assets/media/avatars/300-6.jpg" alt="Emma Smith" class="w-100" />
																	</div>
																</a>
															</div> -->
															<!--end::Avatar-->
															<!--begin::User details-->
															<div class="d-flex flex-column">
																<a href="#" class="text-gray-800 text-hover-primary mb-1">
																	<?=strtoupper($staffDetails['name'])?></a>
																<span><?=$key['staff_id']?></span>
															</div>
															<!--begin::User details-->
														</td>
														<td><?=$productDetails['name']?></td>
														<td><?=$key['quantity']?></td>
														<td><b>RM<?=number_format($key['total_payment'],2);?></b></td>
														<td>
															<div class="badge badge-success fw-bold">Paid</div>
															<br>
															<span><small><i>Paid Date : <?=dmy($key['create_dt'])?></i></small></span>
														</td>
														<?/*
														<td class="text-end">
															
															<a href="#" class="btn btn-light btn-<?=$labelColor?> btn-flex btn-center btn-sm disable-product" data-kt-menu-placement="bottom-end" data-init="<?=$key['id']?>"><?=$btnlabel?></a>
															<a href="#" class="btn btn-secondary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
															<i class="ki-outline ki-down fs-5 ms-1"></i></a>
															<!--begin::Menu-->
															<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3 edit-product" data-init="<?=$key['id']?>">Edit</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3 delete-product" data-kt-users-table-filter="delete_row" data-init="<?=$key['id']?>">Delete</a>
																</div>
																<!--end::Menu item-->
															</div>
															<!--end::Menu-->
															
														</td>
														*/?>
													</tr>
													<? } ?>
													<? } ?>
												</tbody>
											</table>
											<!--end::Table-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Card-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>