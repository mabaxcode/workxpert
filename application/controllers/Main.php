<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


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

        $this->load->model('Main_model', 'main');
	}


	public function index()
	{
		$this->load->view('portal');
	}

	function sign_in($data=false)
	{
		$this->load->view('sign_in', $data);
	}


	function login($data=false)
	{
		$data = $this->input->post();
		// print_r($data); exit();
		$user_login = $this->main->check_user_login($data);

		if ($user_login == false) {

			// authLog($data['username'], 'Username or password wrong', 'login');
			$this->session->set_flashdata('login_failed', 'Sorry, the username or password is incorrect, please try again.');
			redirect('sign_in');
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
			// $this->main->update_last_login($user_login['id']);

			// authLog($data['username'], 'Successfully Login', 'login');
			if ($user_login['user_type'] == '1') {
				redirect();
			} 
			// elseif ($user_login['user_type'] == '2') {
			// 	redirect('vendor');
			// } else {
			// 	redirect('admin');
			// }
			
			
		}

	}

	public function profile($data=false)
	{
		$this->load->view('profile', $data);
	}


}
