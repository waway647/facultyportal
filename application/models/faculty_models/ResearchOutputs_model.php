<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class ResearchOutputs_model extends CI_Model {

	public function getResearch($faculty_id)
	{
		$this->db->where('faculty_profile_id', $faculty_id);
        $query = $this->db->get('research_outputs');
        return $query->result_array(); // Use row() to get a single row
	}

	public function getFaculty() 
	{
		$query = $this->db->get('faculty_full_name_vw');
		return $query->result_array();
	}

	public function insertNewResearch($research_data)
	{
		$this->db->insert("research_outputs", $research_data);
		return true;
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

	public function getFacultyID($logged_user_id)
	{
		$query = $this->db->select('id')
						->where('user_id', $logged_user_id)
						->get('faculty_profiles');

		$result = $query->row_array(); // Fetch the first row as an associative array
		return $result ? $result['id'] : null; // Return the ID if found, otherwise return null
	}
}