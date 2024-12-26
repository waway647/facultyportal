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
        <div class="main-content-2 main-content-2-profile">
			<div class="cover-photo">
				<img src="<?php echo base_url('assets/images/cover/sample.svg'); ?>" alt="Cover Photo">
				<div class="profile-picture">
					<img src="<?php echo base_url('assets/images/profile/sample.svg'); ?>" alt="Profile Picture">
				</div>
			</div>

			<div class="the-profile-main-container">
				<?php if (isset($faculty) && $faculty !== null): ?>
				<div class="the-profile-headings">
					<div class="profile-headings-left">
					
						<div class="profile-left-subheadings">
							<!-- Full name -->
							<input type="text" id="first_name" name="first_name" value="<?php echo $faculty->first_name; ?>" placeholder="First Name" required>
							<input type="text" id="middle_name" name="middle_name" value="<?php echo $faculty->middle_name; ?>" placeholder="Middle Name" required>
							<input type="text" id="last_name" name="last_name" value="<?php echo $faculty->last_name; ?>" placeholder="Last Name" required>

							<!-- Age -->
							<input type="date" id="birthday" name="birthday" value="<?php echo $faculty->birthday; ?>" placeholder="Birthday" required>
							
							<!-- Email -->
							<input type="text" id="email" name="email" value="<?php echo $faculty->email; ?>" placeholder="Email" required>
						
							<!-- Mobile Number -->
							<input type="text" id="mobile_number" name="mobile_number" value="<?php echo $faculty->mobile_number; ?>" placeholder="Mobile Number" required>
						
						</div>

						<div class="profile-buttons">
							<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/cancelEdit">
								<div class="profile-button-container cancel-btn">
									<h5>Cancel</h5>
								</div>
							</a>

							<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/updateProfile">
								<div class="profile-button-container save-btn">
									<h5>Save Changes</h5>
								</div>
							</a>
						</div>
					</div>

					<div class="profile-headings-right">
						<div class="role-heading-container role-row">
							<h5>Current Role</h5>
							<img src="<?php echo base_url('assets/images/icon/rolebag.svg'); ?>" alt="">
						</div>

						
						<div class="role-item-container role-row">
							<div class="role-item-profile">
								<h5><?php echo $faculty->role_name; ?></h5>
							</div>
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

							<div class="add-button">
								<button id="addQualificationsBtn" type="button" class="btn">+ &nbsp&nbsp Add Qualifications</button>
							</div>
									
									<!-- Add Qualifications Modal -->
									<div id="addQualificationsModal" class="modal">
									<div class="modal-content">
										<div class="modal-header">
										<h3>Add Qualifications</h3>
										</div>
										<form id="addQualificationsForm" method="post" action="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/createQualifications">
											<div class="form-group">
												<select id="academic_degree" name="academic_degree" required>
													<option value="" disabled selected>Academic Degree</option>
													<option value="Associate Degree">Associate Degree</option>
													<option value="Bachelor's Degree">Bachelor's Degree</option>
													<option value="Master's Degree">Master's Degree</option>
													<option value="Doctoral Degree">Doctoral Degree</option>

												</select>
											</div>

											<div class="form-group">
												<input type="text" id="institution" name="institution" placeholder="Institution" required>
											</div>

											<div class="form-group">
												<select id="year_graduated" name="year_graduated" required>
													<option value="" disabled selected>Year Graduated</option>
												</select>
											</div>

											<button type="submit" class="btn">Save & Confirm</button>

											<div class="close-text" id="closeaddQualificationsBtn">
												<h6 class="back-step">Cancel</h6>
											</div>
										</form>
									</div>
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
									<th>Action</th>
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
							
							<div class="add-button">
								<button id="addExperienceBtn" type="button" class="btn">+ &nbsp&nbsp Add Experience</button>
							</div>
									
									<!-- Add Experience Modal -->
									<div id="addExperienceModal" class="modal">
									<div class="modal-content">
										<div class="modal-header">
										<h3>Add Experience</h3>
										</div>
										<form id="addExperienceForm" method="post" action="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/createExperience">
											<div class="form-group">
												<input type="text" id="company_name" name="company_name" placeholder="Name of Company" required>
											</div>
											<div class="form-group">
												<input type="text" id="job_position" name="job_position" placeholder="Job Position" required>
											</div>
											<div class="form-group">
												<select id="years_of_experience" name="years_of_experience" required>
													<option value="" disabled selected>Years of Experience</option>
												</select>
											</div>
											
											<button type="submit" class="btn">Save & Confirm</button>

											<div class="close-text" id="closeaddExperienceBtn">
												<h6 class="back-step">Cancel</h6>
											</div>
										</form>
									</div>
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
									<th>Action</th>
								</tr>
								</thead>

								<tbody>
									
								</tbody>
							</table>

						</div>
					</div>

					<!-- Research Outputs -->
					<div class="the-content-container">
						<div class="sub-content-container">
							<div class="table-heading">
								<h4>Research Outputs</h4>
							</div>
							
							<div class="add-button">
								<button id="addResearchBtn" type="button" class="btn">+ &nbsp&nbsp Add Research</button>
							</div>
									
									<!-- Add Research Modal -->
									<div id="addResearchModal" class="modal">
									<div class="modal-content">
										<div class="modal-header">
										<h3>Add Research</h3>
										</div>
										<form id="addResearchForm" method="post" action="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/createResearch" enctype="multipart/form-data">
											<div class="form-group">
												<input type="text" id="title" name="title" placeholder="Research Title" required>
											</div>
											<div class="form-group">
												<select id="publication_year" name="publication_year" required>
													<option value="" disabled selected>Year Published</option>
												</select>
											</div>
											<div class="form-group">
												<div class="attachment-container">
													<label for="research_attachment" class="attachment-button">
														<img src="https://cdn-icons-png.flaticon.com/512/54/54719.png" alt="">
														Attach Files
													</label>
													<input type="file" id="research_attachment" name="research_attachment" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" hidden>
													<div id="research_attachment_preview" class="attachment-preview"></div>
												</div>
											</div>
										
											<button type="submit" class="btn">Save & Confirm</button>

											<div class="close-text" id="closeaddResearchBtn">
												<h6 class="back-step">Cancel</h6>
											</div>
										</form>
									</div>
									</div> 
						</div>

						<div id="container">    
							<table class="table" id="ResearchList" name="ResearchList">
								<thead>
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>Year Published</th>
									<th>Action</th>
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
		});

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

		// Close modal when clicking outside
		window.addEventListener("click", function (event) {
			if (event.target === modal) {
				modal.style.display = "none";
			}
		});
	}

	// Initialize "Post Announcement" modal
	setupModal("postAnnouncementModal", "postAnnouncementBtn", "closeModalBtn");

	// Initialize "Add Qualifications" modal
	setupModal("addQualificationsModal", "addQualificationsBtn", "closeaddQualificationsBtn");

	// Initialize "Add Experience" modal
	setupModal("addExperienceModal", "addExperienceBtn", "closeaddExperienceBtn");

	// Initialize "Add Research" modal
    setupModal("addResearchModal", "addResearchBtn", "closeaddResearchBtn");

			// Get the current year
			const currentYear = new Date().getFullYear();

			// Populate publication year dropdown
			const publicationYearSelect = document.getElementById("publication_year");
			for (let i = currentYear; i >= 2000; i--) { // Adjust the range of years here
				const option = document.createElement("option");
				option.value = i;
				option.textContent = i;
				publicationYearSelect.appendChild(option);
			}

			// Populate year graduated dropdown
			const yearGraduatedSelect = document.getElementById("year_graduated");
			for (let i = currentYear; i >= 1950; i--) { // Adjust the range of years here
				const option = document.createElement("option");
				option.value = i;
				option.textContent = i;
				yearGraduatedSelect.appendChild(option);
			}

			// Populate year graduated dropdown
			const yearsExperienced = document.getElementById("years_of_experience");
			for (let i = 1; i <= 50  ; i++) { // Adjust the range of years here
				const option = document.createElement("option");
				option.value = i;
				option.textContent = i;
				yearsExperienced.appendChild(option);
			}

			

	// File attachment handling
	function setupFileAttachment(attachmentInputId, attachmentPreviewId, allowMultiple = true) {
		const attachmentInput = document.getElementById(attachmentInputId);
		const attachmentPreview = document.getElementById(attachmentPreviewId);
		let attachedFiles = []; // Store uploaded files dynamically

		// Listen for file selection
		attachmentInput.addEventListener("change", function () {
			// Clear previous files if only one file is allowed (for research_attachment)
			if (!allowMultiple) {
				attachedFiles = []; // Clear the previous files list if only one file is allowed
				attachmentPreview.innerHTML = ""; // Clear the preview area
			}

			// Loop through selected files and add them to attachedFiles array
			Array.from(attachmentInput.files).forEach((file) => {
				// Check if file is already attached
				if (attachedFiles.some((attachedFile) => attachedFile.name === file.name)) {
					alert(`File "${file.name}" is already attached.`);
					return;
				}

				// Add file to the list of attached files
				attachedFiles.push(file);

				// Create preview item for the file
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
		});

		// On form submission, ensure attached files are included
		const form = document.querySelector("form"); // Ensure you are selecting the right form
		form.addEventListener("submit", function (event) {
			// Only proceed if there are attached files
			if (attachedFiles.length > 0) {
				const dataTransfer = new DataTransfer(); // Necessary for adding files programmatically
				attachedFiles.forEach((file) => {
					dataTransfer.items.add(file);
				});
				attachmentInput.files = dataTransfer.files; // Set the file input to include attached files
			}
		});
	}

	// Call setupFileAttachment for 'research_attachment'
	setupFileAttachment("research_attachment", "research_attachment_preview", false);

	// Call setupFileAttachment for 'announcement_attachment' if required
	setupFileAttachment("announcement_attachment", "announcement_attachment_preview", true);


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