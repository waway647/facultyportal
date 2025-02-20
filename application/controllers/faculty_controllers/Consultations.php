<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Consultations extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('faculty_models/Consultations_model');
		$this->load->model('common_models/Faculty_model');
		$this->load->helper('url');
	}

	public function index() // http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Consultations/index
	{
		$faculty_id = $this->session->userdata('logged_id');
		$data['faculty'] = $this->Faculty_model->getFacultyProfile($faculty_id);

		$logged_user_id = $this->session->userdata('logged_id');

		// Get faculty ID using the logged-in user's ID
		$faculty_id = $this->Faculty_model->getFacultyID($logged_user_id);

		if ($faculty_id) { // Check if a faculty ID was retrieved
			// Set faculty ID in the session
			$this->session->set_userdata('faculty_id', $faculty_id);

			// Verify if the session data is set
			if ($this->session->userdata('faculty_id')) {
				$this->load->view('faculty/consultations/index', $data);
			} else {
				echo "Failed to set session data!";
			}
		} else {
			echo "Faculty ID not found!";
		}
	}
	
	public function getConsultations()
	{
		$faculty_id = $this->session->userdata('faculty_id');
		$search = $this->input->get('search');

		if($faculty_id)
		{
			$result = $this->Consultations_model->getConsultationsTable($faculty_id, $search);
			echo json_encode($result);  // Return data as JSON
		} else {
			echo json_encode(['error' => 'No valid faculty ID found.']);
		}
		
	}

	public function createConsultation()
	{
		$consultation_data = array(
			"faculty_profile_id" => $this->input->post("faculty_profile_id"),
			"day" => $this->input->post("day"),
			"start_time" => $this->input->post("start_time"),
			"end_time" => $this->input->post("end_time"),
			"mode_of_consultation" => $this->input->post("mode_of_consultation")
		);

		$result = $this->Consultations_model->insertNewConsultation($consultation_data);

		if($result)
		{
			redirect('http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Consultations/index');
		}
	}

	public function getConsultationByID($consultation_id) {
		$consultation = $this->Consultations_model->getConsultationByID($consultation_id);
		if ($consultation) {
			echo json_encode($consultation);
		} else {
			echo json_encode(["error" => "Consultation not found"]);
		}
	}

	public function updateConsultation($consultation_id)
	{
		$consultation_data = array(
			"faculty_profile_id" => $this->input->post("faculty_profile_id"),
			"day" => $this->input->post("day"),
			"start_time" => $this->input->post("start_time"),
			"end_time" => $this->input->post("end_time"),
			"mode_of_consultation" => $this->input->post("mode_of_consultation")
		);

		$result = $this->Consultations_model->updateConsultation($consultation_id, $consultation_data);
		if($result == true)
		{
			redirect('http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Consultations/index');
		}
	}

	public function deleteConsultation($id)
	{
		$result = $this->Consultations_model->delete($id);
		if($result == true)
		{
			redirect('http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Consultations/index');
		}
	}
}
