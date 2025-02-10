<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class ResearchOutputs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('faculty_models/ResearchOutputs_model');
		$this->load->helper('url');
	}

	public function index() // http://localhost/GitHub/facultyportal/index.php/faculty_controllers/ResearchOutputs/index
	{
		$this->load->model('common_models/Faculty_model');
		$user_id = $this->session->userdata('logged_id');
		$data['faculty'] = $this->Faculty_model->getFacultyProfile($user_id);

		$logged_user_id = $this->session->userdata('logged_id');

		$faculty_id = $this->ResearchOutputs_model->getFacultyID($logged_user_id);
		if($faculty_id)
		{
			$this->session->set_userdata('faculty_id', $faculty_id);

			$this->load->view('faculty/research_outputs/index', $data);
		}
	}

	public function getResearch()
	{
		$faculty_id = $this->session->userdata('faculty_id');
		$search = $this->input->get('search');

		if($faculty_id)
		{
			$result = $this->ResearchOutputs_model->getResearch($faculty_id, $search);
			echo json_encode($result); // Return data as JSON
		}
	}

	public function getFaculty() {
		$result = $this->ResearchOutputs_model->getFaculty();  // Fetch data from SQL view
		echo json_encode($result);  // Return data as JSON
	}

	public function createResearch()
	{
		$config['upload_path'] = './assets/research_attachments/';
		$config['allowed_types'] = 'pdf';
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('research_attachment')) {
			$uploaded_data = $this->upload->data();
			$attachment_path = 'assets/research_attachments/' . $uploaded_data['file_name'];
		}

		$faculty_id = $this->session->userdata('faculty_id');

		$research_data = array(
			"title" => $this->input->post("title"),
			"publication_year" => $this->input->post("publication_year"),
			"faculty_profile_id" => $faculty_id,
			"research_attachment" => $attachment_path
		);

		// Insert research data into database
		$result = $this->ResearchOutputs_model->insertNewResearch($research_data);
		if ($result) {
			redirect('http://localhost/GitHub/facultyportal/index.php/faculty_controllers/ResearchOutputs/index');
		}

	}

	public function getResearchByID($id) 
	{
		// Validate the ID and fetch the qualification row
		$research_data = $this->ResearchOutputs_model->getResearchByID($id);

		if ($research_data) {
			echo json_encode($research_data); // Return the data as JSON for AJAX
		} else {
			echo json_encode(['error' => 'Research not found.']);
		}
	}

	public function updateResearch($id)
	{
		// Load the existing research entry
		$research = $this->ResearchOutputs_model->getResearchByID($id);
	
		if (!$research) {
			$this->session->set_flashdata('error', 'Research not found.');
			redirect('http://localhost/GitHub/facultyportal/index.php/faculty_controllers/ResearchOutputs/index');
			return;
		}
	
		$config['upload_path'] = './assets/research_attachments/';
		$config['allowed_types'] = 'pdf';
		$this->load->library('upload', $config);
	
		$attachment_path = $research->research_attachment; // Default to existing attachment
	
		if ($this->upload->do_upload('research_attachment')) {
			$uploaded_data = $this->upload->data();
			$attachment_path = 'assets/research_attachments/' . $uploaded_data['file_name'];
		}
	
		$research_data = array(
			"title" => $this->input->post("title"),
			"publication_year" => $this->input->post("publication_year"),
			"faculty_profile_id" => $this->input->post("faculty_profile_id"),
			"research_attachment" => $attachment_path
		);
	
		// Update research data
		$result = $this->ResearchOutputs_model->updateResearch($id, $research_data);
	
		if ($result) {
			redirect('http://localhost/GitHub/facultyportal/index.php/faculty_controllers/ResearchOutputs/index');
		} else {
			$this->session->set_flashdata('error', 'Failed to update research.');
			redirect('http://localhost/GitHub/facultyportal/index.php/faculty_controllers/ResearchOutputs/index');
		}
	}

	public function deleteResearch($id)
	{
		$result = $this->ResearchOutputs_model->deleteResearch($id);
		if($result == true)
		{
			redirect('http://localhost/GitHub/facultyportal/index.php/faculty_controllers/ResearchOutputs/index');
		}
	}

	public function ViewResearchPDF($id)
	{
		// Fetch the PDF file path from the database
		$result = $this->ResearchOutputs_model->ViewResearchPDF($id);

		if ($result) {
			$file_path = $result->research_attachment; // Assuming this column stores the file path

			// Check if the file exists
			if (file_exists($file_path)) {
				// Serve the file with proper headers for PDF preview
				header('Content-Type: application/pdf');
				header('Content-Disposition: inline; filename="' . basename($file_path) . '"');
				header('Content-Length: ' . filesize($file_path));

				// Output the file
				readfile($file_path);

				$this->session->set_flashdata('error', 'Sorry, this document doesn\'t have a downloadable PDF.');
				redirect('http://localhost/GitHub/facultyportal/index.php/faculty_controllers/ResearchOutputs/index');
				}
		} else {
			// Handle the case where the database query does not return any result
			echo "Error: No research found with the given ID.";
		}
	}
}
