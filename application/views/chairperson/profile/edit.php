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
						<!-- Full name -->
						<h2><?php echo $faculty->first_name; ?> 

							<?php if(isset($faculty->middle_name) && !empty($faculty->middle_name)): ?>
								<?php echo substr($faculty->middle_name, 0, 1) . '.'; ?> 			
							<?php endif; ?>
							 
							<?php echo $faculty->last_name; ?></h2>

						<div class="profile-left-subheadings">
							<!-- Age -->
							<?php if(isset($faculty->age) && !empty($faculty->age)): ?>
								<h5><?php echo $faculty->age ?> years old</h5>
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
						<div class="table-heading">
							<h4>Qualifications</h4>
						</div>
						<div id="container">    
							<table class="table" id="courseList" name="courseList">
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
						<div class="table-heading">
							<h4>Industry Experience</h4>
						</div>
						<div id="container">    
							<table class="table" id="courseList" name="courseList">
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
						<div class="table-heading">
							<h4>Research Outputs</h4>
						</div>
						<div id="container">    
							<table class="table" id="courseList" name="courseList">
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
			fetchFaculty();
		});

	// Function to fetch faculty data via AJAX
	function fetchFaculty() {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/getFacultyProfile',  // Update the URL as necessary
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				console.log('AJAX success (Courses):', result);
				if (Array.isArray(result)) {
					createCourseTable(result, 0);  // Call the function to create the table and pass the result
				} else {
					console.error('Expected an array but received:', result);
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching courses:', error);
			}
		});
	}
	
	// Get elements
	const modal = document.getElementById("postAnnouncementModal");
	const btn = document.getElementById("postAnnouncementBtn");
	const closeModal = document.getElementById("closeModalBtn");

	// Open modal
	btn.onclick = function () {
	  modal.style.display = "block";
	};

	// Close modal
	closeModal.onclick = function () {
	  modal.style.display = "none";
	};

	// Close modal when clicking outside of it
	window.onclick = function (event) {
	  if (event.target == modal) {
	    modal.style.display = "none";
	  }
	};

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