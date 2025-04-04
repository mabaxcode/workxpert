<?php

class Employer_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->db_user = "users";
    }

    function check_user_login($data)
    {
        $this->db->select('*');
        $this->db->where(array(
            'email'      => $data['email'], 
            'password'   => md5($data['password']),
            'user_type'  => '2',
        ));
        $query = $this->db->get($this->db_user);

        if($query->num_rows() > 0){ return $query->row_array(); } else { return false; }
    }

}