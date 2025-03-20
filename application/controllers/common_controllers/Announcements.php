<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Announcements extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('common_models/Announcement_model');
		$this->load->model('common_models/Faculty_model');
		$this->load->helper('url');
	}

	public function index() // http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index
	{
		$user_id = $this->session->userdata('logged_id');
        $role_name = $this->session->userdata('logged_role_name');
		$data['faculty'] = $this->Faculty_model->getFacultyProfile($user_id);

		$faculty_id = $this->Faculty_model->getFacultyID($user_id);
		$data['full_name'] = $this->Faculty_model->getFaculty($faculty_id);

		if($role_name == 'Department Chair')
		{
			$this->session->set_userdata('faculty_id', $faculty_id);

			$this->load->view('chairperson/announcements/index', $data);

		}else if($role_name == 'Faculty')
        {
            $this->session->set_userdata('faculty_id', $faculty_id);

            $this->load->view('faculty/announcements/index', $data);
        }
	}

    public function getAnnouncements(){
		$this->output->set_content_type('application/json');
		$role_name = $this->session->userdata('logged_role_name');

		$search = $this->input->get('search');
		$sort = $this->input->get('sort'); 
		$byDate = $this->input->get('date');
		if($search){
			$result = $this->Announcement_model->getAnnouncementsBySearch($search);
		}else if($sort){
			$result = $this->Announcement_model->getAnnouncementsBySort($sort);
		}else if($byDate){
			$result = $this->Announcement_model->getAnnouncementsByDate($byDate);
		}else {
			$result = $this->Announcement_model->getAnnouncements('');
		}

		$data = [
			'announcements' => $result,
        	'role_name' => $role_name
		];

		echo json_encode($data);
	} 

	public function getTotalAnnouncements(){
		$this->output->set_content_type('application/json');
		$result = $this->Announcement_model->getTotalAnnouncements();
		echo json_encode($result);
	}

	public function createAnnouncement() {

		date_default_timezone_set('Asia/Manila');
		
		// Validate required fields
		$title = $this->input->post('title', TRUE);
		$content = $this->input->post('content', TRUE);
	
		if (empty($title) || empty($content)) {
			$this->session->set_flashdata('error', 'Title and content are required.');
			redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index');
			return;
		}
	
		// Configuration for file upload
		$config['upload_path'] = './assets/announcement_attachments/';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
		$config['max_size'] = 32768; // Maximum file size in KB (32MB)
	
		// Ensure upload directory exists
		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, true);
		}
	
		$this->load->library('upload', $config);
	
		$attachment_paths = [];
	
		// Handle announcement data from the form
		$announcement_data = array(
			'faculty_profile_id' => $this->session->userdata('faculty_id'),
			'title' => $title,
			'content' => $content,
			'from' => 'Chairperson', // Adjust based on your logic (e.g., from session or form)
			'created_at' => date('Y-m-d H:i:s')
		);
	
		// Start a transaction
		$this->db->trans_start();
	
		// Insert announcement and get the new ID via the model
		$announcement_id = $this->Announcement_model->insertAnnouncement($announcement_data);
		if (!$announcement_id) {
			$this->session->set_flashdata('error', 'Failed to create announcement.');
			$this->db->trans_rollback();
			redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index');
			return;
		}
	
		// Log the announcement ID for debugging
		log_message('debug', 'Created announcement with ID: ' . $announcement_id);
	
		// Check if files are uploaded and process them
		if (isset($_FILES['announcement_file_path']) && !empty($_FILES['announcement_file_path']['name'])) {
			log_message('debug', '$_FILES[\'announcement_file_path\']: ' . print_r($_FILES['announcement_file_path'], true));
	
			// Handle multiple files if name is an array
			if (is_array($_FILES['announcement_file_path']['name'])) {
				$files = $_FILES['announcement_file_path'];
				$file_count = count($files['name']);
	
				for ($i = 0; $i < $file_count; $i++) {
					if (!empty($files['name'][$i])) { // Ensure each file has a name
						$_FILES['temp_file']['name'] = $files['name'][$i];
						$_FILES['temp_file']['type'] = $files['type'][$i];
						$_FILES['temp_file']['tmp_name'] = $files['tmp_name'][$i];
						$_FILES['temp_file']['error'] = $files['error'][$i];
						$_FILES['temp_file']['size'] = $files['size'][$i];
	
						$this->upload->initialize($config);
	
						if ($this->upload->do_upload('temp_file')) {
							$uploaded_data = $this->upload->data();
							$attachment_path = 'assets/announcement_attachments/' . $uploaded_data['file_name'];
							$attachment_paths[] = $attachment_path;
							log_message('debug', 'Uploaded file: ' . $attachment_path);
						} else {
							$error = $this->upload->display_errors();
							log_message('error', 'File upload failed for file ' . $files['name'][$i] . ': ' . $error);
							$this->session->set_flashdata('error', 'One or more file uploads failed: ' . $error);
							$this->db->trans_rollback();
							redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index');
							return;
						}
					}
				}
			} else {
				// Handle single file (though we expect an array due to name="announcement_file_path[]")
				log_message('debug', 'Single file detected (unexpected): ' . $_FILES['announcement_file_path']['name']);
				if ($this->upload->do_upload('announcement_file_path')) {
					$uploaded_data = $this->upload->data();
					$attachment_path = 'assets/announcement_attachments/' . $uploaded_data['file_name'];
					$attachment_paths[] = $attachment_path;
					log_message('debug', 'Uploaded file: ' . $attachment_path);
				} else {
					$error = $this->upload->display_errors();
					log_message('error', 'File upload failed: ' . $error);
					$this->session->set_flashdata('error', 'File upload failed: ' . $error);
					$this->db->trans_rollback();
					redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index');
					return;
				}
			}
		} else {
			log_message('debug', 'No files uploaded or invalid file array: ' . print_r($_FILES['announcement_file_path'] ?? [], true));
		}
	
		// Insert each attachment into the database
		foreach ($attachment_paths as $path) {
			$attachment_data = array(
				"announcement_id" => $announcement_id,
				"announcement_file_path" => $path,
			);
			log_message('debug', 'Inserting attachment: ' . print_r($attachment_data, true));
			$result = $this->Announcement_model->insertAttachment($attachment_data);
			if (!$result) {
				log_message('error', 'Failed to save attachment to database: ' . print_r($attachment_data, true));
				$this->session->set_flashdata('error', 'Failed to save attachment to database.');
				$this->db->trans_rollback();
				redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index');
				return;
			}
		}

		// Insert notification for the announcement
			$notification_data = array(
				'notifiable_id' => $announcement_id,
				'notifiable_type' => 'announcement',
				'status' => 'unread',
			);
			log_message('debug', 'Inserting notification: ' . print_r($notification_data, true));
			$notification_result = $this->Announcement_model->insertNotification($notification_data);
			if (!$notification_result) {
				log_message('error', 'Failed to save notification to database: ' . print_r($notification_data, true));
				$this->session->set_flashdata('error', 'Failed to save notification to database.');
				$this->db->trans_rollback();
				redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index');
				return;
			}
		
	
		// Complete the transaction
		$this->db->trans_complete();
	
		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata('error', 'Failed to create announcement and attachments.');
			redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index');
			return;
		}
	
		if (!empty($attachment_paths)) {
			$this->session->set_flashdata('success', 'Announcement and attachments created successfully.');
		} else {
			$this->session->set_flashdata('info', 'Announcement created without attachments.');
		}
	
		redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index');
	}

	public function view($announcement_id) {
        // Validate the announcement_id
        if (!is_numeric($announcement_id) || $announcement_id <= 0) {
            $this->session->set_flashdata('error', 'Invalid announcement ID.');
            redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index');
            return;
        }

        // Fetch the announcement details
        $announcement = $this->Announcement_model->getAnnouncementById($announcement_id);

        if (!$announcement) {
            $this->session->set_flashdata('error', 'Announcement not found.');
            redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index');
            return;
        }

        // Fetch the attachments for this announcement
        $attachments = $this->Announcement_model->getAttachmentsByAnnouncementId($announcement_id);

        // Mark the notification as read (if applicable)
        $this->db->where('notifiable_id', $announcement_id);
        $this->db->where('notifiable_type', 'announcement');
        $this->db->update('notifications', array('status' => 'read'));

        // Pass data to the view
        $data = array(
            'announcement' => $announcement,
            'attachments' => $attachments
        );

		$user_id = $this->session->userdata('logged_id');
        $role_name = $this->session->userdata('logged_role_name');
		$data['faculty'] = $this->Faculty_model->getFacultyProfile($user_id);

		$faculty_id = $this->Faculty_model->getFacultyID($user_id);
		$data['full_name'] = $this->Faculty_model->getFaculty($faculty_id);

		if($role_name == 'Department Chair')
		{
			$this->session->set_userdata('faculty_id', $faculty_id);

			$this->load->view('chairperson/announcements/view', $data);

		}else if($role_name == 'Faculty')
        {
            $this->session->set_userdata('faculty_id', $faculty_id);

            $this->load->view('faculty/announcements/view', $data);
        }
    }

	public function edit($announcement_id){

		if (!is_numeric($announcement_id) || $announcement_id <= 0) {
            $this->session->set_flashdata('error', 'Invalid announcement ID.');
            redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index');
            return;
        }

		$announcement = $this->Announcement_model->getAnnouncementById($announcement_id);

		if (!$announcement) {
            $this->session->set_flashdata('error', 'Announcement not found.');
            redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index');
            return;
        }

		$attachments = $this->Announcement_model->getAttachmentsByAnnouncementId($announcement_id);

		$data = array(
			'announcement' => $announcement,
			'attachments' => $attachments
		);

		$user_id = $this->session->userdata('logged_id');
		$data['faculty'] = $this->Faculty_model->getFacultyProfile($user_id);

		$faculty_id = $this->Faculty_model->getFacultyID($user_id);
		$data['full_name'] = $this->Faculty_model->getFaculty($faculty_id);
		if($faculty_id)
		{
			$this->session->set_userdata('faculty_id', $faculty_id);

			$this->load->view('chairperson/announcements/edit', $data);
		}
	}

	public function delete($announcement_id) {
        if (!is_numeric($announcement_id) || $announcement_id <= 0) {
            $response = array('success' => false, 'message' => 'Invalid announcement ID.');
            echo json_encode($response);
            return;
        }

        $announcement = $this->Announcement_model->getAnnouncementById($announcement_id);
        if (!$announcement) {
            $response = array('success' => false, 'message' => 'Announcement not found.');
            echo json_encode($response);
            return;
        }

        // Start a transaction
        $this->db->trans_start();

        // Delete attachments from server and database
        $attachments = $this->Announcement_model->getAttachmentsByAnnouncementId($announcement_id);
        foreach ($attachments as $attachment) {
            $file_path = FCPATH . $attachment->announcement_file_path;
            if (file_exists($file_path)) {
                unlink($file_path); // Delete the file from the server
            }
        }
		
        // Delete attachments from database
        $this->db->where('announcement_id', $announcement_id);
        $this->db->delete('announcement_attachments');

        // Delete notifications
        $this->db->where('notifiable_id', $announcement_id);
        $this->db->where('notifiable_type', 'announcement');
        $this->db->delete('notifications');

        // Delete the announcement
        $this->db->where('id', $announcement_id);
        $this->db->delete('announcements');

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $response = array('success' => false, 'message' => 'Failed to delete announcement.');
            echo json_encode($response);
            return;
        }

        $response = array('success' => true, 'message' => 'Announcement deleted successfully.');
        echo json_encode($response);
    }

	public function update($announcement_id) {
        date_default_timezone_set('Asia/Manila');

        // Validate announcement ID
        if (!is_numeric($announcement_id) || $announcement_id <= 0) {
            $this->session->set_flashdata('error', 'Invalid announcement ID.');
            redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index');
            return;
        }

        // Fetch existing announcement
        $announcement = $this->Announcement_model->getAnnouncementById($announcement_id);
        if (!$announcement) {
            $this->session->set_flashdata('error', 'Announcement not found.');
            redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index');
            return;
        }

        // Prepare announcement data from form
        $title = $this->input->post('title', TRUE);
        $content = $this->input->post('content', TRUE);

        if (empty($title) || empty($content)) {
            $this->session->set_flashdata('error', 'Title and content are required.');
            redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/edit/' . $announcement_id);
            return;
        }

        // Start a transaction
        $this->db->trans_start();

        // Update announcement
        $update_data = array(
            'title' => $title,
            'content' => $content,
            'updated_at' => date('Y-m-d H:i:s')
        );

		$this->Announcement_model->updateAnnouncement($announcement_id, $update_data);

        // Handle new file uploads
        if (isset($_FILES['announcement_file_path']) && !empty($_FILES['announcement_file_path']['name'][0])) {
            $config['upload_path'] = './assets/announcement_attachments/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
            $config['max_size'] = 32768; // 32MB in KB
            $config['encrypt_name'] = FALSE; // Use original filename as requested

            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            $this->load->library('upload', $config);

            if (is_array($_FILES['announcement_file_path']['name'])) {
                $files = $_FILES['announcement_file_path'];
                $file_count = count($files['name']);

                for ($i = 0; $i < $file_count; $i++) {
                    if (!empty($files['name'][$i])) {
                        $_FILES['temp_file']['name'] = $files['name'][$i];
                        $_FILES['temp_file']['type'] = $files['type'][$i];
                        $_FILES['temp_file']['tmp_name'] = $files['tmp_name'][$i];
                        $_FILES['temp_file']['error'] = $files['error'][$i];
                        $_FILES['temp_file']['size'] = $files['size'][$i];

                        $this->upload->initialize($config);

                        if ($this->upload->do_upload('temp_file')) {
                            $uploaded_data = $this->upload->data();
                            $attachment_path = 'assets/announcement_attachments/' . $uploaded_data['file_name'];
                            $attachment_data = array(
                                'announcement_id' => $announcement_id,
                                'announcement_file_path' => $attachment_path
                            );
                            $this->Announcement_model->insertAttachment($attachment_data);
                        } else {
                            $error = $this->upload->display_errors();
                            log_message('error', 'File upload failed: ' . $error);
                            $this->session->set_flashdata('error', 'One or more file uploads failed: ' . $error);
                            $this->db->trans_rollback();
                            redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/edit/' . $announcement_id);
                            return;
                        }
                    }
                }
            }
        }

        // Complete the transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('error', 'Failed to update announcement.');
            redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/edit/' . $announcement_id);
            return;
        }

        $this->session->set_flashdata('success', 'Announcement updated successfully.');
        redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index');
    }

	public function delete_attachment($attachment_id) {
		// Validate attachment ID
		if (!is_numeric($attachment_id) || $attachment_id <= 0) {
			$this->session->set_flashdata('error', 'Invalid attachment ID.');
			redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index');
			return;
		}
	
		// Fetch attachment
		$attachment = $this->Announcement_model->getAttachmentById($attachment_id);
	
		// Start a transaction
		$this->db->trans_start();
	
		// Delete file from server
		$file_path = FCPATH . $attachment->announcement_file_path;
		if (file_exists($file_path) && strpos($file_path, FCPATH . 'assets/announcement_attachments/') === 0) {
			unlink($file_path);
		}
	
		// Delete attachment from database
		$this->db->where('id', $attachment_id);
		$this->db->delete('announcement_attachments');
	
		// Complete the transaction
		$this->db->trans_complete();
	
		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata('error', 'Failed to delete attachment.');
			redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/edit/' . $attachment->announcement_id);
			return;
		}
	
		$this->session->set_flashdata('success', 'Attachment deleted successfully.');
		redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/edit/' . $attachment->announcement_id);
	}

}
