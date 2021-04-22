<?php

/**
 * 
 */
class Login_model extends CI_Model
{
	//fungsi cek login 
	function is_logged_in()
	{
		return $this->session->userdata('username');
	}

	function role()
	{
		return $this->session->userdata('id_role');
	}
			
}