<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('');
		$this->load->helper('url');
	}

	public function index() // http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Dashboard/index
	{
		$this->load->model('common_models/Faculty_model');
		$logged_id = $this->session->userdata('logged_id');
		$data['faculty'] = $this->Faculty_model->getFacultyProfile($logged_id);

		$faculty_id = $this->Faculty_model->getFacultyID($logged_id);
		$data['full_name'] = $this->Faculty_model->getFaculty($faculty_id);

		$this->load->view('chairperson/dashboard/index', $data);
	}
}
