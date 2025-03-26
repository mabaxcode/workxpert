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
											<h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">Staff Management</h1>
											<!--end::Title-->
											<!--begin::Breadcrumb-->
											<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
												<!--begin::Item-->
												<li class="breadcrumb-item text-muted">
													<a href="index.html" class="text-muted text-hover-primary">Management</a>
												</li>
												<!--end::Item-->
												<!--begin::Item-->
												<li class="breadcrumb-item">
													<span class="bullet bg-gray-500 w-5px h-2px"></span>
												</li>
												<!--end::Item-->
												<!--begin::Item-->
												<li class="breadcrumb-item text-muted">Staff</li>
												<!--end::Item-->
												
											</ul>
											<!--end::Breadcrumb-->
										</div>
										<!--end::Page title-->
										<!--begin::Actions-->
										<!-- <div class="d-flex align-items-center gap-2 gap-lg-3">
											<a href="#" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">Add New Staff</a>
											<a href="#" class="btn btn-flex btn-primary h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Add New Staff</a>
										</div> -->
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
									<!--begin::Card-->
									<div class="card">
										<!--begin::Card header-->
										<div class="card-header border-0 pt-6">
											<!--begin::Card title-->
											<div class="card-title">
												<!--begin::Search-->
												<div class="d-flex align-items-center position-relative my-1">
													<i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
													<input type="text" data-kt-user-table-filter="search" class="form-control w-250px ps-13" placeholder="Search staff" />
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
														<th class="min-w-125px">Staff Name</th>
														<th class="min-w-125px">Staff id</th>
														<th class="min-w-125px">Phone No.</th>
														<th class="min-w-125px">e-wallet balance</th>
														<th class="min-w-125px">Joined Date</th>
														<th class="text-end min-w-100px">Actions</th>
													</tr>
												</thead>
												<tbody class="text-gray-600 fw-semibold">
													<? if($complete){ ?>
													<? foreach($complete as $key){ ?>
													<? $ewallet_detail = get_any_table_row(array('user_id' => $key['user_id']), 'ewallet_detail'); ?>
													<tr>
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
																<a href="apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1"><?=$key['name']?></a>
																<span><?=$key['email']?></span>
															</div>
															<!--begin::User details-->
														</td>
														<td><?=$key['staff_id']?></td>
														<td><?=$key['phone_no']?></td>
														<td>
															<div class="badge badge-success fw-bold">RM<?=$ewallet_detail['balance']?></div>
														</td>
														<td><?=dmy($key['register_date'])?></td>
														<td class="text-end">
															<a href="#" class="btn btn-light btn-info btn-flex btn-center btn-sm topup-ewallet" data-kt-menu-placement="bottom-end" data-init="<?=$key['id']?>"><i class="ki-outline ki-paypal fs-2"></i>Top Up E-Wallet</a>
															<?/*
															<a href="#" class="btn btn-secondary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Update 
															<i class="ki-outline ki-down fs-5 ms-1"></i></a>
															<!--begin::Menu-->
															
															<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Deactive</a>
																</div>
																<!--end::Menu item-->
															</div>
															*/?>
															<!--end::Menu-->
														</td>
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