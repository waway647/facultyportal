<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Announcements extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('common_models/Faculty_model');
		$this->load->model('faculty_models/Announcement_model');
		$this->load->helper('url');
	}

	public function index() // http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Announcements/index
	{
		$user_id = $this->session->userdata('logged_id');
		$data['faculty'] = $this->Faculty_model->getFacultyProfile($user_id);

		$logged_user_id = $this->session->userdata('logged_id');

		$faculty_id = $this->Faculty_model->getFacultyID($logged_user_id);
		if($faculty_id)
		{
			$this->session->set_userdata('faculty_id', $faculty_id);

			$this->load->view('faculty/announcements/index', $data);
		}
	}

	public function getAnnouncements(){
		/* $search = $this->input->get('search'); */

			$result = $this->Announcement_model->getAnnouncements();
			echo json_encode($result);  // Return data as JSON
		} 
}
