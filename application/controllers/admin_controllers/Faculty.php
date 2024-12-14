<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Faculty extends CI_Controller {
	public function index()
	{
		$this->load->view('admin/faculty/index');
	}

	public function createFaculty()
	{
		$this->load->view('admin/faculty/create');
	}

	public function editFaculty()
	{
		$this->load->view('admin/faculty/edit');
	}

	public function deleteFaculty()
	{
		
	}
}
