<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Consultations_model extends CI_Model {

	public function getConsultationsTable($search)
	{
		// Apply search filter if provided
		if (!empty($search)) {
			$this->db->like('faculty', $search);
			$this->db->or_like('day', $search);   
			$this->db->or_like('start_time', $search);  
			$this->db->or_like('end_time', $search);   
			$this->db->or_like('mode_of_consultation', $search);  
		}

		// Query the consultation_timeslots_vw view
		$query = $this->db->get('consultation_timeslots_vw');

		// Return the result as an array
		return $query->result();
	}

	public function getTotalConsultations() {
        return $this->db->count_all_results('consultation_timeslots_vw');
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