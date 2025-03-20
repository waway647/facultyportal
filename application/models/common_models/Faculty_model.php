<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Faculty_model extends CI_Model {
	public function getFacultyProfile($id) 
	{
		$this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row(); // Use row() to get a single row
	}

	public function getFacultyProfileUsers($faculty_id) 
	{
		$this->db->where('id', $faculty_id);
        $query = $this->db->get('faculty_profiles_vw');
        return $query->row(); // Use row() to get a single row
	}

	public function getFacultyNames() 
	{
	/* 	$this->db->select('id, full_name, email, role_name'); // Select all relevant columns
		$this->db->where('role_name', 'Faculty'); // Filter for role_name = 'Faculty' */
		$query = $this->db->get('faculty_full_name_vw');
		return $query->result_array();
	}

	public function getUserAddress($faculty_id) {
    $this->db->where('faculty_profile_id', $faculty_id);
    $query = $this->db->get('address');
    return $query->row(); // Return a single row as an object, or null if no row is found
	}

	public function changeProfilePic($logged_id, $data)
	{
		$this->db->set('profile_picture', $data['profile_picture']);
		$this->db->where('id', $logged_id);
		$this->db->update('users');
		return true;
	}

	public function updateProfile($user_id, $user_data)
	{
		$this->db->where('id', $user_id);
		$query = $this->db->update('users', $user_data);
		return $query;
	}

	public function checkAddressIfExisting($user_id) {
		$this->db->where('faculty_profile_id', $user_id);
		$query = $this->db->get('address');
		return $query->num_rows() > 0;
	}

	public function createAddress($user_data){
		$query = $this->db->insert('address', $user_data);
		return $query;
	}

	public function updateAddress($faculty_id, $user_data){
		$this->db->where('faculty_profile_id', $faculty_id);
		$query = $this->db->update('address', $user_data);
		return $query;
	}

	public function getFaculty($faculty_id) {
		$this->db->where('id', $faculty_id);
		$query = $this->db->get('faculty_full_name_vw');
		$data = $query->row_array(); // Single row as array
		return [
			'full_name' => $data['full_name'], // Adjust key based on your DB
			'email' => $data['email']          // Ensure email is in the view/table
		];
	}

	public function getFacultyID($logged_user_id)
	{
		$query = $this->db->select('id')
						->where('user_id', $logged_user_id)
						->get('faculty_profiles');

		$result = $query->row_array(); // Fetch the first row as an associative array
		return $result ? $result['id'] : null; // Return the ID if found, otherwise return null
	}
}
