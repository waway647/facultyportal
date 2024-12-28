<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('chairperson_models/Profile_model');
		$this->load->helper('url');
	}

	public function index($logged_id = null) // http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/index
	{
		$logged_id = $this->session->userdata('logged_id');

		if ($logged_id) {
			// Clear current_id to prevent interference when viewing own profile
			$this->session->unset_userdata('current_id');
			
			$data['faculty'] = $this->Profile_model->getFacultyProfile($logged_id);
			$this->load->view('chairperson/profile/index', $data);
		} else {
			redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/index');
		}
	}

	public function viewProfile($current_id)
	{
		if (!$current_id) {
			// Redirect to the logged-in user's profile if no ID is provided
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/index');
		}
	
		// Set current_id to allow viewing another user's profile
		$this->session->set_userdata('current_id', $current_id);
	
		$data['faculty'] = $this->Profile_model->getFacultyProfile($current_id);
		$this->load->view('chairperson/profile/index', $data);
	}

	public function editProfile()
	{
		$current_id = $this->session->userdata('current_id') ?: $this->session->userdata('logged_id');

		if ($current_id) {
			$data['faculty'] = $this->Profile_model->getFacultyProfile($current_id);
			$this->load->view('chairperson/profile/edit', $data);
		} else {
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/index');
		}
	}

	public function cancelEdit()
	{
		$current_id = $this->session->userdata('current_id');

		if ($current_id) {
			// Restore data from qualifications_bin to qualifications for the given faculty_id
			$this->db->trans_start();
			
			$this->Profile_model->deleteAllDataByFacultyId($current_id);

			// Get the original profile picture from the database (before the edit)
			$faculty = $this->Profile_model->getFacultyProfile($current_id);
			$original_profile_pic = $faculty->profile_picture; // Store the original image path
	
			// Revert the profile picture to the original image
			$user_id = $this->Profile_model->getUserIdByFacultyProfileId($current_id);
			if ($user_id) {
				// Update the profile picture to the original one
				$this->Profile_model->updateProfile($user_id, ['profile_picture' => $original_profile_pic]);
			}

					//Qualifications
					$this->db->query("
						INSERT INTO qualifications (faculty_profile_id, academic_degree, institution, year_graduated)
						SELECT faculty_profile_id, academic_degree, institution, year_graduated
						FROM qualifications_bin
						WHERE faculty_profile_id = ?
					", array($current_id));

						// Delete restored data from qualifications_bin
						$this->db->query("
							DELETE FROM qualifications_bin
							WHERE faculty_profile_id = ?
						", array($current_id));

					//Experience
					$this->db->query("
						INSERT INTO industry_experience (faculty_profile_id, company_name, job_position, years_of_experience)
						SELECT faculty_profile_id, company_name, job_position, years_of_experience
						FROM industry_experience_bin
						WHERE faculty_profile_id = ?
					", array($current_id));

						// Delete restored data from industry_experience_bin
						$this->db->query("
							DELETE FROM industry_experience_bin
							WHERE faculty_profile_id = ?
						", array($current_id));

					//Research
					$this->db->query("
						INSERT INTO research_outputs (faculty_profile_id, title, publication_year, research_attachment)
						SELECT faculty_profile_id, title, publication_year, research_attachment
						FROM research_outputs_bin
						WHERE faculty_profile_id = ?
					", array($current_id));

						// Delete restored data from research_outputs_bin
						$this->db->query("
							DELETE FROM research_outputs_bin
							WHERE faculty_profile_id = ?
						", array($current_id));

			$this->db->trans_complete();

			// Redirect to view profile
			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/viewProfile/' . $current_id);
		}

		$logged_id = $this->session->userdata('logged_id');

		if ($logged_id) {
			$this->db->trans_start();
			
			$this->Profile_model->deleteAllDataByFacultyId($logged_id);

			// Get the original profile picture from the database (before the edit)
			$faculty = $this->Profile_model->getFacultyProfile($logged_id);
			$original_profile_pic = $faculty->profile_picture; // Store the original image path
	
			// Revert the profile picture to the original image
			$user_id = $this->Profile_model->getUserIdByFacultyProfileId($logged_id);
			if ($user_id) {
				// Update the profile picture to the original one
				$this->Profile_model->updateProfile($user_id, ['profile_picture' => $original_profile_pic]);
			}

					//Qualifications
					$this->db->query("
						INSERT INTO qualifications (faculty_profile_id, academic_degree, institution, year_graduated)
						SELECT faculty_profile_id, academic_degree, institution, year_graduated
						FROM qualifications_bin
						WHERE faculty_profile_id = ?
					", array($logged_id));

						// Delete restored data from qualifications_bin
						$this->db->query("
							DELETE FROM qualifications_bin
							WHERE faculty_profile_id = ?
						", array($logged_id));

					//Experience
					$this->db->query("
						INSERT INTO industry_experience (faculty_profile_id, company_name, job_position, years_of_experience)
						SELECT faculty_profile_id, company_name, job_position, years_of_experience
						FROM industry_experience_bin
						WHERE faculty_profile_id = ?
					", array($logged_id));

						// Delete restored data from qualifications_bin
						$this->db->query("
							DELETE FROM industry_experience_bin
							WHERE faculty_profile_id = ?
						", array($logged_id));

					//Research
					$this->db->query("
						INSERT INTO research_outputs (faculty_profile_id, title, publication_year, research_attachment)
						SELECT faculty_profile_id, title, publication_year, research_attachment
						FROM research_outputs_bin
						WHERE faculty_profile_id = ?
					", array($logged_id));

						// Delete restored data from research_outputs_bin
						$this->db->query("
							DELETE FROM research_outputs_bin
							WHERE faculty_profile_id = ?
						", array($logged_id));

			$this->db->trans_complete();

			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/index');
		} else {
			redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/index');
		}
	}

	public function updateProfile()
	{
		redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/index');
	}

	public function getQualifications()
	{
		$current_id = $this->session->userdata('current_id');
		$logged_id = $this->session->userdata('logged_id');

		$faculty_id = $current_id ?: $logged_id; // Use current_id if set, otherwise fallback to logged_id

		if ($faculty_id) {
			$result = $this->Profile_model->getQualifications($faculty_id);
			echo json_encode($result); // Return data as JSON
		} else {
			echo json_encode(['error' => 'No valid faculty ID found.']);
		}
	}

			public function createQualifications()
			{
				$current_id = $this->session->userdata('current_id');

				if ($current_id) {
					$qualification_data = array(
						"faculty_profile_id" => $current_id,
						"academic_degree" => $this->input->post("academic_degree"),
						"institution" => $this->input->post("institution"),
						"year_graduated" => $this->input->post("year_graduated")
					);

					$result = $this->Profile_model->insertNewQualification($qualification_data);
					if($result)
					{
						redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile');
					}
				} 

				$logged_id = $this->session->userdata('logged_id');

				if($logged_id) {
					$qualification_data = array(
						"faculty_profile_id" => $logged_id,
						"academic_degree" => $this->input->post("academic_degree"),
						"institution" => $this->input->post("institution"),
						"year_graduated" => $this->input->post("year_graduated")
					);

					$result = $this->Profile_model->insertNewQualification($qualification_data);
					if($result)
					{
						redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile');
					}
				} else {
					redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/index');
				}

			}

	public function getExperience()
	{
		$current_id = $this->session->userdata('current_id');
		$logged_id = $this->session->userdata('logged_id');

		$faculty_id = $current_id ?: $logged_id; // Use current_id if set, otherwise fallback to logged_id

		if ($faculty_id) {
			$result = $this->Profile_model->getExperience($faculty_id);
			echo json_encode($result); // Return data as JSON
		} else {
			echo json_encode(['error' => 'No valid faculty ID found.']);
		}
	}

			public function createExperience()
			{
				$current_id = $this->session->userdata('current_id');

				if ($current_id) {
					$experience_data = array(
						"faculty_profile_id" => $current_id,
						"company_name" => $this->input->post("company_name"),
						"job_position" => $this->input->post("job_position"),
						"years_of_experience" => $this->input->post("years_of_experience")
					);

					$result = $this->Profile_model->insertNewExperience($experience_data);
					if($result)
					{
						redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile');
					}
				} 

				$logged_id = $this->session->userdata('logged_id');

				if($logged_id) {
					$experience_data = array(
						"faculty_profile_id" => $logged_id,
						"company_name" => $this->input->post("company_name"),
						"job_position" => $this->input->post("job_position"),
						"years_of_experience" => $this->input->post("years_of_experience")
					);

					$result = $this->Profile_model->insertNewExperience($experience_data);
					if($result)
					{
						redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile');
					}
				} else {
					redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/index');
				}
			}

	public function getResearch()
	{
		$current_id = $this->session->userdata('current_id');
		$logged_id = $this->session->userdata('logged_id');

		$faculty_id = $current_id ?: $logged_id; // Use current_id if set, otherwise fallback to logged_id

		if ($faculty_id) {
			$result = $this->Profile_model->getResearch($faculty_id);
			echo json_encode($result); // Return data as JSON
		} else {
			echo json_encode(['error' => 'No valid faculty ID found.']);
		}
	}

			public function createResearch()
			{
				$config['upload_path'] = './assets/images/research_attachments/';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload('research_attachment')) {
					$uploaded_data = $this->upload->data();
					$attachment_path = 'assets/images/research_attachments/' . $uploaded_data['file_name'];
				}

				// Get faculty profile ID
				$current_id = $this->session->userdata('current_id');

				// Prepare research data to insert
				if ($current_id) {
					$research_data = array(
						"faculty_profile_id" => $current_id,
						"title" => $this->input->post("title"),
						"publication_year" => $this->input->post("publication_year"),
						"research_attachment" => $attachment_path
					);

					// Insert research data into database
					$result = $this->Profile_model->insertNewResearch($research_data);
					if ($result) {
						redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile');
					}
				}

				// Check if logged in by logged_id
				$logged_id = $this->session->userdata('logged_id');

				if ($logged_id) {
					$research_data = array(
						"faculty_profile_id" => $logged_id,
						"title" => $this->input->post("title"),
						"publication_year" => $this->input->post("publication_year"),
						"research_attachment" => $attachment_path
					);

					// Insert research data into database
					$result = $this->Profile_model->insertNewResearch($research_data);
					if ($result) {
						redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile');
					}
				} else {
					redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/index');
				}
			}

	public function insertUpdatedProfile()
	{
		$current_id = $this->session->userdata('current_id');

		if ($current_id) {
			// Save changes for the current profile
			$this->db->trans_start();

			// Fetch user_id from faculty_profiles
			$user_id = $this->Profile_model->getUserIdByFacultyProfileId($current_id);
			if (!$user_id) {
				show_error('User not found for the provided faculty_profile_id.');
				return;
			}

			//basic info update
			$basic_data = array(
				"first_name" => $this->input->post("first_name"),
				"middle_name" => $this->input->post("middle_name"),
				"last_name" => $this->input->post("last_name"),
				"birthday" => $this->input->post("birthday"),
				"email" => $this->input->post("email"),
				"mobile_number" => $this->input->post("mobile_number")
			);

			$this->Profile_model->updateProfile($user_id, $basic_data);

			// Check if the profile picture is being updated
			if ($_FILES['profile_picture']['name']) {
				$config['upload_path'] = './assets/images/profile/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$this->load->library('upload', $config);
	
				if ($this->upload->do_upload('profile_picture')) {
					$uploaded_data = $this->upload->data();
					$attachment_path = 'assets/images/profile/' . $uploaded_data['file_name'];
	
					// Update the profile picture path in the database
					$this->Profile_model->updateProfile($user_id, ['profile_picture' => $attachment_path]);
				} else {
					// Handle errors if upload fails
					echo $this->upload->display_errors();
					return;
				}
			}

			// Permanently delete qualifications_bin data for the current faculty_id
			$this->db->query("
				DELETE FROM qualifications_bin
				WHERE faculty_profile_id = ?
			", array($current_id));

			$this->Profile_model->insertQualifications($current_id);

			// Permanently delete industry_experience_bin data for the current faculty_id
			$this->db->query("
				DELETE FROM industry_experience_bin
				WHERE faculty_profile_id = ?
			", array($current_id));

			$this->Profile_model->insertIndustryExperience($current_id);

			// Permanently delete research_outputs_bin data for the current faculty_id
			$this->db->query("
				DELETE FROM research_outputs_bin
				WHERE faculty_profile_id = ?
			", array($current_id));

			$this->Profile_model->insertResearchOutputs($current_id);

			$this->db->trans_complete();

			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/viewProfile/' . $current_id);
		}

		$logged_id = $this->session->userdata('logged_id');

		if ($logged_id) {
			$this->db->trans_start();

			// Fetch user_id from faculty_profiles
			$user_id = $this->Profile_model->getUserIdByFacultyProfileId($logged_id);
			if (!$user_id) {
				show_error('User not found for the provided faculty_profile_id.');
				return;
			}

			//basic info update
			$basic_data = array(
				"first_name" => $this->input->post("first_name"),
				"middle_name" => $this->input->post("middle_name"),
				"last_name" => $this->input->post("last_name"),
				"birthday" => $this->input->post("birthday"),
				"email" => $this->input->post("email"),
				"mobile_number" => $this->input->post("mobile_number")
			);

			$this->Profile_model->updateProfile($user_id, $basic_data);

			// Check if the profile picture is being updated
			if ($_FILES['profile_picture']['name']) {
				$config['upload_path'] = './assets/images/profile/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$this->load->library('upload', $config);
	
				if ($this->upload->do_upload('profile_picture')) {
					$uploaded_data = $this->upload->data();
					$attachment_path = 'assets/images/profile/' . $uploaded_data['file_name'];
	
					// Update the profile picture path in the database
					$this->Profile_model->updateProfile($user_id, ['profile_picture' => $attachment_path]);
				} else {
					// Handle errors if upload fails
					echo $this->upload->display_errors();
					return;
				}
			}

			// Permanently delete qualifications_bin data for the current faculty_id
			$this->db->query("
				DELETE FROM qualifications_bin
				WHERE faculty_profile_id = ?
			", array($logged_id));

			$this->Profile_model->insertQualifications($logged_id);

			// Permanently delete industry_experience_bin data for the current faculty_id
			$this->db->query("
				DELETE FROM industry_experience_bin
				WHERE faculty_profile_id = ?
			", array($logged_id));

			$this->Profile_model->insertIndustryExperience($logged_id);

			// Permanently delete research_outputs_bin data for the current faculty_id
			$this->db->query("
				DELETE FROM research_outputs_bin
				WHERE faculty_profile_id = ?
			", array($logged_id));

			$this->Profile_model->insertResearchOutputs($logged_id);

			$this->db->trans_complete();

			redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/index');
		} else {
			redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/index');
		}
	}

	public function deleteQualifications($id)
	{
		// Check if the qualification exists in the temporary table
		$existsInTemp = $this->db
			->where('id', $id)
			->get('qualifications_temp')
			->num_rows();

		if ($existsInTemp > 0) {
			$qualification_data = $this->Profile_model->fetchQualifications_temp($id);
			if ($qualification_data) {
				// Backup to qualifications_bin
				$this->Profile_model->deleteQualifications_temp($qualification_data);

				// Delete from qualifications_temp
				$this->db->where('id', $id)->delete('qualifications_temp');
			}
		} else {
			// Check if the qualification exists in the main table
			$existsInMain = $this->db
				->where('id', $id)
				->get('qualifications')
				->num_rows();

			if ($existsInMain > 0) {
				$qualification_data = $this->Profile_model->fetchQualifications_main($id);
				if ($qualification_data) {
					// Backup to qualifications_bin
					$this->Profile_model->deleteQualifications_main($qualification_data);

					// Delete from qualifications
					$this->db->where('id', $id)->delete('qualifications');
				}
			}
		}

		// Redirect after deletion or failure
		redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile');
	}

	public function deleteExperience($id)
	{
		// Check if the industry_experience exists in the temporary table
		$existsInTemp = $this->db
			->where('id', $id)
			->get('industry_experience_temp')
			->num_rows();

		if ($existsInTemp > 0) {
			$experience_data = $this->Profile_model->fetchExperience_temp($id);
			if ($experience_data) {
				// Backup to industry_experience_bin
				$this->Profile_model->deleteExperience_temp($experience_data);

				// Delete from industry_experience_temp
				$this->db->where('id', $id)->delete('industry_experience_temp');
			}
		} else {
			// Check if the industry_experience exists in the main table
			$existsInMain = $this->db
				->where('id', $id)
				->get('industry_experience')
				->num_rows();

			if ($existsInMain > 0) {
				$experience_data = $this->Profile_model->fetchExperience_main($id);
				if ($experience_data) {
					// Backup to industry_experience_bin
					$this->Profile_model->deleteExperience_main($experience_data);

					// Delete from industry_experience
					$this->db->where('id', $id)->delete('industry_experience');
				}
			}
		}

		// Redirect after deletion or failure
		redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile');
	}

	public function deleteResearch($id)
	{
		// Check if the research_outputs exists in the temporary table
		$existsInTemp = $this->db
			->where('id', $id)
			->get('research_outputs_temp')
			->num_rows();

		if ($existsInTemp > 0) {
			$research_data = $this->Profile_model->fetchResearch_temp($id);
			if ($research_data) {
				// Backup to research_outputs_bin
				$this->Profile_model->deleteResearch_temp($research_data);

				// Delete from research_outputs_temp
				$this->db->where('id', $id)->delete('research_outputs_temp');
			}
		} else {
			// Check if the research exists in the main table
			$existsInMain = $this->db
				->where('id', $id)
				->get('research_outputs')
				->num_rows();

			if ($existsInMain > 0) {
				$research_data = $this->Profile_model->fetchResearch_main($id);
				if ($research_data) {
					// Backup to research_outputs_bin
					$this->Profile_model->deleteResearch_main($research_data);

					// Delete from research_outputs
					$this->db->where('id', $id)->delete('research_outputs');
				}
			}
		}

		// Redirect after deletion or failure
		redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile');
	}

	public function ViewResearchPDF($id)
	{
		// Fetch the PDF file path from the database
		$result = $this->Profile_model->ViewResearchPDF($id);

		if ($result) {
			$file_path = $result->research_attachment; // Assuming this column stores the file path

			// Check if the file exists
			if (file_exists($file_path)) {
				// Serve the file with proper headers for PDF preview
				header('Content-Type: application/pdf');
				header('Content-Disposition: inline; filename="' . basename($file_path) . '"');
				header('Content-Length: ' . filesize($file_path));

				// Output the file
				readfile($file_path);
			} else {
				$current_id = $this->session->userdata('current_id');
				if($current_id)
				{
					redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/viewProfile/' . $current_id);
				}

				$logged_id = $this->session->userdata('logged_id');
				if($logged_id)
				{
					redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/index');
				}
			}
		} else {
			// Handle the case where the database query does not return any result
			echo "Error: No research found with the given ID.";
		}
	}

	public function getProfilePic()
	{
		$current_id = $this->session->userdata('current_id');
		$logged_id = $this->session->userdata('logged_id');

		$faculty_id = $current_id ?: $logged_id; // Use current_id if set, otherwise fallback to logged_id

		if ($faculty_id) {
			$result = $this->Profile_model->getProfilePic($faculty_id);
			echo json_encode($result); // Return data as JSON
		} else {
			echo json_encode(['error' => 'No valid faculty ID found.']);
		}
	}

			public function changeProfilePic()
			{
				$config['upload_path'] = './assets/images/profile/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload('profile_picture')) {
					$uploaded_data = $this->upload->data();
					$attachment_path = 'assets/images/profile/' . $uploaded_data['file_name'];
				} else {
					echo $this->upload->display_errors(); // Debugging purpose
					return;
				}

				// Get faculty profile ID
				$current_id = $this->session->userdata('current_id');

				// Prepare research data to insert
				if ($current_id) {
					$user_id = $this->Profile_model->getUserIdByFacultyProfileId($current_id);
					if (!$user_id) {
						show_error('User not found for the provided faculty_profile_id.');
						return;
					}

					//basic info update
					$user_data = array(
						"profile_picture" => $attachment_path
					);

					// Insert research data into database
					$result = $this->Profile_model->updateProfile($user_id, $user_data);
					if ($result) {
						redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile');
					}
				}

				// Check if logged in by logged_id
				$logged_id = $this->session->userdata('logged_id');

				if ($logged_id) {
					$user_id = $this->Profile_model->getUserIdByFacultyProfileId($logged_id);
					if (!$user_id) {
						show_error('User not found for the provided faculty_profile_id.');
						return;
					}

					//basic info update
					$user_data = array(
						"profile_picture" => $attachment_path
					);

					// Insert research data into database
					$result = $this->Profile_model->updateProfile($user_id, $user_data);
					if ($result) {
						redirect('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/editProfile');
					}
				} else {
					redirect('http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/index');
				}
			}
}
