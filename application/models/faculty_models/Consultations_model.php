<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Consultations_model extends CI_Model {

	public function getConsultationsTable()
	{
		$query = $this->db->get('consultation_timeslots_vw')->result();
		return $query;
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