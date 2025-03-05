<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Profile_model extends CI_Model {

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

    public function insertNewCertification($certification_data)
    {
        $this->db->insert("certifications", $certification_data);
        return true;
    }

	public function getQualifications($faculty_profile_id)
	{
		$this->db->where('faculty_profile_id', $faculty_profile_id);
        $query = $this->db->get('qualifications');
        return $query->result_array(); // Use row() to get a single row
	}

	public function getExperience($faculty_profile_id)
	{
		$this->db->where('faculty_profile_id', $faculty_profile_id);
        $query = $this->db->get('industry_experience');
        return $query->result_array(); // Use row() to get a single row
	}

    public function getCertifications($faculty_profile_id){
        $this->db->where('faculty_profile_id', $faculty_profile_id);
        $query = $this->db->get('certifications');
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

	public function updateProfile($logged_user_id, $basic_data)
	{
		$this->db->where('id', $logged_user_id);
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

    public function fetchCertifications($id)
    {  
        $this->db->where('id', $id);
        return $this->db->get('certifications')->row_array();
    }

    public function deleteCertification($certification_data)
    {
        $this->db->insert('certifications_bin', $certification_data);
        return $this->db->insert_id(); // Returns the ID of the inserted backup record
    }

    public function deleteAllDataByFacultyId($faculty_id)
    {
        // Delete qualifications
        $this->db->where('faculty_profile_id', $faculty_id)->delete('qualifications_bin');

        // Delete industry experience
        $this->db->where('faculty_profile_id', $faculty_id)->delete('industry_experience_bin');

        // Delete certifications
        $this->db->where('faculty_profile_id', $faculty_id)->delete('certifications_bin');
    }

    public function ViewQualificationPDF($id)
    {
        $this->db->select('qualification_attachment');
        $this->db->where('id', $id);
        $query = $this->db->get('qualifications');

        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }

    public function ViewCertificationPDF($id)
    {
        $this->db->select('certification_attachment');
        $this->db->where('id', $id);
        $query = $this->db->get('certifications');

        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }

    public function restoreQualifications($faculty_id, $file)
    {
        // You can restore the qualifications data from the backup files and any other fields you may want to reinstate
        $qualification_data = $this->Profile_model->fetchQualificationsFromBackup($faculty_id, $file);

        if ($qualification_data) {
            // Insert back into the qualifications table
            $this->db->insert('qualifications', $qualification_data);
        }
    }

    public function restoreCertifications($faculty_id, $file)
    {
        // You can restore the certifications data from the backup files and any other fields you may want to reinstate
        $certification_data = $this->Profile_model->fetchCertificationsFromBackup($faculty_id, $file);

        if ($certification_data) {
            // Insert back into the certifications table
            $this->db->insert('certifications', $certification_data);
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

    public function getQualificationsByID($id) {
        // Query to fetch the row by ID
        return $this->db
        ->where('id', $id)
        ->get('qualifications')
        ->row_array(); // Return a single row as an associative array
    }

    public function getExperienceByID($id) {
        // Query to fetch the row by ID
        return $this->db
        ->where('id', $id)
        ->get('industry_experience')
        ->row_array(); // Return a single row as an associative array
    }

    public function getCertificationsByID($id) {
        // Query to fetch the row by ID
        return $this->db
        ->where('id', $id)
        ->get('certifications')
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

    public function updateCertification($certifications_id, $certifications_data){
        $this->db->where('id', $certifications_id);
        $this->db->update('certifications', $certifications_data);
        return true;
    }

    public function backupTable($faculty_id) {
		$this->db->trans_start();

        // Backup existing qualifications
        $this->db->query("
            INSERT INTO qualifications_backup (id, faculty_profile_id, academic_degree, institution, year_graduated)
            SELECT id, faculty_profile_id, academic_degree, institution, year_graduated
            FROM qualifications
            WHERE faculty_profile_id = ?
        ", array($faculty_id));

        // Backup existing experience
        $this->db->query("
            INSERT INTO industry_experience_backup (id, faculty_profile_id, company_name, job_position, years_of_experience)
            SELECT id, faculty_profile_id, company_name, job_position, years_of_experience
            FROM industry_experience
            WHERE faculty_profile_id = ?
        ", array($faculty_id));

        // Backup existing certifications
        $this->db->query("
            INSERT INTO certifications_backup (id, faculty_profile_id, certification_name, certification_title, year_received, expiration_date, certification_attachment)
            SELECT id, faculty_profile_id, certification_name, certification_title, year_received, expiration_date, certification_attachment
            FROM certifications
            WHERE faculty_profile_id = ?
        ", array($faculty_id));

	 $this->db->trans_complete();
    }

    public function restoreTable($faculty_id) {
        // Clear current qualifications
        $this->db->query("DELETE FROM qualifications WHERE faculty_profile_id = ?", array($faculty_id));
        $this->db->query("DELETE FROM industry_experience WHERE faculty_profile_id = ?", array($faculty_id));
        $this->db->query("DELETE FROM certifications WHERE faculty_profile_id = ?", array($faculty_id));

        // Restore from backup
        $this->db->query("
            INSERT INTO qualifications (id, faculty_profile_id, academic_degree, institution, year_graduated)
            SELECT id, faculty_profile_id, academic_degree, institution, year_graduated
            FROM qualifications_backup
            WHERE faculty_profile_id = ?
        ", array($faculty_id));

        $this->db->query("
            INSERT INTO industry_experience (id, faculty_profile_id, company_name, job_position, years_of_experience)
            SELECT id, faculty_profile_id, company_name, job_position, years_of_experience
            FROM industry_experience_backup
            WHERE faculty_profile_id = ?
        ", array($faculty_id));

        $this->db->query("
            INSERT INTO certifications (id, faculty_profile_id, certification_name, certification_title, year_received, expiration_date,certification_attachment)
            SELECT id, faculty_profile_id, certification_name, certification_title, year_received, expiration_date,certification_attachment
            FROM certifications_backup
            WHERE faculty_profile_id = ?
        ", array($faculty_id));

        // Remove backup
        $this->db->query("DELETE FROM qualifications_backup WHERE faculty_profile_id = ?", array($faculty_id));
        $this->db->query("DELETE FROM industry_experience_backup WHERE faculty_profile_id = ?", array($faculty_id));
        $this->db->query("DELETE FROM certifications_backup WHERE faculty_profile_id = ?", array($faculty_id));
    }

    public function insertUpdatedTable($faculty_id) {
        $qualifications = $this->input->post('qualifications');
    
        if (is_array($qualifications)) {
            foreach ($qualifications as $qualification) {
                $qualifications_data = array(
                    'faculty_profile_id' => $faculty_id,
                    'academic_degree' => $qualification['academic_degree'],
                    'institution' => $qualification['institution'],
                    'year_graduated' => $qualification['year_graduated'],
                    'qualification_attachment' => $qualification['qualification_attachment'],
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

        $certifications = $this->input->post('certifications');

        if (is_array($certifications)) {
            foreach ($certifications as $certification) {
                $certifications_data = array(
                    'faculty_profile_id' => $faculty_id,
                    'certification_name' => $certification['certification_name'],
                    'certification_title' => $certification['certification_title'],
                    'year_received' => $certification['year_received'],
                    'expiration_date' => $certification['expiration_date'],
                    'certification_attachment' => $certification['certification_attachment'],
                );
                $this->db->insert('certifications', $certifications_data);
            }
        } else {
            log_message('error', 'No certifications data found for faculty ID: ' . $faculty_id);
        }

    }

    public function deleteBackup($faculty_id) {
        $this->db->query("DELETE FROM qualifications_backup WHERE faculty_profile_id = ?", array($faculty_id));
        $this->db->query("DELETE FROM industry_experience_backup WHERE faculty_profile_id = ?", array($faculty_id));
        $this->db->query("DELETE FROM certifications_backup WHERE faculty_profile_id = ?", array($faculty_id));
    }
}	