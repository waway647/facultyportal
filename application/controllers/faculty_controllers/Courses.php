<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Courses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('faculty_models/Courses_model');
		$this->load->helper('url');
	}

	public function index() // http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Courses/index
	{
		$logged_user_id = $this->session->userdata('logged_id');

		// Get faculty ID using the logged-in user's ID
		$faculty_id = $this->Courses_model->getFacultyID($logged_user_id);

		if ($faculty_id) { // Check if a faculty ID was retrieved
			// Set faculty ID in the session
			$this->session->set_userdata('faculty_id', $faculty_id);

			// Verify if the session data is set
			if ($this->session->userdata('faculty_id')) {
				$this->load->view('faculty/courses/index');
			} else {
				echo "Failed to set session data!";
			}
		} else {
			echo "Faculty ID not found!";
		}
	}

	public function getCourses()
	{
		$faculty_id = $this->session->userdata('faculty_id');

		if ($faculty_id) {
			$result = $this->Courses_model->getCourses($faculty_id);
			echo json_encode($result); // Return data as JSON
		} else {
			echo json_encode(['error' => 'No valid faculty ID found.']);
		}
	}
}
