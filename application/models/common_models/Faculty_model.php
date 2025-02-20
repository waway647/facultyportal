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

	public function getFaculty() 
	{
		$query = $this->db->get('faculty_full_name_vw');
		return $query->result_array();
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
