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

        // $this->user_id = $this->session->userdata('user_id');

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

		$user_id = $this->session->userdata('user_id');

		$data['user'] = get_any_table_row(array('id' => $user_id, 'user_type' => '1'), 'users'); 
		$data['personal'] = get_any_table_row(array('user_id' => $user_id), 'personal_detail'); 
		$data['education'] = get_any_table_row(array('user_id' => $user_id), 'education_detail'); 

		$data['skills'] = get_any_table_array(array('user_id' => $user_id), 'skill_details'); 

		// echo "<pre>"; print_r($data['user']); echo "</pre>"; exit;

		$this->load->view('profile', $data);
	}

	function save_personal($data=false)
	{
		$post = $this->input->post();

		$user_id = $post['user_id'];

		// echo "<pre>"; print_r($post); echo "</pre>";

		# users
		$users = array('name' => $post['name'], 'email' => $post['email']);
		update_any_table($users, array('id' => $user_id, 'user_type' => '1'), 'users');

		# personal
		// $personal = array(
		// 	'age' => $post['age'], 
		// 	'gender' => $post['gender'],
		// 	'user_id' => $user_id,
		// 	'phone_no' => $post['phone_no'],
		// 	'address' => $post['address'],
		// );
		 // echo "<pre>"; print_r($personal); echo "</pre>"; exit;

		$get_personal = get_any_table_row(array('user_id' => $user_id), 'personal_detail');

		if ( ! $get_personal) {
			$personal_insert = array(
				'age' => $post['age'], 
				'gender' => $post['gender'],
				'user_id' => $user_id,
				'phone_no' => $post['phone_no'],
				'address' => $post['address'],
				'is_completed' => 'Y',
			);
			// echo "<pre>"; print_r($personal_insert); echo "</pre>"; exit;
			insert_any_table($personal_insert, 'personal_detail');
		} else {
			$personal_update = array(
				'age' => $post['age'], 
				'gender' => $post['gender'],
				'phone_no' => $post['phone_no'],
				'address' => $post['address'],
				'is_completed' => 'Y',
			);
			// echo "<pre>"; print_r($post); echo "</pre>"; exit;
			update_any_table($personal_update, array('user_id' => $user_id), 'personal_detail');

		}

		$this->session->set_flashdata('sucess_save', 'Personal details has been successfully saved!');
		redirect('main/profile');

		
	}

	function save_education($data=false)
	{
		$post = $this->input->post();

		// echo "<pre>"; print_r($post); echo "</pre>"; exit;

		$user_id = $post['user_id'];

		$get_edu = get_any_table_row(array('user_id' => $user_id), 'education_detail');

		if ($get_edu) {
			// code...update

			$edu_update = array(
				'university' => $post['university'], 
				'level' => $post['level'],
				'field' => $post['field'],
				'year' => $post['year'],
				'cgpa' => $post['cgpa'],
				'is_completed' => 'Y',
			);

			update_any_table($edu_update, array('user_id' => $user_id), 'education_detail');

		} else {
			// insert

			$edu_insert = array(
				'university' => $post['university'], 
				'level' => $post['level'],
				'field' => $post['field'],
				'year' => $post['year'],
				'cgpa' => $post['cgpa'],
				'is_completed' => 'Y',
				'user_id' => $user_id,
			);
			// echo "<pre>"; print_r($edu_insert); echo "</pre>"; exit;

			insert_any_table($edu_insert, 'education_detail');
		}

		$this->session->set_flashdata('sucess_save', 'Education details has been successfully saved!');
		redirect('main/profile');
	}

	function save_skill($data=false)
	{
		$post = $this->input->post();

		// echo "<pre>"; print_r($post); echo "</pre>"; exit;

		$insert_skill = array('user_id' => $post['user_id'], 'skill' => $post['skill'], 'level' => $post['level']);

		insert_any_table($insert_skill, 'skill_details');

		$this->session->set_flashdata('skill_saved', 'Skill details has been successfully saved!');
		redirect('main/profile');
	}


}
