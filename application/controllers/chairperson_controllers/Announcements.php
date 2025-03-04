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
		if($faculty_id)
		{
			$this->session->set_userdata('faculty_id', $faculty_id);

			$this->load->view('chairperson/announcements/index', $data);
		}
	}

	public function createAnnouncement() {
		$config['upload_path'] = './assets/announcement_attachments/';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
		$this->load->library('upload', $config);

		if($this->upload->do_upload('announcement_file_path')){
			$uploaded_data = $this->upload->data();
			$attachment_path = 'assets/announcement_attachments/' . $uploaded_data['file_name'];
			
		}
		/* $faculty_id = $this->session->userdata('faculty_id'); */

		$attachment_data = array(
			"announcement_id" => '1',
			"announcement_file_path" => $attachment_path
		);
		$result = $this->Announcement_model->insertAnnouncement($attachment_data);
		if ($result) {
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Announcements/index');
		}


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
}
