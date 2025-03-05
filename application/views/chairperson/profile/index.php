<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
	<title>Faculty Portal | San Beda University</title>
	<link rel="icon" href="<?php echo base_url('assets/images/logo/sbu_logo.svg'); ?>" type="image/x-icon">
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/globals.css?<?php echo time(); ?>"> 
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/style.css?<?php echo time(); ?>"> 
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/profile.css?<?php echo time(); ?>"> 
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/table.css?<?php echo time(); ?>"> 
  
	<!-- jQuery library -->
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	</head>
  <body>
  <div class="dashboard-faculty">
      <div class="nav-container">
        <div class="portal-logo">
          <div class="role-item">
            <div class="img-container"><img class="img" src="<?php echo base_url('assets/images/logo/sbu_logo.svg'); ?>" /></div>
            <div class="role-heading">
              <div class="text-wrapper">San Beda University</div>
              <div class="div">Faculty Portal</div>
            </div>
          </div>
        </div>
		<!-- Modal -->
		<div id="postAnnouncementModal" class="modal">
			<div class="modal-content">
				<div class="postAnnouncement-container">
					<div class="postmodal-heading">
						<div class="div">Post New Announcement</div>
					</div>
					<div class="postmodal-form-container">
						<!-- Title Input -->
						<div class="postmodal-form-input">
							<input type="text" id="announement_title" name="announement_title" placeholder="Title">
						</div>
						<!-- Custom Textarea for Announcement Body -->
						<div class="postmodal-form-input">
							<div id="announcement_body" class="custom-textarea" contenteditable="true" placeholder="Write your announcement here..."></div>
							<div class="attachment-container">
								<label for="announcement_attachment" class="attachment-button">
									<img src="https://cdn-icons-png.flaticon.com/512/54/54719.png" alt="">
									Attach Files
								</label>
								<input type="file" id="announcement_attachment" name="announcement_attachment" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" multiple hidden>
								<div id="announcement_attachment_preview" class="attachment-preview"></div>
							</div>
						</div>
					</div>
					<!-- Buttons -->
					<div class="button-container">
						<input type="submit" value="Post">
						<a href="javascript:void(0);" id="closeModalBtn">
							<div class="cancel-button">
								<h6>Cancel</h6>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
        <div class="nav-links-container">
			<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Dashboard/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/dash.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Dashboard</div></div>
				</div>
			</a>
          
		  	<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Announcements/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/announce.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Announcements</div></div>
				</div>
			</a>
          
		  	<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/index">
				<div class="nav-link active">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/profile.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4 highlight">Profile</div></div>
				</div>
			</a>

			<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/FacultyManagement/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/facultymanage.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Faculty Management</div></div>
				</div>
			</a>
          
		  	<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Courses/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/course.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Courses</div></div>
				</div>
			</a>
          
		  	<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/ResearchOutputs/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/research.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Research Outputs</div></div>
				</div>
			</a>
    
		  	<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Consultations/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/consult.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Consultations</div></div>
				</div>
			</a>
        </div>
        <div class="nav-links-container-2">
			<!-- Notification Button -->
			<a href="javascript:void(0);" id="notificationBtn">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/notif.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Notifications</div></div>
				</div>
			</a>
			
			<!-- Slide-in Notification Panel -->
			<div id="notificationPanel" class="notification-panel">
				<div class="notification-header">
					<h3>Notifications</h3>
					<button id="closePanel" class="close-btn">&times;</button>
				</div>
				<div class="notification-content">
					<!-- Notification Items -->
					<div class="notification-item">
						<div class="notification-item-details">
							<p>Rose M. Perreras posted an announcement</p>
							<small>12/21/2024 11:17</small>
							
							<a href="#">
								 <button class="action-btn">View</button>
							</a>
						</div>	
						<span class="status-dot new"></span>
					</div>
					
					<!-- Add more notification items here -->
				</div>
			</div>
          
			<!-- Your profile link and other content here -->
			<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Account/index">
				<div class="nav-link-3">
					<?php if (isset($logged_faculty) && $logged_faculty !== null): ?>
					<div class="img-wrapper">
						<img class="img-account" src="<?php echo base_url(!empty($logged_faculty->profile_picture) ? $logged_faculty->profile_picture : 'assets/images/profile/default_profile.png'); ?>" alt="Profile Picture">
					</div>
					
					
					<div class="frame-3">
						<div class="text-wrapper-5" id="full_name"></div>
						<div class="text-wrapper-6"></div>
					</div>
					<?php endif ?>
				</div>
			</a>
          
        </div>
        <div class="nav-link-wrapper">
          <div class="frame-wrapper">
            <div class="frame-4"><div class="text-wrapper-7">v1.0.1</div></div>
          </div>
        </div>
      </div>
    <div class="main-content">
        <div class="main-content-2 main-content-2-profile">
			<div class="cover-photo">
				<?php if (isset($faculty) && $faculty !== null): ?>
					<div class="cover-photo-real">
						<img src="<?php echo base_url(!empty($faculty->cover_photo) ? $faculty->cover_photo : 'assets/images/cover/sbu_default_cover.png'); ?>" alt="Cover Photo">
					</div>
					
					<div class="profile-picture">
						<img src="<?php echo base_url(!empty($faculty->profile_picture) ? $faculty->profile_picture : 'assets/images/profile/default_profile.png'); ?>" alt="Profile Picture">
					</div>
				<?php endif ?>
			</div>

			<div class="the-profile-main-container">
				<?php if (isset($faculty) && $faculty !== null): ?>
				<div class="the-profile-headings">
					<div class="profile-headings-left">
						<!-- Full name -->
						<h2><?php echo $faculty->first_name; ?> 

							<?php if(isset($faculty->middle_name) && !empty($faculty->middle_name)): ?>
								<?php echo substr($faculty->middle_name, 0, 1) . '.'; ?> 			
							<?php endif; ?>
							 
							<?php echo $faculty->last_name; ?></h2>

						<div class="profile-left-subheadings">
							<!-- Age -->
							<?php if(isset($faculty->age) && !empty($faculty->age)): ?>
								<h5>
									<?php 
										$age = $faculty->age;
										echo $age . ' ' . ($age == 1 ? 'year' : 'years') . ' old';
								 	?>
								</h5>
							<?php endif; ?>
							
							<!-- Email -->
							<?php if(isset($faculty->email) && !empty($faculty->email)): ?>
							<div class="contact-row">
								<img src="<?php echo base_url('assets/images/icon/email.svg'); ?>" alt="">
								<h5><?php echo $faculty->email ?></h5>
							</div>
							<?php endif; ?>

							<!-- Mobile Number -->
							<?php if(isset($faculty->mobile_number) && !empty($faculty->mobile_number)): ?>
							<div class="contact-row">
								<img src="<?php echo base_url('assets/images/icon/phone.svg'); ?>" alt="">
								<h5><?php echo $faculty->mobile_number ?></h5>
							</div>
							<?php endif; ?>
						</div>

						<div class="profile-buttons">
							<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/prepareForEditProfile">
								<div class="profile-button-container">
									<h5>Edit Profile</h5>
								</div>
							</a>

							<a href="#" id="removeFacultyBtn">
								<div class="profile-button-container">
									<h5>Remove Faculty</h5>
								</div>
							</a>
						</div>
					</div>

								<!-- Confirmation Modal -->
								<div id="confirmDeleteModal" class="modal">
										<div class="modal-content confirm-delete-modal-content">
											<div class="modal-header confirm-delete-modal">
												<h3>Remove Faculty</h3>
											</div>

											<div class="form-group confirm-delete-form-group">
												Are you sure you want to remove this faculty profile? This action cannot be undone.
											</div>

											<div class="confirm-delete-container">
												<div class="confirm-delete-button-cancel" id="cancelDeleteBtn">
													<h6 class="back-step">Cancel</h6>
												</div>

												<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/deleteProfile" class="confirm-delete-button">Confirm Removal</a>
											</div>
											
										</div>
									</div>

					<div class="profile-headings-right">
						<div class="faculty-role-container">
							<div class="role-heading-container role-row">
								<h5>Current Role</h5>
								<img src="<?php echo base_url('assets/images/icon/rolebag.svg'); ?>" alt="">
							</div>

							
							<div class="role-item-container role-row">
								<div class="role-item-profile">
									<h5><?php echo $faculty->role_name; ?></h5>
								</div>
								<div class="role-item-profile">
									<h5><?php echo $faculty->position; ?></h5>
								</div>
							</div>
						</div>
						
						<div class="faculty-job-information">
							<div><h5><?php echo $faculty->department; ?><h5 class="sub-h5">&nbsp| Department</h5></h5></div>
							<div><h5><?php echo $faculty->employment_type; ?><h5 class="sub-h5">&nbsp| Employment Type</h5></h5></div>
							<div><h5><?php echo $faculty->date_hired; ?><h5 class="sub-h5">&nbsp| Date Hired</h5></h5></div>
						</div>
					</div>
				</div>
				<?php endif ?>

				<!-- Tables -->
				<div class="tables-profile-container">
					<!-- Qualifications -->
					<div class="the-content-container">
						<div class="sub-content-container">
							<div class="table-heading">
								<h4>Qualifications</h4>
							</div>
						</div>
						
						<div id="container">    
							<table class="table" id="QualificationsList" name="QualificationsList">
								<thead>
								<tr>
									<th>#</th>
									<th>Academic Degree</th>
									<th>Institution</th>
									<th>Year Graduated</th>
									<th>Copy of Diploma</th>
								</tr>
								</thead>

								<tbody>
									
								</tbody>
							</table>

						</div>
					</div>

					<!-- Industry Experience -->
					<div class="the-content-container">
						<div class="sub-content-container">
							<div class="table-heading">
								<h4>Industry Experience</h4>
							</div>
						</div>
						
						<div id="container">    
							<table class="table" id="ExperienceList" name="ExperienceList">
								<thead>
								<tr>
									<th>#</th>
									<th>Name of Company</th>
									<th>Job Position</th>
									<th>Years of Experience</th>
								</tr>
								</thead>

								<tbody>
									
								</tbody>
							</table>

						</div>
					</div>

					<!-- Certifications -->
					<div class="the-content-container">
							<div class="sub-content-container">
								<div class="table-heading">
									<h4>Certifications</h4>
								</div>
							</div>
							
							<div id="container">    
								<table class="table" id="CertificationList" name="CertificationList">
									<thead>
									<tr>
										<th>#</th>
										<th>Name of Organization/Company</th>
										<th>Certificate Title</th>
										<th>Year</th>
										<th>Expiration Date</th>
										<th>Certificate</th>
									</tr>
									</thead>

									<tbody>
										
									</tbody>
								</table>

							</div>
						</div>	
					
				</div>
				</div>
			</div>
        </div>
    </div>
