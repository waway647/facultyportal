<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Profile extends CI_Controller {
	
	public function index()
	{
		$this->load->view('profile/view');
	}

	public function editProfile()
	{
		$this->load->view('profile/edit');
	}
}
