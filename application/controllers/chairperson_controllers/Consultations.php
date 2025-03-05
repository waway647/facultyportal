<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Consultations extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('chairperson_models/Consultations_model');
		$this->load->helper('url');
	}

	public function index() // http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Consultations/index
	{
		$this->load->model('common_models/Faculty_model');
		$logged_id = $this->session->userdata('logged_id');
		$data['faculty'] = $this->Faculty_model->getFacultyProfile($logged_id);
		
		$faculty_id = $this->Faculty_model->getFacultyID($logged_id);
		$data['full_name'] = $this->Faculty_model->getFaculty($faculty_id);

		$this->load->view('chairperson/consultations/index', $data);
	}
	
	public function getConsultations()
	{
		$search = $this->input->get('search');
		
		$result = $this->Consultations_model->getConsultationsTable($search);
		echo json_encode($result);  // Return data as JSON
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
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Consultations/index');
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
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Consultations/index');
		}
	}

	public function deleteConsultation($id)
	{
		$result = $this->Consultations_model->delete($id);
		if($result == true)
		{
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Consultations/index');
		}
	}
}
