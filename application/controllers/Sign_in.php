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

        $this->load->model('Employer_model', 'dbEmployer');
	}


	public function index()
	{
		$this->load->view('sign_in');
	}

	function employer_sign_in($data=false)
	{
		$this->load->view('employer_sign_in');
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

	function register_employer($data=false)
	{
		$post = $this->input->post();

		// print_r($post);

		$register_data = array(
			'name' => $post['name'],
			'password' => md5($post['password']),
			'user_type' => '2', // employer 
			'create_dt' => current_date(),
			'status' => '1',
			'email' => $post['email'],
		);

		$insert = insert_any_table($register_data, 'users');

		if ($insert == true) {
			$this->session->set_flashdata('success', 'Employer account successfully created!');
		} else {
			$this->session->set_flashdata('error', 'Something went wrong!');
		}

		redirect('sign_in/employer_sign_in');
	
	}

	function login_employer($data=false)
	{
		$data = $this->input->post();
		// print_r($data); exit();
		$user_login = $this->dbEmployer->check_user_login($data);

		if ($user_login == false) {

			// authLog($data['username'], 'Username or password wrong', 'login');
			$this->session->set_flashdata('login_failed', 'Sorry, the username or password is incorrect, please try again.');
			redirect('sign_in/employer_sign_in');
			exit;

		} else {

			// if ($user_login['active'] <> '1') {
			// 	$this->session->set_flashdata('info', 'Your account is currently inactive. Please contact Admin for further assistance.');
			// 	redirect();
			// 	exit;
			// }

			$sess_data = array(
				'user_id' 	=> $user_login['id'],
				'name' 	  	=> $user_login['name'],
				'email' 	=> $user_login['email'],
				'user_type' => $user_login['user_type'],
			);

			$this->session->set_userdata($sess_data);
			// $this->dbEmployer->update_last_login($user_login['id']);

			// authLog($data['username'], 'Successfully Login', 'login');
			// if ($user_login['user_type'] == '1') {
				redirect('employer');
			// } 
			// elseif ($user_login['user_type'] == '2') {
			// 	redirect('vendor');
			// } else {
			// 	redirect('admin');
			// }
			
			
		}

	}

}
