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
		$this->db->insert("qualifications_temp", $qualification_data);
		return true;
	}
	
	public function insertNewExperience($experience_data)
	{
		$this->db->insert("industry_experience_temp", $experience_data);
		return true;
	}

	public function insertNewResearch($research_data)
	{
		$this->db->insert("research_outputs_temp", $research_data);
		return true;
	}

	public function getQualifications($faculty_profile_id)
	{
		$this->db->where('faculty_profile_id', $faculty_profile_id);
        $query = $this->db->get('Qualifications_vw');
        return $query->result_array(); // Use row() to get a single row
	}

	public function getExperience($faculty_profile_id)
	{
		$this->db->where('faculty_profile_id', $faculty_profile_id);
        $query = $this->db->get('industry_experience_vw');
        return $query->result_array(); // Use row() to get a single row
	}

	public function getResearch($faculty_profile_id)
	{
		$this->db->where('faculty_profile_id', $faculty_profile_id);
        $query = $this->db->get('research_outputs_vw');
        return $query->result_array(); // Use row() to get a single row
	}

	public function getUserIdByFacultyProfileId($faculty_profile_id)
    {
        $this->db->select('user_id');
        $this->db->where('id', $faculty_profile_id);
        $query = $this->db->get('faculty_profiles');
        $result = $query->row_array();
        return $result ? $result['user_id'] : null;
    }

	public function updateProfile($user_id, $basic_data)
	{
		$this->db->where('id', $user_id);
		$this->db->update('users', $basic_data);
		return true;
	}

	public function insertQualifications($faculty_profile_id)
	{
		// Start a transaction to ensure data integrity
        $this->db->trans_start();

        // Insert data from qualifications_temp into qualifications for the given faculty_profile_id
        $this->db->query("
            INSERT INTO qualifications (faculty_profile_id, academic_degree, institution, year_graduated)
            SELECT faculty_profile_id, academic_degree, institution, year_graduated
            FROM qualifications_temp
            WHERE faculty_profile_id
        ", array($faculty_profile_id));

        // Delete the same data from qualifications_temp after insertion
        $this->db->query("
            DELETE FROM qualifications_temp
            WHERE faculty_profile_id
        ", array($faculty_profile_id));

        // Complete the transaction
        $this->db->trans_complete();

        // Check if there was an error during the transaction
        if ($this->db->trans_status() === FALSE) {
            // If the transaction failed, return an error
            log_message('error', 'Failed to save and delete changes.');
            return false;
        }

        return true;
	}

	public function insertIndustryExperience($faculty_profile_id)
	{
		// Start a transaction to ensure data integrity
        $this->db->trans_start();

        // Insert data from qualifications_temp into qualifications for the given faculty_profile_id
        $this->db->query("
            INSERT INTO industry_experience (faculty_profile_id, company_name, job_position, years_of_experience)
            SELECT faculty_profile_id, company_name, job_position, years_of_experience
            FROM industry_experience_temp
            WHERE faculty_profile_id
        ", array($faculty_profile_id));

        // Delete the same data from qualifications_temp after insertion
        $this->db->query("
            DELETE FROM industry_experience_temp
            WHERE faculty_profile_id
        ", array($faculty_profile_id));

        // Complete the transaction
        $this->db->trans_complete();

        // Check if there was an error during the transaction
        if ($this->db->trans_status() === FALSE) {
            // If the transaction failed, return an error
            log_message('error', 'Failed to save and delete changes.');
            return false;
        }

        return true;
	}
}