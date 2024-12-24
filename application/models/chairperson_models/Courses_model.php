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

	public function getCourseByID($course_id) {
		return $this->db->get_where("courses_vw", array('id' => $course_id))->row();
	}

	public function updateCourse($course_id, $course_data)
	{
		$this->db->where('id', $course_id);
		$this->db->update('courses', $course_data);
		return true;
	}
	
	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('courses');
		return true;
	}
}