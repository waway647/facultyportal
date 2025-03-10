<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		//$this->load->model('faculty_models/Dashboard_model');
		$this->load->model('common_models/Faculty_model');
		$this->load->helper('url');
	}
	
	public function index() // http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Dashboard/index
	{
		$user_id = $this->session->userdata('logged_id');
		$data['faculty'] = $this->Faculty_model->getFacultyProfile($user_id);

		$logged_user_id = $this->session->userdata('logged_id');

		$faculty_id = $this->Faculty_model->getFacultyID($logged_user_id);
		if($faculty_id)
		{
			$this->session->set_userdata('faculty_id', $faculty_id);

			$this->load->view('faculty/dashboard/index', $data);
		}
	}
}
