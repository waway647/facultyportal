<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Profile_model extends CI_Model {

	public function getFacultyProfile($id) 
	{
		$this->db->where('id', $id);
        $query = $this->db->get('faculty_profiles_vw');
        return $query->row(); // Use row() to get a single row
	}

	public function insertNewQualification($qualification_data)
	{
		$this->db->insert("qualifications", $qualification_data);
		return true;
	}
	
	public function insertNewExperience($experience_data)
	{
		$this->db->insert("industry_experience", $experience_data);
		return true;
	}

	public function insertNewResearch($research_data)
	{
		$this->db->insert("research_outputs", $research_data);
		return true;
	}
}