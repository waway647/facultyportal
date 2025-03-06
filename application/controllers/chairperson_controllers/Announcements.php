<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Announcements extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('chairperson_models/Announcement_model');
		$this->load->model('common_models/Faculty_model');
		$this->load->helper('url');
	}

	public function index() // http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Announcements/index
	{
		$user_id = $this->session->userdata('logged_id');
		$data['faculty'] = $this->Faculty_model->getFacultyProfile($user_id);

		$logged_user_id = $this->session->userdata('logged_id');

		$faculty_id = $this->Faculty_model->getFacultyID($logged_user_id);
		$data['full_name'] = $this->Faculty_model->getFaculty($faculty_id);
		if($faculty_id)
		{
			$this->session->set_userdata('faculty_id', $faculty_id);

			$this->load->view('chairperson/announcements/index', $data);
		}
	}

	public function createAnnouncement() {
		// Validate required fields
		$title = $this->input->post('title', TRUE);
		$content = $this->input->post('content', TRUE);
	
		if (empty($title) || empty($content)) {
			$this->session->set_flashdata('error', 'Title and content are required.');
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Announcements/index');
			return;
		}
	
		// Configuration for file upload
		$config['upload_path'] = './assets/announcement_attachments/';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
		$config['max_size'] = 32768; // Maximum file size in KB (32MB)
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
	
		$attachment_paths = [];
	
		// Handle announcement data from the form
		$announcement_data = array(
			'faculty_profile_id' => $this->session->userdata('faculty_id'),
			'title' => $title,
			'content' => $content,
			'created_at' => date('Y-m-d H:i:s')
		);
	
		// Start a transaction
		$this->db->trans_start();
	
		// Insert announcement and get the new ID
		$this->db->insert('announcements', $announcement_data);
		$announcement_id = $this->db->insert_id();
	
		// Check if files are uploaded and process them
		if (isset($_FILES['announcement_file_path']) && !empty($_FILES['announcement_file_path']['name']) && is_array($_FILES['announcement_file_path']['name'])) {
			$files = $_FILES['announcement_file_path'];
			$file_count = count($files['name']);
	
			for ($i = 0; $i < $file_count; $i++) {
				if (!empty($files['name'][$i])) { // Ensure each file has a name
					$_FILES['temp_file']['name'] = $files['name'][$i];
					$_FILES['temp_file']['type'] = $files['type'][$i];
					$_FILES['temp_file']['tmp_name'] = $files['tmp_name'][$i];
					$_FILES['temp_file']['error'] = $files['error'][$i];
					$_FILES['temp_file']['size'] = $files['size'][$i];
	
					$this->upload->initialize($config);
	
					if ($this->upload->do_upload('temp_file')) {
						$uploaded_data = $this->upload->data();
						$attachment_path = 'assets/announcement_attachments/' . $uploaded_data['file_name'];
						$attachment_paths[] = $attachment_path;
					} else {
						$error = $this->upload->display_errors();
						log_message('error', 'File upload failed: ' . $error);
						$this->session->set_flashdata('error', 'One or more file uploads failed: ' . $error);
						$this->db->trans_rollback();
						redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Announcements/index');
						return;
					}
				}
			}
		} else {
			// Log or debug if no files are uploaded or the structure is invalid
			log_message('debug', 'No files uploaded or invalid file array: ' . print_r($_FILES['announcement_file_path'], true));
		}
	
		// Insert each attachment into the database
		foreach ($attachment_paths as $path) {
			$attachment_data = array(
				"announcement_id" => $announcement_id,
				"announcement_file_path" => $path
			);
			$result = $this->Announcement_model->insertAnnouncement($attachment_data);
			if (!$result) {
				$this->session->set_flashdata('error', 'Failed to save attachment to database.');
				$this->db->trans_rollback();
				redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Announcements/index');
				return;
			}
		}
	
		// Complete the transaction
		$this->db->trans_complete();
	
		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata('error', 'Failed to create announcement and attachments.');
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Announcements/index');
			return;
		}
	
		if (!empty($attachment_paths)) {
			$this->session->set_flashdata('success', 'Announcement and attachments created successfully.');
		} else {
			$this->session->set_flashdata('info', 'Announcement created without attachments.');
		}
	
		redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Announcements/index');
	}
	/* $faculty_id = $this->session->userdata('faculty_id'); */
	/* if ($faculty_id) {
			$announcement_data = array(
				
				"announcement_file_path" => $this->input->post();
			);

			$announcement_id = $this->Announcement_model->insertAnnouncement($faculty_id);
			if($announcement_id) {
				$attachment_data = array(
					"announcement_id" => $announcement_id,
					"announcement_file_path" => $attachment_path
				);
				$this->Announcement_model->insertAttachment($announcement_data);
			}
			
			if($this->Announcement_model->insertAnnouncement($attachment_data))
			{
				redirect('http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/editProfile');
			}else{
				redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/index');
			}
		} */
}
