<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class SystemSettings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('');
		$this->load->helper('url');
	}

	public function index() // http://localhost/GitHub/facultyportal/index.php/admin_controllers/SystemSettings/index
	{
		$this->load->view('admin/system_settings/index');
	}
}