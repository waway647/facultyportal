<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class FacultyManagement_model extends CI_Model {

	public function getUserProfiles() {
		$query = $this->db->get('faculty_profiles_vw');
		return $query->result_array();
	}

	public function saveUserData($user_data)
	{
		$this->db->insert("users", $user_data);
		return $this->db->insert_id();
	}

	public function getUserIdByEmail($email)
	{
		// Retrieve the user ID based on the email address
		$this->db->select("id");
		$this->db->from("users");
		$this->db->where("email", $email); // Assuming email is unique
		$query = $this->db->get();
		
		// If a matching user is found, return the user ID
		if ($query->num_rows() > 0) {
			return $query->row()->id;
		}
		
		// If no matching user is found, return false
		return false;
	}

	public function saveFacultyProfileData($facultyProfile_data)
	{
		$this->db->insert("faculty_profiles",$facultyProfile_data);
		return true;
	}

	public function countAllFaculty()
	{
		$query = $this->db->count_all('faculty_profiles_vw');
		return $query;
	}

	public function isEmailExists($email)
	{
		$query = $this->db->get_where('users', array('email' => $email)); // Replace 'users' with your table name
		return $query->num_rows() > 0; // Return true if email exists
	}

}
