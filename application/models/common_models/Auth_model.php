<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Auth_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('common_models/Auth_model');
		$this->load->helper('url');
	}

	// Authenticating User Login
	public function checkCredentials($email, $pass)
	{
	// Fetch the user record based on the email or username
		$this->db->where('email', $email);
    	$query = $this->db->get('users');
		
		// Check if the email exists
        if ($query->num_rows() == 1) {
            // Get the user data
            $user = $query->row();

            // Directly compare the plain text password
            if ($user->pass === $pass) {
                return true; // Successful login
            }
        }
		
		/*
		// If user exists and password is correct
		if(isset($row)) {
			$decryptedPassword = $this->encryption->decrypt($row->pass);
			if($decryptedPassword == $pass){
			return $row;
			}
		} 
		else 
		{
			return false;
		}
		*/
	}

	public function getAccount($email)
	{
		$userinfo = $this->db->get_where("users_vw", array('email' => $email))->row();
        return $userinfo;
	}
}
