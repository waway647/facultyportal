<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Profile_model extends CI_Model {

	public function getFacultyProfile($email) 
	{
		$this->db->where('email', $email);
        $query = $this->db->get('faculty_profiles_vw');
        return $query->row(); // Use row() to get a single row
	}
}