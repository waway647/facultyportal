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

    public function insertResearchOutputs($faculty_profile_id)
	{
		// Start a transaction to ensure data integrity
        $this->db->trans_start();

        // Insert data from qualifications_temp into qualifications for the given faculty_profile_id
        $this->db->query("
            INSERT INTO research_outputs (faculty_profile_id, title, publication_year, research_attachment)
            SELECT faculty_profile_id, title, publication_year, research_attachment
            FROM research_outputs_temp
            WHERE faculty_profile_id
        ", array($faculty_profile_id));

        // Delete the same data from qualifications_temp after insertion
        $this->db->query("
            DELETE FROM research_outputs_temp
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
    
    public function fetchQualifications_temp($id)
    {  
        $this->db->where('id', $id);
        return $this->db->get('qualifications_temp')->row_array();
    }

            public function fetchQualifications_main($id)
            {  
                $this->db->where('id', $id);
                return $this->db->get('qualifications')->row_array();
            }


            public function deleteQualifications_temp($qualification_data)
            {
                $this->db->insert('qualifications_bin', $qualification_data);
                return $this->db->insert_id(); // Returns the ID of the inserted backup record
            }

            public function deleteQualifications_main($qualification_data)
            {  
                $this->db->insert('qualifications_bin', $qualification_data);
                return $this->db->insert_id();
            }

    public function fetchExperience_temp($id)
    {  
        $this->db->where('id', $id);
        return $this->db->get('industry_experience_temp')->row_array();
    }

            public function fetchExperience_main($id)
            {  
                $this->db->where('id', $id);
                return $this->db->get('industry_experience')->row_array();
            }


            public function deleteExperience_temp($experience_data)
            {
                $this->db->insert('industry_experience_bin', $experience_data);
                return $this->db->insert_id(); // Returns the ID of the inserted backup record
            }

            public function deleteExperience_main($experience_data)
            {  
                $this->db->insert('industry_experience_bin', $experience_data);
                return $this->db->insert_id();
            }

    public function fetchResearch_temp($id)
    {  
        $this->db->where('id', $id);
        return $this->db->get('research_outputs_temp')->row_array();
    }

            public function fetchResearch_main($id)
            {  
                $this->db->where('id', $id);
                return $this->db->get('research_outputs')->row_array();
            }


            public function deleteResearch_temp($research_data)
            {
                $this->db->insert('research_outputs_bin', $research_data);
                return $this->db->insert_id(); // Returns the ID of the inserted backup record
            }

            public function deleteResearch_main($research_data)
            {  
                $this->db->insert('research_outputs_bin', $research_data);
                return $this->db->insert_id();
            }

   

    public function deleteAllDataByFacultyId($faculty_id)
    {
        // Delete qualifications
        $this->db->where('faculty_profile_id', $faculty_id)->delete('qualifications_temp');

        // Delete industry experience
        $this->db->where('faculty_profile_id', $faculty_id)->delete('industry_experience_temp');

        // Delete research outputs
        $this->db->where('faculty_profile_id', $faculty_id)->delete('research_outputs_temp');
    }

    public function ViewResearchPDF($id)
    {
        $this->db->select('research_attachment');
        $this->db->where('id', $id);
        $query = $this->db->get('research_outputs');

        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }

    public function restoreResearchOutput($faculty_id, $file)
    {
        // You can restore the research data from the backup files and any other fields you may want to reinstate
        $research_data = $this->Profile_model->fetchResearchDataFromBackup($faculty_id, $file);

        if ($research_data) {
            // Insert back into the research_outputs table
            $this->db->insert('research_outputs', $research_data);
        }
    }

    public function getProfilePic($faculty_profile_id)
	{
        $this->db->select('profile_picture');
		$this->db->where('faculty_profile_id', $faculty_profile_id);
        $query = $this->db->get('research_outputs_vw');
        return $query->result_array(); // Use row() to get a single row
	}

    public function insertNewProfilePic($user_data)
	{
		$this->db->insert("research_outputs_temp", $user_data);
		return true;
	}
}