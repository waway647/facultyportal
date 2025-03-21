<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class ResearchOutputs_model extends CI_Model {

	public function getResearch($search)
	{
		// Apply search filter if provided
		if (!empty($search)) {
			$this->db->like('title', $search);  
			$this->db->or_like('author', $search);
			$this->db->or_like('publication_year', $search);  
		}

		// Query the consultation_timeslots_vw view
		$query = $this->db->get('research_outputs_vw');

		// Return the result as an array
		return $query->result();
	}

	public function insertNewResearch($research_data)
	{
		$this->db->insert("research_outputs", $research_data);
		return true;
	}

	public function getTotalResearch()
	{
		return $this->db->count_all_results('research_outputs_vw');
	}

	public function getResearchByID($id) {
        return $this->db->get_where("research_outputs", array('id' => $id))->row();
    }

	public function updateResearch($research_id, $research_data)
    {
        $this->db->where('id', $research_id);
        $this->db->update('research_outputs', $research_data);
        return $this->db->affected_rows() > 0;
    }

	public function deleteResearch($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('research_outputs');
		return true;
	}

	public function ViewResearchPDF($id)
    {
        $this->db->select('research_attachment');
        $this->db->where('id', $id);
        $query = $this->db->get('research_outputs');

        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }    
}