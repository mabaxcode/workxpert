<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer extends CI_Controller {


	function __construct()
	{
        parent::__construct();

        $this->load->model('Employer_model', 'dbEmployer');
	}
	
	public function index($value='')
	{
		$user_id = $this->session->userdata('user_id');

		// code...
		$data['content']      = 'employer/dashboard';

		// $data['total_staff']  = count_any_table(array('user_type' => '1', 'status' => '2'), 'users');
		// $data['total_vendor'] = count_any_table(array('user_type' => '2', 'status' => '2'), 'users');

		$data['posts'] = get_any_table_row(array('employer' => $user_id), 'post_job');

		$data['opens'] = get_any_table_array(array('employer' => $user_id, 'status' => 'OPEN'), 'post_job');
		$data['closes'] = get_any_table_array(array('employer' => $user_id, 'status' => 'CLOSE'), 'post_job');

		$this->load->view('master-ui-employer/main', $data);
	}

	public function get_cities() 
	{
	    $state = $this->input->get('state');

	    $cities = [
	        'Sarawak' => ['Kuching', 'Miri', 'Sibu', 'Bintulu', 'Limbang', 'Sarikei', 'Sri Aman', 'Kapit', 'Bau', 'Mukah'],
	        'Sabah'   => ['Kota Kinabalu', 'Sandakan', 'Tawau', 'Lahad Datu', 'Kudat', 'Ranau', 'Beaufort', 'Keningau', 'Semporna', 'Putatan'],
	    ];

	    $result = isset($cities[$state]) ? $cities[$state] : [];

	    echo json_encode($result);
	}

	function create_new_post($data=false)
	{
		$post = $this->input->post();

		// echo "<pre>"; print_r($post); echo "</pre>"; exit;

		$user_id = $this->session->userdata('user_id');

		$insert_data = array(
			'title' => $post['title'], 
			'state' => $post['state'], 
			'city' => $post['city'], 
			'allowance' => $post['allowance'],
			'create_dt' => current_date(),
			'job_desc' => $post['job_desc'],
			'requirement' => $post['requirement'],
			'status' => 'OPEN',
			'employer' => $user_id,
		);

		$insert = insert_any_table($insert_data, 'post_job');

		if ($insert == true) {
			echo encode(array('status' => true, 'msg' => 'Success, Post has been created!'));
		} else {
			echo encode(array('status' => false, 'msg' => 'Failed to create !'));
		}
	}

}
