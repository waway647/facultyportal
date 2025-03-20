<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class FacultyDetails extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('common_models/Faculty_model');
		$this->load->helper('url');
	}

    public function getFaculty() {
		$logged_id = $this->session->userdata('logged_id');
		$faculty_id = $this->Faculty_model->getFacultyID($logged_id);
		$result = $this->Faculty_model->getFaculty($faculty_id);  // Fetch data from SQL view
		echo json_encode($result);  // Return data as JSON
	}

	public function getFacultyNames() {
		$result = $this->Faculty_model->getFacultyNames();  // Fetch data from SQL view
		echo json_encode($result);  // Return data as JSON
	}
}
