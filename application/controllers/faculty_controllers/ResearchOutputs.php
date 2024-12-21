<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class ResearchOutputs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('');
		$this->load->helper('url');
	}

	public function index() // http://localhost/GitHub/facultyportal/index.php/faculty_controllers/ResearchOutputs/index
	{
		$this->load->view('faculty/research_outputs/index');
	}
}
