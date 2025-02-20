<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Courses_model extends CI_Model {

    public function getCourses($faculty_profile_id, $search)
	{
		$this->db->where('faculty_profile_id', $faculty_profile_id);

		if (!empty($search)) {
			$this->db->group_start();
			$this->db->or_like('course_code', $search);
			$this->db->or_like('course_name', $search); 
			$this->db->or_like('number_of_units', $search);
			$this->db->or_like('class_section', $search);
			$this->db->group_end();
		}

        $query = $this->db->get('courses');
        return $query->result_array(); // Use row() to get a single row
	}
}