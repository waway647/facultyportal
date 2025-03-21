<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Consultations_model extends CI_Model {
	
	public function getConsultationsTable($faculty_profile_id, $search)
	{
		$this->db->where('faculty_profile_id', $faculty_profile_id); // Apply where clause first

		if (!empty($search)) {
			$this->db->group_start(); // Start grouping for OR conditions
			$this->db->or_like('day', $search);
			$this->db->or_like('start_time', $search);
			$this->db->or_like('end_time', $search);
			$this->db->or_like('mode_of_consultation', $search);
			$this->db->group_end(); // End grouping for OR conditions
		}

		$query = $this->db->get('consultation_timeslots_vw');
		return $query->result_array(); // Return all rows as an array
	}

	public function insertNewConsultation($consultation_data)
	{
		$this->db->insert("consultation_timeslots", $consultation_data);
		return true;
	}

	public function getConsultationByID($consultation_id) {
		return $this->db->get_where("consultation_timeslots", array('id' => $consultation_id))->row();
	}

	public function getTotalConsultations($faculty_profile_id)
	{
		$this->db->where('faculty_profile_id', $faculty_profile_id);
		$query = $this->db->get('consultation_timeslots');
		return $query->result_array();
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