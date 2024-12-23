<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Courses_model extends CI_Model {

	public function getFacultyInstructor() 
	{
		$query = $this->db->get('faculty_full_name_vw');
		return $query->result_array();
	}

	public function insertNewCourse($course_data)
	{
		$this->db->insert("courses", $course_data);
		return true;
	}

	public function getCoursesTable()
	{
		$query = $this->db->get('courses_vw')->result();
		return $query;
	}
}
