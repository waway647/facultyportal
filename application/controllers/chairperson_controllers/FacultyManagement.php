<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class FacultyManagement extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('chairperson_models/FacultyManagement_model');
		$this->load->model('chairperson_models/Profile_model');
		$this->load->helper('url');
	}

	public function index() // http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/FacultyManagement/index
	{
		$this->load->model('common_models/Faculty_model');
		$logged_id = $this->session->userdata('logged_id');
		$data['faculty'] = $this->Faculty_model->getFacultyProfile($logged_id);

		$faculty_id = $this->Faculty_model->getFacultyID($logged_id);
		$data['full_name'] = $this->Faculty_model->getFaculty($faculty_id);

		$this->load->view('chairperson/faculty_management/index', $data);
	}

	public function fetchUserProfiles() 
	{
		$search = $this->input->get('search');

		$faculty_role_name = 'Faculty';

		$result = $this->FacultyManagement_model->getUserProfiles($search, $faculty_role_name);  // Fetch data from SQL view
		echo json_encode($result);  // Return data as JSON
	}

	public function fetchCoursesAssigned() 
	{
		$result = $this->FacultyManagement_model->fetchCoursesAssigned();  // Fetch data from SQL view
		echo json_encode($result);  // Return data as JSON
	}

	public function fetchResearchOutputs() 
	{
		$result = $this->FacultyManagement_model->fetchResearchOutputs();  // Fetch data from SQL view
		echo json_encode($result);  // Return data as JSON
	}

	public function fetchQualifications() 
	{
		$result = $this->FacultyManagement_model->fetchQualifications();  // Fetch data from SQL view
		echo json_encode($result);  // Return data as JSON
	}

	public function fetchIndustryExperience() 
	{
		$result = $this->FacultyManagement_model->fetchIndustryExperience();  // Fetch data from SQL view
		echo json_encode($result);  // Return data as JSON
	}

	public function fetchCertifications() 
	{
		$result = $this->FacultyManagement_model->fetchCertifications();  // Fetch data from SQL view
		echo json_encode($result);  // Return data as JSON
	}

	public function createFaculty1()
	{
		$user_data["user_role_id"] = $this->input->post("user_role_id");
		$user_data["email"] = $this->input->post("email");
		$user_data["pass"] = $this->input->post("pass");

		// Set the session data
		$this->session->set_userdata('user_data', $user_data);

		// Set a session flag indicating that the user has completed Step 1
		$this->session->set_userdata('step1_completed', true);
	
		// Redirect to the page where Step 2 is displayed
		redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/FacultyManagement/index');
	}

	public function createFaculty2()
	{
		$user_data_fromstep1 = $this->session->userdata('user_data');

		// Collect the user data from the form submission
		$user_data = array(
			"first_name" => $this->input->post("first_name"),
			"last_name" => $this->input->post("last_name"),
			"middle_name" => $this->input->post("middle_name"),
			"user_role_id" => $user_data_fromstep1['user_role_id'],
			"email" => $user_data_fromstep1['email'],  // Email should come from session data
			"pass" => $user_data_fromstep1['pass']     // Password should also come from session data
		);

		$user_id = $this->FacultyManagement_model->saveUserData($user_data);

			if ($user_id) {
				$facultyProfile_data = array(
					"user_id" => $user_id, // Associate the user_id from the previous insert
					"date_hired" => $this->input->post("date_hired"),
					"department" => $this->input->post("department"),
					"employment_type" => $this->input->post("employment_type"),
					"position" => $this->input->post("position")
				);
				
				// Save the faculty profile data (Step 2)
				$result3 = $this->FacultyManagement_model->saveFacultyProfileData($facultyProfile_data);
	
				// Check if saving the faculty profile was successful
				if ($result3) {
					redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/FacultyManagement/index');
					//echo "Result3 Successful! Faculty profile saved.";
				} else {
					echo "Result3 Unsuccessful! Try again.";
				}
			} else {
				echo "User ID not found!";
			}
	}

	public function countAllFaculty()
	{
		$totalFaculty = $this->FacultyManagement_model->countAllFaculty();
		if ($totalFaculty) {
			echo json_encode($totalFaculty);
		} else {
			echo json_encode(["error" => "Total number of faculty not found"]);
		}
	}

	public function checkEmailExists()
	{
		$email = $this->input->post('email');

		if ($this->FacultyManagement_model->isEmailExists($email)) {
			echo 'Email already in use';
		} else {
			echo 'Email is available';
		}
	}

	public function exportFacultyTable() {
        $search = $this->input->get('search');
        $facultyData = $this->FacultyManagement_model->getFacultyDataForExport($search);

        // Set headers for CSV download (CodeIgniter 3 style)
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="faculty_export_' . date('Ymd_His') . '.csv"');

        // Open output stream
        $output = fopen('php://output', 'w');
        $headers = ['ID', 'Name', 'Email', 'Department', 'Position', 'Employment Type', 'Date Hired', 'Courses Assigned', 'Teaching Loads', 'Research Outputs', 'Qualifications', 'Industry_experience', 'Certifications', 'Contact Number'];
        fputcsv($output, $headers);

        foreach ($facultyData as $faculty) {
            fputcsv($output, [
                $faculty['id'],
                $faculty['name'],
                $faculty['email'],
                $faculty['department'],
                $faculty['position'],
                $faculty['employment_type'],
                $faculty['date_hired'],
                $faculty['courses_assigned'],
                $faculty['teaching_loads'],
                $faculty['research_outputs'],
				$faculty['qualifications'],
				$faculty['industry_experience'],
				$faculty['certifications'],
                $faculty['contact_number']
            ]);
        }

        fclose($output);
        exit();
    }
}
