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

	public function index() // http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Account/index
	{
		$user_id = $this->session->userdata('logged_id');

		$data['faculty'] = $this->Faculty_model->getFacultyProfile($user_id);

		$logged_user_id = $this->session->userdata('logged_id');

		$faculty_id = $this->Faculty_model->getFacultyID($logged_user_id);
		if($faculty_id)
		{
			$this->session->set_userdata('faculty_id', $faculty_id);
			$data['user_address'] = $this->Faculty_model->getUserAddress($faculty_id);

			$this->load->view('faculty/account/index', $data);
		}
	}

	public function edit(){
		$user_id = $this->session->userdata('logged_id');

		// Fetch faculty profile
		$data['faculty'] = $this->Faculty_model->getFacultyProfile($user_id);

		// Fetch faculty ID for the logged-in user
		$logged_user_id = $this->session->userdata('logged_id');
		$faculty_id = $this->Faculty_model->getFacultyID($logged_user_id);

		if ($faculty_id) {
			// Set faculty_id in session
			$this->session->set_userdata('faculty_id', $faculty_id);

			// Fetch the address for this faculty using faculty_profile_id
			$data['user_address'] = $this->Faculty_model->getUserAddress($faculty_id);

			// Load the edit view with all data
			$this->load->view('faculty/account/edit', $data);
		} else {
			// Handle case where faculty_id is not found
			show_error('Faculty ID not found for the logged-in user.', 404);
		}
	}

	public function updateProfile()
	{
		$user_id = $this->session->userdata('logged_id');
		$faculty_id = $this->session->userdata('faculty_id');

		$user_data = array(
			"id" => $user_id,
			"email" => $this->input->post("email"),
			"mobile_number" => $this->input->post("mobile_number"),
			"first_name" => $this->input->post("first_name"),
			"last_name" => $this->input->post("last_name"),
			"middle_name" => $this->input->post("middle_name"),
			"birthday" => $this->input->post("birthday"),
			"gender" => $this->input->post("gender"),
			"civil_status" => $this->input->post("civil_status"),
			"religion" => $this->input->post("religion"),
			"citizenship" => $this->input->post("citizenship")
		);

		$user_address = array(
			"faculty_profile_id" => $faculty_id,
			"house_address" => $this->input->post("house_address"),
			"barangay" => $this->input->post("barangay"),
			"city" => $this->input->post("city"),
			"region" => $this->input->post("region"),
			"zip_code" => $this->input->post("zip_code")
		);

		$result = $this->Faculty_model->updateProfile($user_id, $user_data);
		if($result)
		{
			$address_exist = $this->Faculty_model->checkAddressIfExisting($faculty_id);
			if($address_exist == $faculty_id) {
				$this->Faculty_model->updateAddress($faculty_id, $user_address);
				redirect('http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Account/index');
			} else {
				$this->Faculty_model->createAddress($user_address);
				redirect('http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Account/index');
			}
		}
	}
}
