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
		$this->load->helper('url');
	}

	public function index() // http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/FacultyManagement/index
	{
		$this->load->view('chairperson/faculty_management/index');
	}

	public function fetchUserProfiles() {
		$result = $this->FacultyManagement_model->getUserProfiles();  // Fetch data from SQL view
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
					"department" => $this->input->post("department"),
					"employment_type" => $this->input->post("employment_type")
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
}
