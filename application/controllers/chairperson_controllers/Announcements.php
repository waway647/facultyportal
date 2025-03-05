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

	/* public function createAnnouncement() {
		$config['upload_path'] = './assets/announcement_attachments/';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
		$this->load->library('upload', $config);

		$files = $_FILES;
		$file_count = isset($_FILES['announcement_file_path']['name']) && is_array($_FILES['announcement_file_path']['name']) ? count($_FILES['announcement_file_path']['name']) : 0;
		$attachment_paths = array();

		for($i = 0; $i < $file_count; $i++) {
			$_FILES['announcement_file_path']['name'] = $files['announcement_file_path']['name'][$i];
			$_FILES['announcement_file_path']['type'] = $files['announcement_file_path']['type'][$i];
			$_FILES['announcement_file_path']['tmp_name'] = $files['announcement_file_path']['tmp_name'][$i];
			$_FILES['announcement_file_path']['error'] = $files['announcement_file_path']['error'][$i];
			$_FILES['announcement_file_path']['size'] = $files['announcement_file_path']['size'][$i];

			if($this->upload->do_upload('announcement_file_path')){
				$uploaded_data = $this->upload->data();
				$attachment_paths[] = 'assets/announcement_attachments/' . $uploaded_data['file_name'];
			}
		}

		$announcement_data = array(
			// Add other announcement data here
		);
		$announcement_id = $this->Announcement_model->insertAnnouncement($announcement_data);

		if ($announcement_id) {
			foreach ($attachment_paths as $attachment_path) {
				$attachment_data = array(
					"announcement_id" => $announcement_id,
					"announcement_file_path" => $attachment_path
				);
				$this->Announcement_model->insertAttachment($attachment_data);
			}
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Announcements/index');
		}
	} */
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
