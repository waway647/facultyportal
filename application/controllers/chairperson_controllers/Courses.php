<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Courses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('chairperson_models/Courses_model');
		$this->load->helper('url');
	}

	public function index() // http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Courses/index
	{
		$this->load->view('chairperson/courses/index');
	}

	public function getFaculty() {
		$result = $this->Courses_model->getFacultyInstructor();  // Fetch data from SQL view
		echo json_encode($result);  // Return data as JSON
	}

	public function createCourse()
	{
		$course_data = array(
			"course_code" => $this->input->post("course_code"),
			"course_name" => $this->input->post("course_name"),
			"number_of_units" => $this->input->post("number_of_units"),
			"faculty_profile_id" => $this->input->post("faculty_profile_id"),
			"class_section" => $this->input->post("class_section")
		);

		$result = $this->Courses_model->insertNewCourse($course_data);

		if($result)
		{
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Courses/index');
		}
	}

	public function getCourses()
	{
		$result = $this->Courses_model->getCoursesTable();
		echo json_encode($result);  // Return data as JSON
	}

	public function editCourse()
	{
		
	}
}
