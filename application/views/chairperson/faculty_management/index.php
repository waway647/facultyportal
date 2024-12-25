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

	<!-- jQuery library -->
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

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
        <div class="post-container">
          <!-- Post Announcement button -->
          <a href="javascript:void(0);" id="postAnnouncementBtn">
            <div class="post-button">
              <div class="text-wrapper-2">Post Announcement</div>
            </div>
          </a>
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
								<input type="file" id="announcement_attachment" name="announcement_attachment" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" hidden>
								<div id="attachment_preview" class="attachment-preview"></div>
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



        <div class="post-button-wrapper">
          <button class="button">
            <div class="frame"><img class="img" src="<?php echo base_url('assets/images/icon/search.svg'); ?>" /></div>
				<div class="div-wrapper">
					<input type="search" name="" id="" placeholder="Search">
				</div>
          </button>
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
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/profile.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Profile</div></div>
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

			<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Reports/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/reports.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Reports</div></div>
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
					<div class="img-wrapper"><img class="img" src="<?php echo base_url('assets/images/profile/sample.svg'); ?>" /></div>
					<div class="frame-3">
					<div class="text-wrapper-5">Paul Joshua Mapula</div>
					<div class="text-wrapper-6">2022-02519@sanbeda.edu.ph</div>
					</div>
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
        <div class="main-content-2">
          <div class="heading-container"><div class="text-wrapper-8">Faculty Management, Department Chair</div></div>
          	<div class="container-management">
				<div class="item-summary-container">
					<div class="boxes-container">
						<div class="item-box">
							<div class="left-summary-container">
								<div class="summary-img-container">
									<img src="<?php echo base_url('assets/images/profile/sample.svg'); ?>" alt="">
								</div>

								<h4>Total</h4>
							</div>
							
							<h2 id="totalFaculty"></h2>
						</div>

						<div class="item-box">
							<div class="summary-img-container">
								<img src="<?php echo base_url('assets/images/profile/sample.svg'); ?>" alt="">
							</div>

							<h4>Total</h4>

							<h2>3</h2>
						</div>

						<div class="item-box">
							<div class="summary-img-container">
								<img src="<?php echo base_url('assets/images/profile/sample.svg'); ?>" alt="">
							</div>

							<h4>Total</h4>

							<h2>3</h2>
						</div>
					</div>
				</div>

				<div class="sub-content-container">
					<div class="left-sub">
						<h4>Faculty List&nbsp</h4>
						<h4 class="left-sub-numbers">(3)</h4>
					</div>

					<div class="right-sub">
						<div class="search-container">
						<button class="button">
							<div class="frame"><img class="img" src="<?php echo base_url('assets/images/icon/search.svg'); ?>" /></div>
								<div class="div-wrapper">
									<input type="search" name="" id="" placeholder="Search">
								</div>
						</button>
						</div>

						<div class="add-button">
							<button id="addFacultyBtn" type="button" class="btn">+ &nbsp&nbsp Add Faculty</button>
						</div>
								
								<!-- Add Faculty Modal -->
								<div id="addFacultyModal" class="modal">
								<div class="modal-content">
									
									<div class="modal-for-step">
										<h6>Step 1 of 2</h6>
									</div>
									<div class="modal-header">
									<h3>Add Faculty Profile</h3>
									</div>
									<form id="addFacultyForm" method="post" action="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/FacultyManagement/createFaculty1">
										<div class="form-group">
											<select id="user_role_id" name="user_role_id" required>
												<option value="2">Faculty</option>
											</select>
										</div>
										<div class="form-group">
											<input type="email" id="email" name="email" placeholder="Email" required>
										</div>
										<div class="form-group">
											<input type="password" id="pass" name="pass" placeholder="Password" required>
										</div>

										<button type="submit" class="btn">Continue</button>

										<a href="">
											<h6 class="back-step">Cancel</h6>
										</a>
									</form>
								</div>
								</div> 
								

								<!-- STEP 2 - Add Faculty Modal -->
								<div id="addFacultyModalStep2" class="modal">
								<div class="modal-content">
									
									<div class="modal-for-step">
										<h6>Step 2 of 2</h6>
									</div>
									<div class="modal-header">
									<h3>Add Faculty Profile</h3>
									</div>
									<form id="addFacultyFormStep2" method="post" action="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/FacultyManagement/createFaculty2">
										<div class="form-group">
											<input type="text" id="first_name" name="first_name" placeholder="First Name" required>
										</div>
										<div class="form-group">
											<input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
										</div>
										<div class="form-group">
											<input type="text" id="middle_name" name="middle_name" placeholder="Middle Name">
										</div>
										<div class="form-group">
											<select id="department" name="department" required>
												<option value="" disabled selected>Choose a Department</option>
												<option value="Information Technology">Information Technology</option>
												<option value="Computer Science">Computer Science</option>
												<option value="Information Systems">Information Systems</option>
											</select>
										</div>
										<div class="form-group">
											<select id="employment_type" name="employment_type" required>
												<option value="" disabled selected>Choose Employment Type</option>
												<option value="Full-Time">Full-Time</option>
												<option value="Part-Time">Part-Time</option>
											</select>
										</div>

										<button type="submit" class="btn">Save & Confirm</button>

										<a href="">
											<h6 class="back-step">Cancel</h6>
										</a>
									</form>
								</div>
								</div>
					</div>
				</div>

				<div id="profileCardContainer" class="the-content-container">
					<!--
					<div class="profile-card-container">
						<div class="card-left">
							<div class="the-pic-container">
								<img src="<?php echo base_url('assets/images/profile/sample.svg'); ?>" alt="">	
							</div>

							<div class="the-details-container">
								<h4>Mapula, Paul Joshua G.</h4>
								
								<div class="the-sub-details">
									<h6 class="role-class">Faculty</h6>
									<h6>Information Technology Department</h6>
									<h6>CC101 | IT101</h6>
								</div>
							</div>
						</div>

						<div class="card-right">
							<div class="contact-row">
								<div class="icon-contact">
									<img src="<?php echo base_url('assets/images/icon/email.svg'); ?>" alt="">
								</div>
								
								<h6>2022-02519@sanbeda.edu.ph</h6>
							</div>

							<div class="contact-row">
								<div class="icon-contact">
									<img src="<?php echo base_url('assets/images/icon/phone.svg'); ?>" alt="">
								</div>
								
								<h6>09958541242</h6>
							</div>
						</div>

						<div class="card-action-container">
							<div class="card-action">
								<button type="button" class="btn">View Profile</button>
							</div>
						</div>
					</div>
									-->
				</div>
			</div>
        </div>
      </div>
    </div>

	<script>

			// Function to fetch user profiles and create the grid
			function fetchUserProfiles() {
				$.ajax({
					url: 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/FacultyManagement/fetchUserProfiles', // URL to fetch data
					type: 'GET',
					dataType: 'json',
					success: function(result) {
						console.log(result); // Debugging statement to check the structure of result
						createGrid(result);  // Call the function to create the grid with the fetched data
					},
					error: function(xhr, status, error) {
						console.error('Error fetching user profiles:', error);
					}
				});
			}

			// Function to fetch user profiles and create the grid
			function countAllFaculty() {
				$.ajax({
					url: 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/FacultyManagement/countAllFaculty', // URL to fetch data
					type: 'GET',
					dataType: 'json',
					success: function(result) {
						console.log(result); // Debugging statement to check the structure of result
						if (result && !result.error) {
							// Update the total faculty count in the UI
							document.getElementById("totalFaculty").textContent = result || "0";
						} else {
							console.error("Error: ", result.error || "Unexpected response format");
							document.getElementById("totalFaculty").textContent = "Error";
						}
					},
					error: function(xhr, status, error) {
						console.error('Error fetching user profiles:', error);
					}
				});
			}

			// Function to dynamically generate the profile grid based on the fetched result
			function createGrid(result) {
				$('#profileCardContainer').empty(); // Clear the previous content
				console.log(result); // Debugging statement to check the structure of result

				for (let index in result) {
					let user = result[index];
					if (typeof user === 'object') {
						let first_name = user.first_name  || '';
						let last_name = user.last_name  || '';
						let middle_name = user.middle_name  || '';
						let department = user.department  || '';
						let email = user.email  || '';
						let mobile_number = user.mobile_number  || '';
						let age = user.age || '';

						// Construct the profile card dynamically with conditional commas
						let name = '';
						if (last_name && first_name) {
							name = `${last_name}, ${first_name} ${middle_name}`;
						} else if (last_name) {
							name = `${last_name} ${middle_name}`;
						} else if (first_name) {
							name = `${first_name} ${middle_name}`;
						} else {
							name = `${middle_name}`;  // In case both first_name and last_name are null, just show the middle name
						}

						// Construct the profile card dynamically
						let card = `
							<div class="profile-card-container">
								<div class="card-left">
									<div class="the-pic-container">
										<img src="<?php echo base_url('assets/images/profile/sample.svg'); ?>" alt="">    
									</div>

									<div class="the-details-container">
										<h4>${name}</h4>
										
										<div class="the-sub-details">
											<h6 class="role-class">${age}</h6>
											<h6>${department}</h6>
											<h6></h6>
										</div>
									</div>
								</div>

								<div class="card-right">
									<!-- Only show email if it's not empty -->
									${email ? `
									<div class="contact-row">
										<div class="icon-contact">
											<img src="<?php echo base_url('assets/images/icon/email.svg'); ?>" alt="">
										</div>
										<h6>${email}</h6>
									</div>` : ''}

									<!-- Only show mobile number contact row if it's not empty -->
									${mobile_number ? `
									<div class="contact-row">
										<div class="icon-contact">
											<img src="<?php echo base_url('assets/images/icon/phone.svg'); ?>" alt="">
										</div>
										<h6>${mobile_number}</h6>
									</div>` : ''}
								</div>

								<div class="card-action-container">
									<div class="card-action">
										<button type="button" class="btn">View Profile</button>
									</div>
								</div>
							</div>
						`;
						// Append the profile card to the container
						$('#profileCardContainer').append(card);
					} else {
						console.error('Unexpected data format:', user);
					}
				}
			}

			// Call the function to fetch user profiles when the page loads
			$(document).ready(function() {
				fetchUserProfiles(); // Fetch data and create grid
				countAllFaculty()
			});

	// Check if step1 is completed and show Step 2 modal
    <?php if ($this->session->userdata('step1_completed')): ?>
        // Show the Step 2 modal after Step 1
        document.getElementById('addFacultyModal').style.display = 'none';
        document.getElementById('addFacultyModalStep2').style.display = 'block';
        // Reset the session flag to ensure the modal isn't shown again unnecessarily
        <?php $this->session->unset_userdata('step1_completed'); ?>
    <?php endif; ?>

	// Function to initialize a modal
	function setupModal(modalId, openButtonId, closeButtonId) {
	const modal = document.getElementById(modalId);
	const openButton = document.getElementById(openButtonId);
	const closeButton = document.getElementById(closeButtonId);

	// Open modal
	openButton.onclick = function () {
		modal.style.display = "block";
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
	setupModal("postAnnouncementModal", "postAnnouncementBtn", "closeModalBtn");

	// Initialize "Add Faculty" modal
	setupModal("addFacultyModal", "addFacultyBtn", "closeAddFacultyBtn");

	// File attachment handling
	const attachmentInput = document.getElementById("announcement_attachment");
	const attachmentPreview = document.getElementById("attachment_preview");
	let attachedFiles = []; // Store uploaded files dynamically

	attachmentInput.addEventListener("change", function () {
	  // Loop through selected files
	  Array.from(attachmentInput.files).forEach((file) => {
	    // Check if file is already attached
	    if (attachedFiles.some((attachedFile) => attachedFile.name === file.name)) {
	      alert(`File "${file.name}" is already attached.`);
	      return;
	    }

	    // Add file to the list of attached files
	    attachedFiles.push(file);

	    // Create preview item
	    const previewItem = document.createElement("div");
	    previewItem.className = "attachment-preview-item";

	    if (file.type.startsWith("image/")) {
	      // Display image preview
	      const img = document.createElement("img");
	      img.src = URL.createObjectURL(file);
	      img.alt = file.name;
	      img.onload = function () {
	        URL.revokeObjectURL(img.src); // Free memory
	      };
	      previewItem.appendChild(img);
	    }

	    // Display file name
	    const fileName = document.createElement("span");
	    fileName.textContent = file.name;
	    previewItem.appendChild(fileName);

	    // Add a remove button for each file
	    const removeButton = document.createElement("button");
	    removeButton.textContent = "Remove";
	    removeButton.className = "remove-file-btn";
	    removeButton.onclick = function () {
	      // Remove file from the list of attached files
	      attachedFiles = attachedFiles.filter((f) => f.name !== file.name);
	      previewItem.remove();
	    };
	    previewItem.appendChild(removeButton);

	    // Add preview item to the container
	    attachmentPreview.appendChild(previewItem);
	  });

	  // Reset file input to allow re-uploading the same file if removed
	  attachmentInput.value = "";

	});

	// Notification Panel Logic
	const notificationBtn = document.getElementById('notificationBtn');
	const notificationPanel = document.getElementById('notificationPanel');
	const closePanel = document.getElementById('closePanel');

	// Open the notification panel
	notificationBtn.addEventListener('click', (e) => {
	  e.preventDefault();  // Prevent default anchor behavior
	  notificationPanel.classList.add('open');
	});

	// Close the notification panel
	closePanel.addEventListener('click', () => {
	  notificationPanel.classList.remove('open');
	});

	// Close the notification panel when clicking outside of it
	window.addEventListener('click', function (event) {
	// Check if the click target is outside both the panel and the button
	if (
		!notificationPanel.contains(event.target) &&
		!notificationBtn.contains(event.target)
	) {
		notificationPanel.classList.remove('open');
	}
	});
	</script>



  </body>
</html>