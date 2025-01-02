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

	public function index() // http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Courses/index
	{
		$this->load->view('faculty/courses/index');
	}

	public function getCourseByID($course_id) {
		$course = $this->Courses_model->getCourseByID($course_id);
		if ($course) {
			echo json_encode($course);
		} else {
			echo json_encode(["error" => "Course not found"]);
		}
	}
}
