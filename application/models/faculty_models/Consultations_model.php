<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Consultations_model extends CI_Model {
	public function getFacultyID($logged_user_id)
	{
		$query = $this->db->select('id')
						->where('user_id', $logged_user_id)
						->get('faculty_profiles');

		$result = $query->row_array(); // Fetch the first row as an associative array
		return $result ? $result['id'] : null; // Return the ID if found, otherwise return null
	}
	
	public function getConsultationsTable($faculty_profile_id)
	{
		$this->db->where('faculty_profile_id', $faculty_profile_id);
        $query = $this->db->get('consultation_timeslots_vw');
        return $query->result_array(); // Use row() to get a single row
	}

	public function insertNewConsultation($consultation_data)
	{
		$this->db->insert("consultation_timeslots", $consultation_data);
		return true;
	}

	public function getConsultationByID($consultation_id) {
		return $this->db->get_where("consultation_timeslots", array('id' => $consultation_id))->row();
	}

	public function updateConsultation($consultation_id, $consultation_data)
	{
		$this->db->where('id', $consultation_id);
		$this->db->update('consultation_timeslots', $consultation_data);
		return true;
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('consultation_timeslots');
		return true;
	}
}