</div>

	<script>
	$(document).ready(function() {
			fetchQualifications();
			fetchExperience();
			fetchCertifications();
		});

	function fetchQualifications() {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/getQualifications',  // Update the URL as necessary
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				console.log('AJAX success (Qualifications):', result);
				if (Array.isArray(result)) {
					createQualificationsTable(result, 0);  // Call the function to create the table and pass the result
				} else {
					console.error('Expected an array but received:', result);
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching qualifications:', error);
			}
		});
	}

	function createQualificationsTable(result, sno) {
		sno = Number(sno);
		$('#QualificationsList tbody').empty(); // Clear existing rows
		for (index in result) {
			var id = result[index].id;
			var academic_degree = result[index].academic_degree;
			var institution = result[index].institution;
			var year_graduated = result[index].year_graduated;

			sno += 1;

			var tr = `<tr>
            <td>${sno}</td>
            <td>${academic_degree}</td>
            <td>${institution}</td>
            <td>${year_graduated}</td>
            <td><a href='javascript:void(0)' onclick='openPDFInNewTab(${id}, "qualification")'>View Diploma</a></td>
        </tr>`;

			$('#QualificationsList tbody').append(tr);  // Append the new row to the table body
		}
	}

	function fetchExperience() {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/getExperience',  // Update the URL as necessary
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				console.log('AJAX success (Experience):', result);
				if (Array.isArray(result)) {
					createExperienceTable(result, 0);  // Call the function to create the table and pass the result
				} else {
					console.error('Expected an array but received:', result);
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching experience:', error);
			}
		});
	}

	function createExperienceTable(result, sno) {
		sno = Number(sno);
		$('#ExperienceList tbody').empty(); // Clear existing rows
		for (index in result) {
			var id = result[index].id;
			var company_name = result[index].company_name;
			var job_position = result[index].job_position;
			var years_of_experience = result[index].years_of_experience;

			sno += 1;

			var tr = "<tr>";
			tr += "<td>" + sno + "</td>";  // Serial number
			tr += "<td>" + company_name + "</td>";
			tr += "<td>" + job_position + "</td>";
			tr += "<td>" + years_of_experience + "</td>";				
			tr += "</tr>";

			$('#ExperienceList tbody').append(tr);  // Append the new row to the table body
		}
	}

	function fetchCertifications() {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/getCertifications',  // Update the URL as necessary
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				console.log('AJAX success (Certifications):', result);
				if (Array.isArray(result)) {
					createCertificationTable(result, 0);  // Call the function to create the table and pass the result
				} else {
					console.error('Expected an array but received:', result);
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching certifications:', error);
			}
		});
	}

	function createCertificationTable(result, sno) {
		sno = Number(sno);
		$('#CertificationList tbody').empty(); // Clear existing rows
		for (index in result) {
			var id = result[index].id;
			var certification_name = result[index].certification_name;
			var certification_title = result[index].certification_title;
			var year_received = result[index].year_received; 
			var expiration_date = result[index].expiration_date; 


			sno += 1;

			var tr = `<tr>
            <td>${sno}</td>
            <td>${certification_name}</td>
            <td>${certification_title}</td>
            <td>${year_received}</td>
			<td>${expiration_date}</td>
            <td><a href='javascript:void(0)' onclick='openPDFInNewTab(${id}, "certification")'>View Certificate</a></td>
        </tr>`;

			$('#CertificationList tbody').append(tr);  // Append the new row to the table body
		}
	}


	// JavaScript function to open the PDF in a new tab (Reusable for different types of PDFs)
	function openPDFInNewTab(id, type) {
			// Determine the URL based on the type of document
			var baseUrl = 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/';
			var url = '';

			if (type === 'qualification') {
				url = baseUrl + 'ViewQualificationPDF/' + id;
			} else if (type === 'certification') {
				url = baseUrl + 'ViewCertificationPDF/' + id;  // Adjust the endpoint as needed
			} else {
				console.error('Invalid document type specified.');
				return;
			}

			// Open the URL in a new tab
			window.open(url, '_blank');
		}
	

	// Function to initialize a modal
	function setupModal(modalId, openButtonId, closeButtonId) {
		const modal = document.getElementById(modalId);
		const openButton = document.getElementById(openButtonId);
		const closeButton = document.getElementById(closeButtonId);

		// Open modal
		openButton.onclick = function () {
			modal.style.display = "block";
			if (modalId === "addCourseModal" || modalId === "editCourseModal") {
				fetchFaculty(modalId);
			}
		};

		// Close modal
		closeButton.onclick = function () {
			modal.style.display = "none";
		};

		// Close modal when clicking outside of it
		window.onclick = function (event) {
			if (event.target === modal) {
				modal.style.display = "none";
			}
		};
	}

	// Initialize "Post Announcement" modal
	setupModal("confirmDeleteModal", "removeFacultyBtn", "cancelDeleteBtn");

	
	</script>
	<script src="<?php echo base_url('assets/js/faculty.js?v=' . time()); ?>"></script>
	<script src="<?php echo base_url('assets/js/notification.js?v=' . time()); ?>"></script>


  </body>
</html>