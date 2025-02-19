<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('common_models/Faculty_model');
		$this->load->helper('url');
	}

	public function index() // http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Account/index
	{
		$faculty_id = $this->session->userdata('logged_id');
		$data['faculty'] = $this->Faculty_model->getFacultyProfile($faculty_id);

		$this->load->view('chairperson/account/index', $data);
	}

	public function changeProfilePic()
	{
		$config['upload_path'] = './assets/images/profile/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('profile_picture')) {
			$uploaded_data = $this->upload->data();
			$attachment_path = 'assets/images/profile/' . $uploaded_data['file_name'];
		} else {
			$error = $this->upload->display_errors();
			echo json_encode(['status' => 'error', 'message' => $error]);
			return;
		}

		$logged_id = $this->session->userdata('logged_id');

		// Pass the uploaded profile picture path to the model method
		$this->Faculty_model->changeProfilePic($logged_id, ['profile_picture' => $attachment_path]);

		// Respond with a JSON success message
		echo json_encode([
			'status' => 'success',
			'profile_picture' => base_url($attachment_path),
			'message' => 'Profile picture updated successfully.'
		]);
	}

	public function edit() // http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Account/edit
	{
		$this->load->model('common_models/Faculty_model');
		$faculty_id = $this->session->userdata('logged_id');
		$data['faculty'] = $this->Faculty_model->getFacultyProfile($faculty_id);

		$this->load->view('chairperson/account/edit', $data);
	}

	public function updateProfile()
	{
		$user_id = $this->session->userdata('logged_id');

		$user_data = array(
			"id" => $user_id,
			"email" => $this->input->post("email"),
			"pass" => $this->input->post("pass"),
			"mobile_number" => $this->input->post("mobile_number"),
			"first_name" => $this->input->post("first_name"),
			"last_name" => $this->input->post("last_name"),
			"middle_name" => $this->input->post("middle_name"),
			"birthday" => $this->input->post("birthday")
		);

		$result = $this->Faculty_model->updateProfile($user_id, $user_data);
		if($result)
		{
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Account/index');
		}
	}

	public function editPrivacy() // http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Account/editPrivacy
	{
		$this->load->model('common_models/Faculty_model');
		$faculty_id = $this->session->userdata('logged_id');
		$data['faculty'] = $this->Faculty_model->getFacultyProfile($faculty_id);

		$this->load->view('chairperson/account/editPrivacy', $data);
	}
}
