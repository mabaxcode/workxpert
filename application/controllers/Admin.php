<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        // if ($this->session->userdata('user_id') && $this->session->userdata('user_type') <> '3') {
        // 	redirect();
        // }

        // $this->load->model('App_model', 'DbApp');
        // $this->users_table  = 'users';
        // $this->user_id = $this->session->userdata('user_id');
	}

	public function index()
	{	
		$data['content']      = 'admin/dashboard';

		$data['total_staff']  = count_any_table(array('user_type' => '1', 'status' => '2'), 'users');
		$data['total_vendor'] = count_any_table(array('user_type' => '2', 'status' => '2'), 'users');

		$this->load->view('master-ui-admin/main', $data);
	}

	public function manageStaff($data=false)
	{
		// code...
		$data['content'] = 'admin/manage_staff';
		$data['complete'] = get_any_table_array(array('complete' => '1'), 'staff_details');
		$this->load->view('master-ui-admin/main', $data);
	}

	function topupEwallet($data=false)
	{
		$data['content'] = 'admin/manage_topup';
		$data['complete'] = get_any_table_array(array('complete' => '1'), 'staff_details');
		$this->load->view('master-ui-admin/main', $data);
	}

	public function addStaff($data=false)
	{
		// code...
		$data['content'] = 'admin/add_staff';

		$data['pending'] = get_any_table_array(array('status' => '1', 'user_type' => '1'), 'users');

		$this->load->view('master-ui-admin/main', $data);
	}

	public function addVendor($data=false)
	{
		// code...
		$data['content'] = 'admin/add_vendor';
		$data['pending'] = get_any_table_array(array('status' => '1', 'user_type' => '2'), 'users');
		$this->load->view('master-ui-admin/main', $data);
	}

	public function manageVendor($data=false)
	{
		// code...
		$data['content'] = 'admin/manage_vendor';
		$data['complete'] = get_any_table_array(array('complete' => '1'), 'vendor_details');
		$this->load->view('master-ui-admin/main', $data);
	}

	function create_staff_account($data=false)
	{
		$post = $this->input->post();

		// echo "<pre>"; print_r($post); echo "</pre>";

		$insert_data = array(
			'name' => $post['name'], 
			'username' => $post['username'], 
			'password' => md5($post['password']), 
			'user_type' => '1',
			'create_dt' => current_date(),
			'status' => '1',
		);

		$insert = insert_any_table($insert_data, 'users');

		if ($insert == true) {
			echo encode(array('status' => true, 'msg' => 'Account has been created, please complete their registration!'));
		} else {
			echo encode(array('status' => false, 'msg' => 'Failed to create !'));
		}
	}

	function create_vendor_account($data=false)
	{
		$post = $this->input->post();

		// echo "<pre>"; print_r($post); echo "</pre>";

		$insert_data = array(
			'name' => $post['name'], 
			'username' => $post['username'], 
			'password' => md5($post['password']), 
			'user_type' => '2',
			'create_dt' => current_date(),
			'status' => '1',
		);

		$insert = insert_any_table($insert_data, 'users');

		if ($insert == true) {
			echo encode(array('status' => true, 'msg' => 'Account has been created, please complete their registration!'));
		} else {
			echo encode(array('status' => false, 'msg' => 'Failed to create !'));
		}
	}

	function completeStaffRegister($data=false)
	{
		$id = $this->input->post('id');

		$data['staff'] = get_any_table_row(array('id' => $id), 'users');

		$this->load->view('admin/modal-complete-register', $data);
	}

	function completeVendorRegister($data=false)
	{
		$id = $this->input->post('id');

		$data['vendor'] = get_any_table_row(array('id' => $id), 'users');

		$this->load->view('admin/modal-complete-register-vendor', $data);
	}

	function editStaff($data=false)
	{
		$id = $this->input->post('id');

		$data['staff'] = get_any_table_row(array('id' => $id), 'staff_details');

		$this->load->view('admin/modal-edit-staff', $data);
	}

	function editVendor($data=false)
	{
		$id = $this->input->post('id');

		$data['vendor'] = get_any_table_row(array('id' => $id), 'vendor_details');

		$this->load->view('admin/modal-edit-vendor', $data);
	}

	function do_register_staff($data=false)
	{
		$post = $this->input->post();

		// echo "<pre>"; print_r($post); echo "</pre>";

		$insert_data = array(
			'staff_id' => $post['staff_id'],
			'name' => $post['name'],
			'email' => $post['email'],
			'phone_no' => $post['phone_no'],
			'position' => $post['position'],
			'user_id' => $post['id'],
			'complete' => '1',
			'register_date' => current_date(),
		);

		$insert = insert_any_table($insert_data, 'staff_details');


		$data_ewallet = array('staff_id' =>$post['staff_id'], 'user_id' => $post['id'], 'balance' => $post['balance']);
		$insert_ewallet = insert_any_table($data_ewallet, 'ewallet_detail');

		# insert log e-wallet
		// $log = array('user_id' => $post['id'], '' );


		if ($insert == true) {
			$update_user = array('status' => '2', 'name' => $post['name']);
			update_any_table($update_user, array('id' => $post['id']), 'users');
			echo encode(array('status' => true, 'msg' => 'Staff registration has been completed !'));
		} else {
			echo encode(array('status' => false, 'msg' => 'Failed to register !'));
		}
	}

	function do_edit_staff($data=false)
	{
		$post = $this->input->post();

		// echo "<pre>"; print_r($post); echo "</pre>";

		$update = array(
			'name' => $post['name'],
			'email' => $post['email'],
			'phone_no' => $post['phone_no'],
			'position' => $post['position'],
		);

		$insert = update_any_table($update, array('id' => $post['id']), 'staff_details');


		// $data_ewallet   = array('staff_id' =>$post['staff_id'], 'user_id' => $post['id'], 'balance' => $post['balance']);
		// $insert_ewallet = insert_any_table($data_ewallet, 'ewallet_detail');


		if ($insert == true) {
			$update_user = array('name' => $post['name']);
			update_any_table($update_user, array('id' => $post['user_id']), 'users');
			echo encode(array('status' => true, 'msg' => 'Staff has been updated !'));
		} else {
			echo encode(array('status' => false, 'msg' => 'Failed to update !'));
		}
	}

	function topupEwallet_modal($data=false)
	{
		$id = $this->input->post('id');

		$data['staff'] = get_any_table_row(array('id' => $id), 'staff_details');

		$data['current_ewallet'] = get_any_table_row(array('user_id' => $data['staff']['user_id'], 'staff_id' => $data['staff']['staff_id']), 'ewallet_detail');


		$this->load->view('admin/modal-topup', $data);
	}

	function topupEwallet_process($data=false)
	{
		$id = $this->input->post('id');
		$balance = $this->input->post('balance');
		$curr_balance = $this->input->post('curr_balance');

		$total_balance = $curr_balance + $balance;

		$update = array('balance' => $total_balance);

		$where = array('id' => $id);

		$update = update_any_table($update, $where, 'ewallet_detail');

		if ($update == true) {
			echo encode(array('status' => true, 'msg' => 'Successfully top up'));
		} else {
			echo encode(array('status' => false, 'msg' => 'Failed to top up !'));
		}
	}

	function do_register_vendor($data=false)
	{
		$post = $this->input->post();

		// echo "<pre>"; print_r($post); echo "</pre>";

		$insert_data = array(
			'name' => $post['name'],
			'email' => $post['email'],
			'phone_no' => $post['phone_no'],
			'user_id' => $post['id'],
			'complete' => '1',
			'register_date' => current_date(),
		);

		$insert = insert_any_table($insert_data, 'vendor_details');

		if ($insert == true) {
			$update_user = array('status' => '2', 'name' => $post['name']);
			update_any_table($update_user, array('id' => $post['id']), 'users');
			echo encode(array('status' => true, 'msg' => 'Vendor registration has been completed !'));
		} else {
			echo encode(array('status' => false, 'msg' => 'Failed to register !'));
		}	
	}

	function do_edit_vendor($data=false)
	{
		$post = $this->input->post();

		// echo "<pre>"; print_r($post); echo "</pre>";

		$update = array(
			'name' => $post['name'],
			'email' => $post['email'],
			'phone_no' => $post['phone_no'],
		);

		$insert = update_any_table($update, array('id' => $post['id']), 'vendor_details');


		// $data_ewallet   = array('staff_id' =>$post['staff_id'], 'user_id' => $post['id'], 'balance' => $post['balance']);
		// $insert_ewallet = insert_any_table($data_ewallet, 'ewallet_detail');


		if ($insert == true) {
			$update_user = array('name' => $post['name']);
			update_any_table($update_user, array('id' => $post['user_id']), 'users');
			echo encode(array('status' => true, 'msg' => 'Vendor has been updated !'));
		} else {
			echo encode(array('status' => false, 'msg' => 'Failed to update !'));
		}
	}

	function logout()
	{	
		$this->session->sess_destroy();
		redirect();
	}



}
