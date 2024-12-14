<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Roles extends CI_Controller {
	public function index()
	{
		$this->load->view('admin/roles/index');
	}
}
