<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Courses extends CI_Controller {
	public function index()
	{
		$this->load->view('admin/courses/index');
	}
}
