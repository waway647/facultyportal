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

	public function getCoursesTable($search)
	{
		if (!empty($search)) {
			$this->db->like('course_code', $search);  
			$this->db->or_like('course_name', $search); 
			$this->db->or_like('number_of_units', $search); 
			$this->db->or_like('faculty_assigned', $search);  
			$this->db->or_like('class_section', $search);  
		}

		$query = $this->db->get('courses_vw');
		return $query->result();
	}

	public function getCourseByID($course_id) {
		return $this->db->get_where("courses", array('id' => $course_id))->row();
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