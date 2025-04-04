<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {


	function __construct()
	{
        parent::__construct();
	}


	public function destroy_sess()
	{
		$this->session->sess_destroy(); // Destroy all session data
    	redirect(); // Redirect to the login page
	}

}
