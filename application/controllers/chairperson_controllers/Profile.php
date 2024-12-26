<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('chairperson_models/Profile_model');
		$this->load->helper('url');
	}

	public function index($logged_id = null) // http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/index
	{
		$logged_id = $this->session->userdata('logged_id');

		if ($logged_id) {
			// Clear current_id to prevent interference when viewing own profile
			$this->session->unset_userdata('current_id');
			
			$data['faculty'] = $this->Profile_model->getFacultyProfile($logged_id);
			$this->load->view('chairperson/profile/index', $data);
		} else {
			redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/index');
		}
	}

	public function viewProfile($current_id)
	{
		if (!$current_id) {
			// Redirect to the logged-in user's profile if no ID is provided
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/index');
		}
	
		// Set current_id to allow viewing another user's profile
		$this->session->set_userdata('current_id', $current_id);
	
		$data['faculty'] = $this->Profile_model->getFacultyProfile($current_id);
		$this->load->view('chairperson/profile/index', $data);
	}

	public function editProfile()
	{
		$current_id = $this->session->userdata('current_id') ?: $this->session->userdata('logged_id');

		if ($current_id) {
			$data['faculty'] = $this->Profile_model->getFacultyProfile($current_id);
			$this->load->view('chairperson/profile/edit', $data);
		} else {
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/index');
		}
	}


	public function cancelEdit()
	{
		$current_id = $this->session->userdata('current_id');

		if ($current_id) {
			// If editing another user's profile, redirect back to viewProfile
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/viewProfile/' . $current_id);
		} 

		$logged_id = $this->session->userdata('logged_id');

		if ($logged_id) {
			// Redirect to the logged-in user's profile
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/index');
		} else {
			redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/index');
		}
	}


	public function updateProfile()
	{
		redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/index');
	}

	public function createQualifications()
	{
		$current_id = $this->session->userdata('current_id');

		if ($current_id) {
			$qualification_data = array(
				"faculty_profile_id" => $current_id,
				"academic_degree" => $this->input->post("academic_degree"),
				"institution" => $this->input->post("institution"),
				"year_graduated" => $this->input->post("year_graduated")
			);

			$result = $this->Profile_model->insertNewQualification($qualification_data);
			if($result)
			{
				redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile');
			}
		} 

		$logged_id = $this->session->userdata('logged_id');

		if($logged_id) {
			$qualification_data = array(
				"faculty_profile_id" => $logged_id,
				"academic_degree" => $this->input->post("academic_degree"),
				"institution" => $this->input->post("institution"),
				"year_graduated" => $this->input->post("year_graduated")
			);

			$result = $this->Profile_model->insertNewQualification($qualification_data);
			if($result)
			{
				redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile');
			}
		} else {
			redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/index');
		}

	}

	public function createExperience()
	{
		$current_id = $this->session->userdata('current_id');

		if ($current_id) {
			$experience_data = array(
				"faculty_profile_id" => $current_id,
				"company_name" => $this->input->post("company_name"),
				"job_position" => $this->input->post("job_position"),
				"years_of_experience" => $this->input->post("years_of_experience")
			);

			$result = $this->Profile_model->insertNewExperience($experience_data);
			if($result)
			{
				redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile');
			}
		} 

		$logged_id = $this->session->userdata('logged_id');

		if($logged_id) {
			$experience_data = array(
				"faculty_profile_id" => $logged_id,
				"company_name" => $this->input->post("company_name"),
				"job_position" => $this->input->post("job_position"),
				"years_of_experience" => $this->input->post("years_of_experience")
			);

			$result = $this->Profile_model->insertNewExperience_data($experience_data);
			if($result)
			{
				redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile');
			}
		} else {
			redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/index');
		}

	}

	public function createResearch()
	{
		$config['upload_path'] = './assets/images/research_attachments/';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('research_attachment')) {
			$uploaded_data = $this->upload->data();
			$attachment_path = 'assets/images/research_attachments/' . $uploaded_data['file_name'];
		} else {
			$error = $this->upload->display_errors();
			echo 'Error: ' . $error;
			return;
		}

		// Get faculty profile ID
		$current_id = $this->session->userdata('current_id');

		// Prepare research data to insert
		if ($current_id) {
			$research_data = array(
				"faculty_profile_id" => $current_id,
				"title" => $this->input->post("title"),
				"publication_year" => $this->input->post("publication_year"),
				"research_attachment" => $attachment_path
			);

			// Insert research data into database
			$result = $this->Profile_model->insertNewResearch($research_data);
			if ($result) {
				redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile');
			}
		}

		// Check if logged in by logged_id
		$logged_id = $this->session->userdata('logged_id');

		if ($logged_id) {
			$research_data = array(
				"faculty_profile_id" => $logged_id,
				"title" => $this->input->post("title"),
				"publication_year" => $this->input->post("publication_year"),
				"research_attachment" => $attachment_path
			);

			// Insert research data into database
			$result = $this->Profile_model->insertNewResearch($research_data);
			if ($result) {
				redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile');
			}
		} else {
			redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/index');
		}
	}

}
