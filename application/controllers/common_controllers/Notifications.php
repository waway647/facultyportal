<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Notifications extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('common_models/Notifications_model');
		$this->load->helper('url');
	}

    public function getNotifications() {
		$result = $this->Notifications_model->getNotifications();  // Fetch data from SQL view
		echo json_encode($result);  // Return data as JSON
	}
}
