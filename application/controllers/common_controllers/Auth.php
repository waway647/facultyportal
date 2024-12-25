<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('common_models/Auth_model');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index() // http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/index
	{
		$this->load->view('auth/login');
	}

	public function procLogin()
    {
        // Get the email and password from POST data
        $email_frompost = $this->input->post('email');
        $pass_frompost = $this->input->post('pass');

        // Call the model function to check credentials
        $result = $this->Auth_model->checkCredentials($email_frompost, $pass_frompost);

        // If credentials are valid, login is successful
        if ($result == true) {		
			//get user fullname
			$userinfo = $this->Auth_model->getAccount($email_frompost);
			if($userinfo == true)
			{
				$this->session->set_userdata(array(
					'logged_id' => $userinfo->id,
					'logged_role_name' => $userinfo->role_name,
					'logged_first_name' => $userinfo->first_name,
					'logged_last_name' => $userinfo->last_name,
					'logged_role' => $userinfo->role_name,
					'logged_email' => $email_frompost
				));

				if($userinfo->role_name == 'Admin'){
					redirect('http://localhost/GitHub/facultyportal/index.php/admin_controllers/Dashboard/index');
				}
				elseif($userinfo->role_name == 'Faculty'){
					redirect('http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Dashboard/index');
				}
				elseif($userinfo->role_name == 'Department Chair'){
					redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Dashboard/index');
				}
				else {
					// invalid login! go back to login page
					redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/index');
				}
				
			}
        } else {
            // invalid login! go back to login page
			redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/index');
        }
    }

	public function logout()
	{
		$this->session->sess_destroy();
	}

}
