<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        // if ($this->session->userdata('user_id') && $this->session->userdata('user_type') <> '2') {
        // 	redirect();
        // }

        // $this->load->model('App_model', 'DbApp');
        // $this->users_table  = 'users';
        // $this->user_id = $this->session->userdata('user_id');
	}

	public function index()
	{	
		$data['content']      = 'vendor/dashboard';

		$data['total_product'] = count_any_table(array('available' => '1'), 'product');

		$users = get_any_table_row(array('id' => $this->session->userdata('user_id')), 'users');

		$data['store_name'] = $users['name'];

		$data['products'] = get_any_table_array(array('status' => '1', 'available' => '1'), 'product');

		$this->load->view('master-ui-vendor/main', $data);
	}

	public function manageProduct($data=false)
	{
		// code...
		$data['content'] = 'vendor/manage_product';
		// $data['add_script'] = 

		$data['products'] = get_any_table_array(array('status' => '1'), 'product');

		$this->load->view('master-ui-vendor/main', $data);
	}

	function addProduct($data=false)
	{
		$data['content'] = 'vendor/add_product';
		$this->load->view('master-ui-vendor/main', $data);
	}

	function doAddProduct($data=false)
	{
		$post = $this->input->post();
		// echo "<pre>"; print_r($post); echo "</pre>";

		$data_insert = array(
			'name' 		=> $post['name'],
			'price' 	=> $post['price'],
			'status' 	=> '1',
			'available' => '1',
		);

		$insert = insert_any_table($data_insert, 'product');

		if ($insert == true) {
			echo encode(array('status' => true, 'msg' => 'Product has been successfully added !'));
		} else {
			echo encode(array('status' => false, 'msg' => 'Failed to add !'));
		}
	}

	function disabled_product($data=false)
	{
		$id = $this->input->post('id');

		$product = get_any_table_row(array('id' => $id), 'product');

		$currentStatus = $product['available'];

		if ($currentStatus == '1') {
			$nextStatus = '0';
		} else {
			$nextStatus = '1';
		}

		$update_data = array('available' => $nextStatus);
		$where = array('id' => $id );

		$do_update = update_any_table($update_data, $where, 'product');

		if ($do_update == true) {
			echo encode(array('status' => true, 'msg' => 'Successfully Saved !'));
		} else {
			echo encode(array('status' => false, 'msg' => 'Failed To Saved !'));
		}
	}

	function editProduct($data=false)
	{
		$id = $this->input->post('id');

		$data['product'] = get_any_table_row(array('id' => $id), 'product');

		$this->load->view('vendor/modal-edit-product', $data);
	}

	function do_edit_product($data=false)
	{
		$post = $this->input->post();
		// echo "<pre>"; print_r($post); echo "</pre>";

		$data_update = array('name' => $post['name'], 'price' => $post['price']);
		$where = array('id' => $post['id']);

		update_any_table($data_update, $where, 'product');

		echo encode(array('status' => true, 'msg' => 'Successfully Update !'));

	}

	function delete_product($data=false)
	{
		$id = $this->input->post('id');


		$delete = delete_any_table(array('id' => $id), 'product');

		if ($delete == true) {
			echo encode(array('status' => true, 'msg' => 'Deleted !'));
		} else {
			echo encode(array('status' => false, 'msg' => 'Failed to delete !'));
		}
	}

	function logout()
	{	
		$this->session->sess_destroy();
		redirect();
	}

	function get_product_by_id($data=false)
	{
		$id = $this->input->post('id');

		$product = get_any_table_row(array('id' => $id), 'product');

		if ($product == true) {
			// code...



			echo encode(array('status' => true, 'price' => $product['price']));

		} else {
			echo encode(array('status' => false));
		}
	}

	function makePayment($data=false)
	{
		// data: {productid:productid,staffid:staffid,quantityid:quantityid},

		$post = $this->input->post();
		$productid = $post['productid'];
		$staffid = $post['staffid'];
		$quantityid = $post['quantityid'];

		$productData = get_any_table_row(array('id' => $productid), 'product');

		$productPrice1 = preg_replace('/[^0-9.]/', '', $productData['price']);

		$totalPayment = $productPrice1 * $quantityid;

		$getstaff = get_any_table_row(array('staff_id' => $staffid), 'ewallet_detail');

		if ($getstaff == false) {
			$response = array('status' => false, 'msg' => 'Staff ID not found !');
		} else {
			# if found ; check balance

			if ($getstaff['balance'] < $totalPayment) {
				$response = array('status' => false, 'msg' => 'Insufficient balance');
			} else {


				# do payment
				$balance = $getstaff['balance'];

				$nextBalance = $balance - $totalPayment;

				$updateBalance = array('balance' => $nextBalance);

				$whereBalance = array('staff_id' => $staffid);

				$update_this_balance = update_any_table($updateBalance, $whereBalance, 'ewallet_detail');

				# insert in transaction


				$checkTrans = get_any_table_row(array('staff_id' => $staffid, 'transaction_date' => current_date_year()), 'transaction');

				if ($checkTrans == true) {
					$totalTranToday = $totalPayment + $checkTrans['transaction_amount'];
					$updateTrans = array('transaction_amount' => $totalTranToday);
					update_any_table($updateTrans, array('staff_id' => $staffid), 'transaction');
				} else {
					$insertTrans = array('staff_id' => $staffid, 'transaction_amount' => $totalPayment, 'transaction_date' => current_date_year(), );

					insert_any_table($insertTrans, 'transaction');
				}

				if ($update_this_balance == true) {

					# insert log
					$log_data = array(
						'staff_id' => $staffid,
						'product_id' => $productid,
						'quantity' => $quantityid,
						'total_payment' => $totalPayment,
						'status' => 'PAID',
						'create_dt' => current_date(),
					);

					insert_any_table($log_data, 'transaction_history');

					$response = array('status' => true, 'msg' => 'Payment Success');
				} else {
					$response = array('status' => true, 'msg' => 'Payment Failed, please contact admin');
				}

				
			}


		}

		echo encode($response);


	}

	function saleTransaction($data=false)
	{
		$data['content'] = 'vendor/sale_transaction';
		// $data['add_script'] = 

		$data['logs'] = get_any_table_array(array('status' => 'PAID'), 'transaction_history');

		$this->load->view('master-ui-vendor/main', $data);
	}




}
