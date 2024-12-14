<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Profile extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('common_models/Profile_model');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('profile/index');
	}

	public function editProfile()
	{
		$this->load->view('profile/edit');
	}
}
