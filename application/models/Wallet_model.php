<?php

class Wallet_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->db_wallet = "ewallet_detail";
    }

    function get_wallet_data($staff_id)
    {
        // Sanitize user_id to ensure it's an integer (security best practice)
        // $user_id = (int)$user_id;

        $currentMonth = date('m');
        $currentYear = date('Y'); 

        // Use CodeIgniter's Query Builder to fetch the data
        $this->db->select('transaction_amount, transaction_date');  // Specify the columns you want
        $this->db->from('transaction');  // Specify the table
        $this->db->where('MONTH(transaction_date)', $currentMonth); // Filter by month (December)
        $this->db->where('YEAR(transaction_date)', $currentYear); // Filter by year (2024)
        $this->db->where('staff_id', $staff_id);  // Apply the WHERE condition
        $this->db->order_by('transaction_date', 'DESC');  // Order by transaction_date descending

        // Execute the query and return the result as an array
        $query = $this->db->get();

        // Check if any rows are returned and return the result
        if ($query->num_rows() > 0) {
            return $query->result_array();  // Return results as an associative array
        } else {
            return [];  // Return an empty array if no data found
        }
    }

    function get_total_current_month_trans($staff_id)
    {   

        $currentMonth = date('m');
        $currentYear = date('Y'); 

        $this->db->select('*'); // Select all columns
        $this->db->from('transaction'); // Replace with your table name

        // Assuming the transaction date is stored in a column like 'transaction_date' in 'Y-m-d' format
        $this->db->where('MONTH(transaction_date)', $currentMonth); // Filter by month (December)
        $this->db->where('YEAR(transaction_date)', $currentYear); // Filter by year (2024)
        $this->db->where('staff_id', $staff_id); // Filter by year (2024)

        $query = $this->db->get(); // Execute the query

        // return $this->db->last_query(); exit();

        // Check if data exists
        if ($query->num_rows() > 0) {
            $transactions = $query->result_array(); // Fetch the result as an associative array
        } else {
            $transactions = []; // No data found
        }

        return $transactions;

    }

    function get_trans_this_month($staff_id, $month, $year)
    {
        $this->db->select('*'); // Select all columns
        $this->db->from('transaction'); // Replace with your table name

        // Assuming the transaction date is stored in a column like 'transaction_date' in 'Y-m-d' format
        $this->db->where('MONTH(transaction_date)', $month); // Filter by month (December)
        $this->db->where('YEAR(transaction_date)', $year); // Filter by year (2024)
        $this->db->where('staff_id', $staff_id); // Filter by year (2024)

        $query = $this->db->get(); // Execute the query

        if ($query->num_rows() > 0) {

            $transactions = $query->result_array();

            $totalTrans = 0;

            foreach ($transactions as $key) {
                $totalTrans = $totalTrans + $key['transaction_amount'];
            }

            return $totalTrans;

        } else {
            return '0';
        }    

        // return $this->db->last_query(); exit();

        // // Check if data exists
        // if ($query->num_rows() > 0) {
        //     $transactions = $query->result_array(); // Fetch the result as an associative array
        // } else {
        //     $transactions = []; // No data found
        // }

        // return $transactions;
    }

}