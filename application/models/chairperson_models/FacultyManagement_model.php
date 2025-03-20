<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class FacultyManagement_model extends CI_Model {

    public function getUserProfiles($search, $faculty_role_name) 
    {
        $this->db->where('role_name', $faculty_role_name);
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('first_name', $search);
            $this->db->or_like('last_name', $search); 
            $this->db->or_like('middle_name', $search);
            $this->db->or_like('department', $search);
            $this->db->or_like('email', $search);
            $this->db->or_like('mobile_number', $search);
            $this->db->or_like('age', $search);
            $this->db->group_end();
        }
        $query = $this->db->get('faculty_profiles_vw');
        return $query->result_array(); // Fixed to return array
    }

    public function fetchCoursesAssigned() 
    {
        $this->db->select('faculty_profile_id, course_code, number_of_units');
        $query = $this->db->get('courses');
        return $query->result_array(); // Fixed to return array
    }

    public function fetchResearchOutputs() 
    {
        $this->db->select('faculty_profile_id, title');
        $query = $this->db->get('research_outputs');
        return $query->result_array(); // Fixed to return array
    }

	public function fetchQualifications() 
    {
        $this->db->select('faculty_profile_id, academic_degree, institution, year_graduated');
        $query = $this->db->get('qualifications');
        return $query->result_array(); // Fixed to return array
    }

    public function fetchIndustryExperience() 
    {
        $this->db->select('faculty_profile_id, company_name, job_position, years_of_experience');
        $query = $this->db->get('industry_experience');
        return $query->result_array(); // Fixed to return array
    }

	public function fetchCertifications() 
    {
        $this->db->select('faculty_profile_id, certification_name, certification_title, year_received');
        $query = $this->db->get('certifications');
        return $query->result_array(); // Fixed to return array
    }

    public function getTotalFaculty(){
        $this->db->from('faculty_profiles_vw');
        $this->db->where('role_name', 'Faculty');
        return $this->db->count_all_results();
    }

    public function saveUserData($user_data)
    {
        $this->db->insert("users", $user_data);
        return $this->db->insert_id();
    }

    public function getUserIdByEmail($email)
    {
        $this->db->select("id");
        $this->db->from("users");
        $this->db->where("email", $email);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->id;
        }
        
        return false;
    }

    public function saveFacultyProfileData($facultyProfile_data)
    {
        $this->db->insert("faculty_profiles", $facultyProfile_data);
        return true;
    }

    public function isEmailExists($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->num_rows() > 0;
    }

    public function getFacultyDataForExport($search = '') {
        // Fetch profiles using getUserProfiles
        $facultyList = $this->getUserProfiles($search);
        
        // Fetch and group courses
        $courses = $this->fetchCoursesAssigned();
        $facultyCourses = [];
        foreach ($courses as $course) {
            $facultyID = $course['faculty_profile_id'];
            if (!isset($facultyCourses[$facultyID])) {
                $facultyCourses[$facultyID] = ['courses_assigned' => '', 'teaching_loads' => 0];
            } else {
				// Add semicolon separator only if this isn't the first course
				$facultyCourses[$facultyID]['courses_assigned'] .= ' | ';
			}
            $facultyCourses[$facultyID]['courses_assigned'] .= ($course['course_code'] ?? '');
            $facultyCourses[$facultyID]['teaching_loads'] += (int)$course['number_of_units'];
        }
        foreach ($facultyCourses as &$data) {
            $data['courses_assigned'] = trim($data['courses_assigned']);
        }

        // Fetch and group research outputs
        $researchOutputs = $this->fetchResearchOutputs();
        $facultyResearch = [];
        foreach ($researchOutputs as $research) {
            $facultyID = $research['faculty_profile_id'];
            if (!isset($facultyResearch[$facultyID])) {
                $facultyResearch[$facultyID] = ['research_outputs' => ''];
            } else {
				// Add semicolon separator only if this isn't the first research
				$facultyResearch[$facultyID]['research_outputs'] .= ' | ';
			}
            $facultyResearch[$facultyID]['research_outputs'] .= ($research['title'] ?? '');
        }

		// Fetch and group qualifications
		$qualifications = $this->fetchQualifications();
		$facultyQualifications = [];
		foreach ($qualifications as $qualification) {
			$facultyID = $qualification['faculty_profile_id'];
			if (!isset($facultyQualifications[$facultyID])) {
				$facultyQualifications[$facultyID] = ['qualifications' => ''];
			} else {
				// Add semicolon separator only if this isn't the first qualification
				$facultyQualifications[$facultyID]['qualifications'] .= ' | ';
			}
			$facultyQualifications[$facultyID]['qualifications'] .= ($qualification['academic_degree'] ?? '') . '_' . 
																	($qualification['institution'] ?? '') . ' ' . 
																	($qualification['year_graduated'] ?? '');
		}

		// Fetch and group industry_experience
        $industry_experience = $this->fetchIndustryExperience();
        $facultyIndustryExperience = [];
        foreach ($industry_experience as $experience) {
            $facultyID = $experience['faculty_profile_id'];
            if (!isset($facultyIndustryExperience[$facultyID])) {
                $facultyIndustryExperience[$facultyID] = ['industry_experience' => ''];
            } else {
				// Add semicolon separator only if this isn't the first industry experience
				$facultyIndustryExperience[$facultyID]['industry_experience'] .= ' | ';
			}
			
            $facultyIndustryExperience[$facultyID]['industry_experience'] .= ($experience['company_name'] ?? '') . '_' . 
																	($experience['job_position'] ?? '') . '_' . 
																	($experience['years_of_experience'] ?? '');
        }

		// Fetch and group certifications
        $certifications = $this->fetchCertifications();
        $facultyCertifications = [];
        foreach ($certifications as $certification) {
            $facultyID = $certification['faculty_profile_id'];
            if (!isset($facultyCertifications[$facultyID])) {
                $facultyCertifications[$facultyID] = ['certifications' => ''];
            } else {
				// Add semicolon separator only if this isn't the first certification
				$facultyCertifications[$facultyID]['certifications'] .= ' | ';
			}
            $facultyCertifications[$facultyID]['certifications'] .= ($certification['certification_name'] ?? '') . ' ' . 
																	($certification['certification_title'] ?? '') . ' ' . 
																	($certification['year_received'] ?? '');
        }

        // Combine data
        $exportData = [];
        foreach ($facultyList as $faculty) {
            $facultyID = $faculty['id'];
            $name = implode(', ', array_filter([$faculty['last_name'], $faculty['first_name'], $faculty['middle_name']]));
            $exportData[] = [
                'id' => $faculty['id'],
                'name' => $name,
                'email' => $faculty['email'],
                'department' => $faculty['department'],
                'position' => $faculty['position'],
                'employment_type' => $faculty['employment_type'],
                'date_hired' => $faculty['date_hired'],
                'courses_assigned' => $facultyCourses[$facultyID]['courses_assigned'] ?? '',
                'teaching_loads' => $facultyCourses[$facultyID]['teaching_loads'] ?? 0,
                'research_outputs' => $facultyResearch[$facultyID]['research_outputs'] ?? '',
				'qualifications' => $facultyQualifications[$facultyID]['qualifications'] ?? '',
				'industry_experience' => $facultyIndustryExperience[$facultyID]['industry_experience'] ?? '',
				'certifications' => $facultyCertifications[$facultyID]['certifications'] ?? '',
                'contact_number' => $faculty['mobile_number']
            ];
        }

        return $exportData;
    }
}