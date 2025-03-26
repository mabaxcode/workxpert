<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        // if ($this->session->userdata('user_id') && $this->session->userdata('user_type') <> '1') {
        // 	redirect();
        // }

        $this->load->model('Wallet_model', 'DbWallet');
        // $this->users_table  = 'users';
        // $this->user_id = $this->session->userdata('user_id');
	}

	public function index()
	{	
		$data['content']  = 'staff/dashboard';

		$data['staffdata'] = get_any_table_row(array('user_id' => $this->session->userdata('user_id')), 'staff_details');

		$data['walletdata'] = get_any_table_row(array('user_id' => $this->session->userdata('user_id')), 'ewallet_detail');


		$data['current_trans'] = $this->DbWallet->get_total_current_month_trans($data['staffdata']['staff_id']);
		// echo $this->session->userdata('user_id');

		// echo $data['staffdata']['staff_id'];

		// print_r($data['current_trans']); exit;

		$data['currentMonthName'] = date('F');

		if ($data['current_trans']) {
			// code...
			$totalCurr = 0;
			foreach ($data['current_trans'] as $key) {
				$totalCurr = $totalCurr + $key['transaction_amount'];
			}

			$data['total_current'] = $totalCurr;

		} else {
			$data['total_current'] = "0";
		}

		$this->load->view('master-ui-staff/main', $data);
	}

	public function manageStaff($data=false)
	{
		// code...
		// $data['content'] = 'staff/manage_staff';
		$this->load->view('master-ui-staff/main', $data);
	}

	function logout()
	{	
		$this->session->sess_destroy();
		redirect();
	}

	function current_month_transaction()
	{

		/*

		// Set the start date as the first day of the current month
		$startDate = date('Y-m-01');  // e.g., 2024-12-01 if run in December 2024, 2025-01-01 if run in January 2025

		// Get today's date
		$currentDate = date('Y-m-d');  // Gets today's date in 'YYYY-MM-DD' format

		// Convert the start date and current date into DateTime objects
		$start = new DateTime($startDate);
		$end = new DateTime($currentDate);

		// Create an array to hold the dates
		$dates = [];

		// Loop from start date to current date
		while ($start <= $end) {
		    // Add the current date to the array
		    $dates[] = $start->format('Y-m-d');
		    
		    // Increment the date by one day
		    $start->modify('+1 day');
		}

		// Print the resulting array of dates
		//print_r($dates);

		$chartData = [
		    34.5, 34.75, 35.1
		];

		$walletTransactions = $this->DbWallet->get_wallet_data('EW-2');

		$populateTransaction = [];

		if (!empty($walletTransactions)) {

			foreach ($walletTransactions as $key) {
				$populateTransaction[] = $key['transaction_amount'];
			}

		}

		header('Content-Type: application/json');

		// Get current month and year
		$currentMonth = date('m'); // Current month (01-12)
		$currentYear  = date('Y'); // Current year

		// Example data (You can replace this with your database query)
		$data = [
		    'chartData' => $populateTransaction,
		    'categories' => $dates,
		];

		// Convert the categories to "Apr 02" format
		$categories = array_map(function($date) {
		    return date('j', strtotime($date)); // Format as "Apr 02"
		}, $data['categories']);

		$data['categories'] = $categories;

		// Return the data as JSON
		echo json_encode($data);

		*/

		$staff_detail = get_any_table_row(array('user_id' => $this->session->userdata('user_id')), 'staff_details');

		$walletTransactions = $this->DbWallet->get_wallet_data($staff_detail['staff_id']);

		$populateTransaction = [];

		// Assuming you have a list of dates for the current month, for example:
		$dates = [];
		for ($day = 1; $day <= 31; $day++) {
		    $dates[] = str_pad($day, 2, '0', STR_PAD_LEFT); // '01', '02', ..., '31'
		}

		// Initialize all transaction amounts to 0
		$transactionData = array_fill(0, count($dates), 0);

		// Map wallet transactions to specific dates
		if (!empty($walletTransactions)) {
		    foreach ($walletTransactions as $transaction) {
		        // Assuming 'transaction_date' is in format 'Y-m-d' (e.g., '2024-12-03')
		        $transactionDate = date('d', strtotime($transaction['transaction_date'])); // Extract day from transaction date
		        // Set the transaction amount for the specific day
		        $key = array_search($transactionDate, $dates);
		        if ($key !== false) {
		            $transactionData[$key] = $transaction['transaction_amount'];
		        }
		    }
		}

		header('Content-Type: application/json');

		// Get current month and year
		$currentMonth = date('m'); // Current month (01-12)
		$currentYear  = date('Y'); // Current year

		// Example data (You can replace this with your database query)
		$data = [
		    'chartData' => $transactionData, // Populate with updated transaction data
		    'categories' => $dates,          // Categories representing the days of the month
		];

		echo json_encode($data); // Output the final result as JSON


	}

	function monthly_spending($data=false)
	{	

		$staffdata = get_any_table_row(array('user_id' => $this->session->userdata('user_id')), 'staff_details');

		

		$month = array('01','02','03','04','05','06','07','08','09','10','11','12');

		// $month = array('01','02','03','04');

		$monthNames = array(
		    '01' => 'January',
		    '02' => 'February',
		    '03' => 'March',
		    '04' => 'April',
		    '05' => 'May',
		    '06' => 'June',
		    '07' => 'July',
		    '08' => 'August',
		    '09' => 'September',
		    '10' => 'October',
		    '11' => 'November',
		    '12' => 'December'
		);

		$currentYear  = date('Y');

		$countriesData = [];

		foreach ($month as $key) {

			$trans = $this->DbWallet->get_trans_this_month($staffdata['staff_id'], $key, $currentYear);

			if ( !$trans) {
				$trans = 0;
			}

			$countriesDatax[] = array(
				'country' => $monthNames[$key],
				'visits'  => $trans,
			);


		}

		header('Content-Type: application/json');

		// Example server-side data (this could be from a database query)
		// $countriesData = [
		//     ["country" => "US", "visits" => 1],
		//     ["country" => "UK", "visits" => 4],
		// ];

		// echo "<pre>"; print_r($countriesData); echo "</pre>"; exit;

		// Output the data as JSON
		echo json_encode($countriesDatax);

	}

	function myProfile($data=false)
	{
		$data['content'] = 'staff/my_profile';
		$data['profile'] = get_any_table_row(array('user_id' => $this->session->userdata('user_id')), 'staff_details');	

		$this->load->view('master-ui-staff/main', $data);
	}

	function setting($data=false)
	{
		$data['content'] = 'staff/profile_setting';
		$data['user'] = get_any_table_row(array('user_id' => $this->session->userdata('user_id')), 'staff_details');	


		$this->load->view('master-ui-staff/main', $data);
	}

	function history($data=false)
	{
		$data['content'] = 'staff/history';
		// $data['add_script'] = 


		// $staffdata = get_any_table_row(array('user_id' => $this->session->userdata('user_id')), 'staff_details');

		$data['staffdata'] = get_any_table_row(array('user_id' => $this->session->userdata('user_id')), 'staff_details');

		// print_r($staffdata); exit;

		$data['logs'] = get_any_table_array(array('status' => 'PAID', 'staff_id' => $data['staffdata']['staff_id']), 'transaction_history');

		$this->load->view('master-ui-staff/main', $data);
	}
}
