<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Consultations extends CI_Controller {
	public function index()
	{
		$this->load->view('admin/consultations/index');
	}
}
