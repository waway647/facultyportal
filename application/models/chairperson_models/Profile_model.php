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

	public function getQualifications($faculty_profile_id)
	{
		$this->db->where('faculty_profile_id', $faculty_profile_id);
        $query = $this->db->get('Qualifications');
        return $query->result_array(); // Use row() to get a single row
	}

	public function getExperience($faculty_profile_id)
	{
		$this->db->where('faculty_profile_id', $faculty_profile_id);
        $query = $this->db->get('industry_experience');
        return $query->result_array(); // Use row() to get a single row
	}

	public function getResearch($faculty_profile_id)
	{
		$this->db->where('faculty_profile_id', $faculty_profile_id);
        $query = $this->db->get('research_outputs');
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
    
    public function fetchQualifications($id)
    {  
        $this->db->where('id', $id);
        return $this->db->get('qualifications')->row_array();
    }

            public function deleteQualifications($qualification_data)
            {
                $this->db->insert('qualifications_bin', $qualification_data);
                return $this->db->insert_id(); // Returns the ID of the inserted backup record
            }

    public function fetchExperience($id)
    {  
        $this->db->where('id', $id);
        return $this->db->get('industry_experience')->row_array();
    }


            public function deleteExperience($experience_data)
            {
                $this->db->insert('industry_experience_bin', $experience_data);
                return $this->db->insert_id(); // Returns the ID of the inserted backup record
            }

    public function fetchResearch($id)
    {  
        $this->db->where('id', $id);
        return $this->db->get('research_outputs')->row_array();
    }

            public function deleteResearch($research_data)
            {
                $this->db->insert('research_outputs_bin', $research_data);
                return $this->db->insert_id(); // Returns the ID of the inserted backup record
            }

    public function deleteAllDataByFacultyId($faculty_id)
    {
        // Delete qualifications
        $this->db->where('faculty_profile_id', $faculty_id)->delete('qualifications_bin');

        // Delete industry experience
        $this->db->where('faculty_profile_id', $faculty_id)->delete('industry_experience_bin');

        // Delete research outputs
        $this->db->where('faculty_profile_id', $faculty_id)->delete('research_outputs_bin');
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
        $query = $this->db->get('research_outputs');
        return $query->result_array(); // Use row() to get a single row
	}

    public function getCoverPhoto($faculty_profile_id)
	{
        $this->db->select('cover_photo');
		$this->db->where('faculty_profile_id', $faculty_profile_id);
        $query = $this->db->get('research_outputs');
        return $query->result_array(); // Use row() to get a single row
	}

    public function getQualificationsByID($id) 
    {
        // Query to fetch the row by ID
        return $this->db
        ->where('id', $id)
        ->get('qualifications')
        ->row_array(); // Return a single row as an associative array
    }

    public function getExperienceByID($id) 
    {
        // Query to fetch the row by ID
        return $this->db
        ->where('id', $id)
        ->get('industry_experience')
        ->row_array(); // Return a single row as an associative array
    }

    public function getResearchByID($id) 
    {
        // Query to fetch the row by ID
        return $this->db
        ->where('id', $id)
        ->get('research_outputs')
        ->row_array(); // Return a single row as an associative array
    }

    public function updateQualifications($qualifications_id, $qualifications_data)
	{
		$this->db->where('id', $qualifications_id);
		$this->db->update('qualifications', $qualifications_data);
		return true;
	}

    public function updateExperience($experience_id, $experience_data)
	{
		$this->db->where('id', $experience_id);
		$this->db->update('industry_experience', $experience_data);
		return true;
	}

    public function updateResearch($research_id, $research_data)
    {
        $this->db->where('id', $research_id);
        $this->db->update('research_outputs', $research_data);
        return $this->db->affected_rows() > 0;
    }

    public function backupTable($faculty_id) 
    {
        // Backup existing qualifications
        $this->db->query("
            INSERT INTO qualifications_backup (faculty_profile_id, academic_degree, institution, year_graduated)
            SELECT faculty_profile_id, academic_degree, institution, year_graduated
            FROM qualifications
            WHERE faculty_profile_id = ?
        ", array($faculty_id));

        // Backup existing experience
        $this->db->query("
            INSERT INTO industry_experience_backup (faculty_profile_id, company_name, job_position, years_of_experience)
            SELECT faculty_profile_id, company_name, job_position, years_of_experience
            FROM industry_experience
            WHERE faculty_profile_id = ?
        ", array($faculty_id));

         // Backup existing research_outputs
         $this->db->query("
         INSERT INTO research_outputs_backup (faculty_profile_id, title, publication_year, research_attachment)
         SELECT faculty_profile_id, title, publication_year, research_attachment
         FROM research_outputs
         WHERE faculty_profile_id = ?
     ", array($faculty_id));
    }

    public function restoreTable($faculty_id) 
    {
        // Clear current qualifications
        $this->db->query("DELETE FROM qualifications WHERE faculty_profile_id = ?", array($faculty_id));
        $this->db->query("DELETE FROM industry_experience WHERE faculty_profile_id = ?", array($faculty_id));
        $this->db->query("DELETE FROM research_outputs WHERE faculty_profile_id = ?", array($faculty_id));

        // Restore from backup
        $this->db->query("
            INSERT INTO qualifications (faculty_profile_id, academic_degree, institution, year_graduated)
            SELECT faculty_profile_id, academic_degree, institution, year_graduated
            FROM qualifications_backup
            WHERE faculty_profile_id = ?
        ", array($faculty_id));

        $this->db->query("
            INSERT INTO industry_experience (faculty_profile_id, company_name, job_position, years_of_experience)
            SELECT faculty_profile_id, company_name, job_position, years_of_experience
            FROM industry_experience_backup
            WHERE faculty_profile_id = ?
        ", array($faculty_id));

        $this->db->query("
            INSERT INTO research_outputs (faculty_profile_id, title, publication_year, research_attachment)
            SELECT faculty_profile_id, title, publication_year, research_attachment
            FROM research_outputs_backup
            WHERE faculty_profile_id = ?
        ", array($faculty_id));

        // Remove backup
        $this->db->query("DELETE FROM qualifications_backup WHERE faculty_profile_id = ?", array($faculty_id));
        $this->db->query("DELETE FROM industry_experience_backup WHERE faculty_profile_id = ?", array($faculty_id));
        $this->db->query("DELETE FROM research_outputs_backup WHERE faculty_profile_id = ?", array($faculty_id));
    }

    public function insertUpdatedTable($faculty_id) 
    {
        $qualifications = $this->input->post('qualifications');
    
        if (is_array($qualifications)) {
            foreach ($qualifications as $qualification) {
                $qualifications_data = array(
                    'faculty_profile_id' => $faculty_id,
                    'academic_degree' => $qualification['academic_degree'],
                    'institution' => $qualification['institution'],
                    'year_graduated' => $qualification['year_graduated'],
                );
                $this->db->insert('qualifications', $qualifications_data);
            }
        } else {
            log_message('error', 'No qualifications data found for faculty ID: ' . $faculty_id);
        }

        $experiences = $this->input->post('industry_experience');
    
        if (is_array($qualifications)) {
            foreach ($experiences as $experience) {
                $experiences_data = array(
                    'faculty_profile_id' => $faculty_id,
                    'company_name' => $experience['company_name'],
                    'job_position' => $experience['job_position'],
                    'years_of_experience' => $experience['years_of_experience'],
                );
                $this->db->insert('industry_experience', $experiences_data);
            }
        } else {
            log_message('error', 'No experiences data found for faculty ID: ' . $faculty_id);
        }

        $research_outputs = $this->input->post('research_outputs');
    
        if (is_array($research_outputs)) {
            foreach ($research_outputs as $research_output) {
                $research_outputs_data = array(
                    'faculty_profile_id' => $faculty_id,
                    'title' => $research_output['title'],
                    'publication_year' => $research_output['publication_year'],
                    'research_attachment' => $research_output['research_attachment'],
                );
                $this->db->insert('industry_experience', $research_outputs_data);
            }
        } else {
            log_message('error', 'No experiences data found for faculty ID: ' . $faculty_id);
        }
    }

    public function deleteBackup($faculty_id) 
    {
        $this->db->query("DELETE FROM qualifications_backup WHERE faculty_profile_id = ?", array($faculty_id));
        $this->db->query("DELETE FROM industry_experience_backup WHERE faculty_profile_id = ?", array($faculty_id));
        $this->db->query("DELETE FROM research_outputs_backup WHERE faculty_profile_id = ?", array($faculty_id));
    }

    public function deleteUser($user_id)    
    {
        $query = $this->db->delete('users', array('id' => $user_id));
        return $query;
    }

    public function deleteProfile($faculty_id)
    {
        $query = $this->db->delete('faculty_profiles', array('id' => $faculty_id));
        return $query;
    }

    public function deleteProfileInformation($faculty_id)
    {
        $profile_tables = array('certifications', 'consultations', 'courses', 'industry_experience', 'qualifications', 'research_outputs');
        $this->db->where('faculty_profile_id', $faculty_id);
        
        foreach ($profile_tables as $table) {
            $this->db->where('faculty_profile_id', $faculty_id);
            $this->db->delete($table);
        }

        return true;
    }
}