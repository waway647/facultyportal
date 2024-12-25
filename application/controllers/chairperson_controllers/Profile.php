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

	public function index($logged_email = null) // http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/index
	{
		$logged_email = $this->session->userdata('logged_email');

		//$this->load->view('chairperson/profile/index');
		if($logged_email) 
		{
			$data['faculty'] = $this->Profile_model->getFacultyProfile($logged_email);
			$this->load->view('chairperson/profile/index', $data);
		}
	}

	public function editProfile($logged_email = null) // http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile
	{
		$logged_email = $this->session->userdata('logged_email');

		//$this->load->view('chairperson/profile/index');
		if($logged_email) 
		{
			$data['faculty'] = $this->Profile_model->getFacultyProfile($logged_email);
			$this->load->view('chairperson/profile/edit', $data);
		}
	}

	public function cancelEdit()
	{
		redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/index');
	}

	public function updateProfile()
	{
		redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/index');
	}
}
