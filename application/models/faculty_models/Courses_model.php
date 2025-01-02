<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Courses_model extends CI_Model {

    public function get_courses($faculty_id) {
        $this->db->where('faculty_id', $faculty_id);
        $query = $this->db->get('courses');
        return $query->result_array();
    }

    public function getCourseByID($course_id) {
		return $this->db->get_where("courses", array('id' => $course_id))->row();
	}
}