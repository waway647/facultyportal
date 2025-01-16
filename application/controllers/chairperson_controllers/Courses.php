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
		$this->load->model('common_models/Faculty_model');
		$faculty_id = $this->session->userdata('logged_id');
		$data['faculty'] = $this->Faculty_model->getFacultyProfile($faculty_id);

		$this->load->view('chairperson/courses/index', $data);
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

	public function getCourseByID($course_id) {
		$course = $this->Courses_model->getCourseByID($course_id);
		if ($course) {
			echo json_encode($course);
		} else {
			echo json_encode(["error" => "Course not found"]);
		}
	}

	public function updateCourse($id)
	{
		$course_data = array(
			"course_code" => $this->input->post("course_code"),
			"course_name" => $this->input->post("course_name"),
			"number_of_units" => $this->input->post("number_of_units"),
			"faculty_profile_id" => $this->input->post("faculty_profile_id"),
			"class_section" => $this->input->post("class_section")
		);

		$result = $this->Courses_model->updateCourse($id, $course_data);
		if($result == true)
		{
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Courses/index');
			//$this->index();
		}
	}

	public function deleteCourse($id)
	{
		$result = $this->Courses_model->delete($id);
		if($result == true)
		{
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Courses/index');
		}
	}

	
}
