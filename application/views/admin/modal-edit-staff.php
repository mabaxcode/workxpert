<div class="modal-dialog modal-dialog-centered mw-750px">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Form-->
					<form class="form" action="#" id="edit_staff_regis_data">
						<!--begin::Modal header-->
						<div class="modal-header" id="kt_modal_new_address_header">
							<!--begin::Modal title-->
							<h2>Staff Registration</h2>
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
								
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="d-flex flex-column mb-5 fv-row">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Staff ID</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input class="form-control" value="EW-<?=$staff['id']?>" disabled />
									<!--end::Input-->
								</div>
								<div class="d-flex flex-column mb-5 fv-row">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Name</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input class="form-control" placeholder="" name="name" value="<?=$staff['name']?>" />
									<!--end::Input-->
								</div>
								<div class="d-flex flex-column mb-5 fv-row">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Email</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input class="form-control" placeholder="" name="email" value="<?=$staff['email']?>" />
									<!--end::Input-->
								</div>
								<div class="d-flex flex-column mb-5 fv-row">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Phone No.</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input class="form-control" placeholder="" name="phone_no" value="<?=$staff['phone_no']?>" />
									<!--end::Input-->
								</div>
								<div class="d-flex flex-column mb-5 fv-row">
									<!--begin::Label-->
									<label class="required fs-5 fw-semibold mb-2">Position</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input class="form-control" placeholder="" name="position" value="<?=$staff['position']?>" />
									<!--end::Input-->
								</div>

								<input type="hidden" name="id" value="<?=$staff['id']?>">
								<input type="hidden" name="user_id" value="<?=$staff['user_id']?>">
								
							</div>
							<!--end::Scroll-->
						</div>
						<!--end::Modal body-->
						<!--begin::Modal footer-->
						<div class="modal-footer flex-center">
							<!--begin::Button-->
							<button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
							<!--end::Button-->
							<!--begin::Button-->
							<a class="btn btn-primary btn-edit-staff">
								<span class="indicator-label">Save Changes</span>
							</a>
							<!--end::Button-->
						</div>
						<!--end::Modal footer-->
					</form>
					<!--end::Form-->
				</div>
			</div>



<script type="text/javascript">
	$( document ).ready(function() {

        editStaffRegis('edit_staff_regis_data');

    });
</script>