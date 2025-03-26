<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign_in extends CI_Controller {


	function __construct()
	{
        parent::__construct();

        // if ($this->session->userdata('user_id')) {
        // 	// redirect('app');
        // 	if ($this->session->userdata('user_type') == "1") {
        // 		// code...
        // 		redirect('staff');
        // 	} elseif ($this->session->userdata('user_type') == "2") {
        // 		// code...
        // 		redirect('vendor');
        // 	} else {
        // 		redirect('admin');
        // 	}
        // }

        // $this->load->model('Main_model', 'main');
	}


	public function index()
	{
		$this->load->view('sign_in');
	}

	function register($data=false)
	{
		$post = $this->input->post();

		// print_r($post);

		$register_data = array(
			'name' => $post['name'],
			'password' => md5($post['password']),
			'user_type' => '1', // student 
			'create_dt' => current_date(),
			'status' => '1',
			'student_id' => $post['student_id'],
			'email' => $post['email'],
		);

		$insert = insert_any_table($register_data, 'users');

		if ($insert == true) {
			$this->session->set_flashdata('success', 'Account successfully created!');
		} else {
			$this->session->set_flashdata('error', 'Something went wrong!');
		}

		redirect('sign_in');
	
	}

}
