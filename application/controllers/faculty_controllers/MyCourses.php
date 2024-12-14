<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class MyCourses extends CI_Controller {
	public function index()
	{
		$this->load->view('faculty/mycourses/index');
	}
}
