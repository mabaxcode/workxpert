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
											<h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">Workxpert</h1>
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
											<!-- <a href="<?=base_url('admin/addStaff')?>" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">Add Staff</a> -->
											<!-- <a href="<?=base_url('admin/addVendor')?>" class="btn btn-flex btn-primary h-40px fs-7 fw-bold">Post Job</a> -->
											<!-- <a href="#" class="btn btn-flex btn-primary h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Post Job</a> -->
											<a href="#" class="btn btn-flex btn-primary h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">Post Training</a>
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

										<? if($posts){ ?>

										<div class="card ">
										    <div class="card-header card-header-stretch">
										        <h3 class="card-title">Jobs</h3>
										        <div class="card-toolbar">
										            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
										                <li class="nav-item">
										                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_7">Open Training</a>
										                </li>
										                <li class="nav-item">
										                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_8">Closed Training</a>
										                </li>
										            </ul>
										        </div>
										    </div>
										    <div class="card-body">
										        <div class="tab-content" id="myTabContent">
										            <div class="tab-pane fade show active" id="kt_tab_pane_7" role="tabpanel">
										            	
															<!--begin::Card-->
															
																<!--begin::Card header-->
																<div class="card-header border-0 pt-6">
																	<!--begin::Card title-->
																	<div class="card-title">
																		<!--begin::Search-->
																		<div class="d-flex align-items-center position-relative my-1">
																			<i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
																			<input type="text" data-kt-user-table-filter="search" class="form-control w-250px ps-13" placeholder="Search..." />
																		</div>
																		<!--end::Search-->
																	</div>
																	<!--begin::Card title-->
																	
																</div>
																<!--end::Card header-->
																<!--begin::Card body-->
																<div class="card-body py-4">
																	<!--begin::Table-->
																	<div class="table-responsive">
																		<table class="table table-rounded table-flush" id="dt_staff_list">
																			<thead>
																				<tr class="fw-semibold fs-5 text-danger border-bottom border-gray-200 py-4">
																					<th>#</th>
																					<th>Training Title</th>
																					<th>Location</th>
																					<th>Allowance</th>
																					<th>Date Created</th>
																					<th>Action</th>
																				</tr>
																			</thead>
																			<tbody>
																				<? if($opens){ ?>
																				<? $copen = 1; ?>
																				<? foreach ($opens as $open) { ?>
																				<tr class="py-5 fw-bold  border-bottom  border-gray-500 fs-4">
																					<td><?=$copen++;?></td>
																					<td><?=$open['title']?><br><span class="badge badge-primary">Active</span></td>
																					<td><?=$open['city']?>, <?=$open['state']?></td>
																					<td><?=$open['allowance']?></td>
																					<td><?=dmy($open['create_dt'])?></td>
																					<td></td>
																				</tr>
																				<? } ?>
																				<? } ?>
																			</tbody>
																		</table>
																	</div>
																	<!--end::Table-->
																</div>
														
										            </div>

										            <div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
										            	<!--begin::Card header-->
																<div class="card-header border-0 pt-6">
																	<!--begin::Card title-->
																	<div class="card-title">
																		<!--begin::Search-->
																		<div class="d-flex align-items-center position-relative my-1">
																			<i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
																			<input type="text" data-kt-user-table-filter-close="search" class="form-control w-250px ps-13" placeholder="Search..." />
																		</div>
																		<!--end::Search-->
																	</div>
																	<!--begin::Card title-->
																	
																</div>
																<!--end::Card header-->
																<!--begin::Card body-->
																<div class="card-body py-4">
																	<!--begin::Table-->
																	<div class="table-responsive">
																		<table class="table table-rounded table-flush" id="dt_staff_list_close">
																			<thead>
																				<tr class="fw-semibold fs-5 text-danger border-bottom border-gray-200 py-4">
																					<th>#</th>
																					<th>Training Title</th>
																					<th>Location</th>
																					<th>Allowance</th>
																					<th>Date Created</th>
																					<th>Action</th>
																				</tr>
																			</thead>
																			<tbody>
																				<? if($closes){ ?>
																				<? $cncloses = 1; ?>
																				<? foreach ($closes as $close) { ?>
																				<tr class="py-5 fw-bold  border-bottom  border-gray-500 fs-4">
																					<td><?=$cncloses++;?></td>
																					<td><?=$close['title']?><br><span class="badge badge-primary">Active</span></td>
																					<td><?=$close['city']?>, <?=$close['state']?></td>
																					<td><?=$close['allowance']?></td>
																					<td><?=dmy($close['create_dt'])?></td>
																					<td></td>
																				</tr>
																				<? } ?>
																				<? } ?>
																			</tbody>
																		</table>
																	</div>
																	<!--end::Table-->
																</div>
										            </div>
										        </div>
										    </div>
										</div>

										<? } else { ?>
										<div class="card">
											<!--begin::Card body-->
											<div class="card-body">
												<!--begin::Heading-->
												<div class="card-px text-center pt-15 pb-15">
													<!--begin::Title-->
													<h2 class="fs-2x fw-bold mb-0">Post your first job directly on Workxpert.</h2>
													<!--end::Title-->
													<!--begin::Description-->
													<p class="text-gray-500 fs-4 fw-semibold py-7">Workxpert brings you up to four times more applications than redirecting applications to your career website.
													<br />Make it simpler. Hire faster !</p>
													<!--end::Description-->
													<!--begin::Action-->
													<!-- <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">Add New Job</a> -->
													<!--end::Action-->
												</div>
												<!--end::Heading-->
												<!--begin::Illustration-->
												<div class="text-center pb-15 px-5">
													<img src="<?=base_url()?>assets/media/illustrations/sketchy-1/19.png" alt="" class="mw-100 h-200px h-sm-325px" />
												</div>
												<!--end::Illustration-->
											</div>
											<!--end::Card body-->
										</div>
										<? } ?>

						
										
									</div>
									<!--end::Row-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>



						<div class="modal fade" id="kt_modal_new_address" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-950px">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Form-->
					<form class="form" action="#" id="kt_modal_new_address_form">
						<!--begin::Modal header-->
						<div class="modal-header" id="kt_modal_new_address_header">
							<!--begin::Modal title-->
							<h2>Post New Training</h2>
							<!--end::Modal title-->
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
								<i class="ki-outline ki-cross fs-1"></i>
							</div>
							<!--end::Close-->
						</div>
						<!--end::Modal header-->
						<!--begin::Modal body-->
						<div class="modal-body py-10 px-lg-17">
							<!--begin::Scroll-->
							<div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
								<!--begin::Notice-->
								<!--begin::Notice-->
								<?/*
								<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
									<!--begin::Icon-->
									<i class="ki-outline ki-information fs-2tx text-warning me-4"></i>
									<!--end::Icon-->
									<!--begin::Wrapper-->
									<div class="d-flex flex-stack flex-grow-1">
										<!--begin::Content-->
										<div class="fw-semibold">
											<h4 class="text-gray-900 fw-bold">Notice</h4>
											<div class="fs-6 text-gray-700">This account will be set to <a href="#">In Active</a>. To Activate account you must complete their registration process</div>
										</div>
										<!--end::Content-->
									</div>
									<!--end::Wrapper-->
								</div>
								*/?>
								<!--end::Notice-->
								<!--end::Notice-->
								<!--begin::Input group-->
								
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="d-flex flex-column mb-5 fv-row">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Training Title</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input class="form-control" placeholder="" name="title" />
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								
								<div class="row g-9 mb-5">
									<!--begin::Col-->
									<div class="col-md-6 fv-row">
										<!--begin::Label-->
										<label class="fs-5 fw-semibold mb-2 required">Location</label>
										<!--end::Label-->
										<!--begin::Input-->
										<!-- <input class="form-control" type="password" placeholder="State" name="password" /> -->
										<select name="state" class="form-control" onchange="populate_city(this.value)">
											<option value="">Please select state</option>
											<option value="Sabah">Sabah</option>
											<option value="Sarawak">Serawak</option>
										</select>
										<!--end::Input-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-md-6 fv-row">
										<!--begin::Label-->
										<label class="fs-5 fw-semibold mb-2">&nbsp;</label>
										<!--end::Label-->
										<!--begin::Input-->
										<!-- <input class="form-control" type="password" placeholder="City" name="confirm-password" /> -->
										<select id="city" name="city" class="form-control">
										    <option value="">Please select city</option>
										</select>
										<!--end::Input-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
						
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="row g-9 mb-5">
									<!--begin::Col-->
									<div class="col-md-6 fv-row">
										<!--begin::Label-->
										<label class="fs-5 fw-semibold mb-2">Allowance</label>
										<!--end::Label-->
										<!--begin::Input-->
										<!-- <input class="form-control" type="password" placeholder="" name="password" /> -->
										<select name="allowance" class="form-control">
											<option value="">Please select allowance</option>
											<option value="RM100-RM600">RM100-RM600</option>
											<option value="RM600-RM1000">RM600-RM1000</option>
										</select>
										<!--end::Input-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<?/*
									<div class="col-md-6 fv-row">
										<!--begin::Label-->
										<label class="fs-5 fw-semibold mb-2">Confirm Password</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control" type="password" placeholder="" name="confirm-password" />
										<!--end::Input-->
									</div>
									*/?>
									<!--end::Col-->
								</div>
								<div class="d-flex flex-column mb-5 fv-row">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Training Description</label>
									<!--end::Label-->
									<!--begin::Input-->
									<textarea class="form-control" rows="6" name="job_desc"></textarea>
									<!--end::Input-->
								</div>
								<div class="d-flex flex-column mb-5 fv-row">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Requirement</label>
									<!--end::Label-->
									<!--begin::Input-->
									<textarea class="form-control" rows="5" name="requirement"></textarea>
									<!--end::Input-->
								</div>
							</div>
							<!--end::Scroll-->
						</div>
						<!--end::Modal body-->
						<!--begin::Modal footer-->
						<div class="modal-footer flex-center">
							<!--begin::Button-->
							<button type="reset" id="kt_modal_new_address_cancel" class="btn btn-light me-3">Discard</button>
							<!--end::Button-->
							<!--begin::Button-->
							<button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
								<span class="indicator-label">Create</span>
								<span class="indicator-progress">Please wait... 
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
							<!--end::Button-->
						</div>
						<!--end::Modal footer-->
					</form>
					<!--end::Form-->
				</div>
			</div>
		</div>

		<script type="text/javascript">
			function populate_city(state) {
				// body...
				if (state === "") {
			        document.getElementById("city").innerHTML = '<option value="">Select City</option>';
			        return;
			    }

			    fetch("<?= base_url('employer/get_cities'); ?>?state=" + state)
			    .then(response => response.json())
			    .then(data => {
			        let cityDropdown = document.getElementById("city");
			        cityDropdown.innerHTML = '<option value="">Select City</option>'; // Reset dropdown

			        data.forEach(city => {
			            let option = document.createElement("option");
			            option.value = city;
			            option.textContent = city;
			            cityDropdown.appendChild(option);
			        });
			    })
			    .catch(error => console.error("Error fetching cities:", error));
			}
		</script>
