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
}
