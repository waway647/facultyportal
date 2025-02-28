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

	<!-- jQuery library -->
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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
					<?php if (isset($faculty) && $faculty !== null): ?>
					<div class="img-wrapper">
						<img class="img-account" src="<?php echo base_url(!empty($faculty->profile_picture) ? $faculty->profile_picture : 'assets/images/profile/default_profile.png'); ?>" alt="Profile Picture">
					</div>
					
					
					<div class="frame-3">
						<div class="text-wrapper-5"><?php echo $faculty->first_name?> <?php echo $faculty->last_name?></div>
						<div class="text-wrapper-6"><?php echo $faculty->email?></div>
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
        <div class="main-content-2">
          <div class="heading-container"><div class="text-wrapper-8">Account Settings</div></div>
			<div class="container">
				<div class="left-account-container">
					<div class="profile-setting-container">
						<?php if (isset($faculty) && $faculty !== null): ?>
						<div class="profile-pic-preview">
							<img src="<?php echo base_url(!empty($faculty->profile_picture) ? $faculty->profile_picture : 'assets/images/profile/default_profile.png'); ?>" alt="Profile Picture">
						</div>
						<?php endif ?>

						<div class="profile-details-container">
						<div class="profile-details">
							<a href="#" id="editProfilePictureBtn">
								<h6>Edit</h6>
							</a>
							</div>
						</div>

									<!-- Edit Profile Modal -->
									<div id="editProfilePictureModal" class="modal">
									<div class="modal-content img-modal-content">
										<div class="modal-header">
											<div class="modal-header-text">
												<h3>Edit Profile</h3>
												<h6>Choose your profile picture.</h6>
											</div>
											
											<div class="close-btn-modal" id="closeeditProfilePictureBtn">
												<img src="<?php echo base_url('assets/images/icon/x.svg'); ?>" alt="">
											</div>
										</div>
										<form id="editProfilePictureForm" method="post" enctype="multipart/form-data" action="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Account/changeProfilePic">
											<div class="form-group img-form-group">
												<div class="pic-preview-container">
													<div class="preview">
														<div class="px184">
															<img id="preview_184" src="<?php echo base_url(!empty($faculty->profile_picture) ? $faculty->profile_picture : 'assets/images/profile/default_profile.png'); ?>" alt="">
														</div>
														<h6>184px</h6>
													</div>
													<div class="preview">
														<div class="px64">
															<img id="preview_64" src="<?php echo base_url(!empty($faculty->profile_picture) ? $faculty->profile_picture : 'assets/images/profile/default_profile.png'); ?>" alt="">
														</div>
														<h6>64px</h6>
													</div>

													<div class="preview">
														<div class="px32">
															<img id="preview_32"src="<?php echo base_url(!empty($faculty->profile_picture) ? $faculty->profile_picture : 'assets/images/profile/default_profile.png'); ?>" alt="">
														</div>
														<h6>32px</h6>
													</div>
												</div>


												<div class="pic-upload-container">
													<input type="file" id="profile_pic_change" name="profile_picture" accept=".jpg,.jpeg,.png">
													<label for="profile_pic_change">Upload your profile</label>
													<h6>Upload a file from your device. Image should be square, at least 184px x 184px.</h6>
												</div>
											</div>
											
											<div class="button-submit-container">
												<button type="submit" class="btn">Save & Confirm</button>
											</div>					
										</form>
									</div>
									</div> 
					</div>

					<a href="http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/logout">
						<div class="logout-button">
							<h6>Log Out</h6>
						</div>
					</a>
				</div>

				<div class="right-account-container">
					<form method="post" action="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Account/updateProfile">
					<?php if (isset($faculty) && $faculty !== null): ?>
					<div class="form-container">
					
						<div class="input-container">
							<h6>Email</h6>
							<input type="text" id="email" name="email" value="<?php echo $faculty->email; ?>" placeholder="Email">
						</div>

						<div class="input-container">
							<h6>Password</h6>
							<input type="text" id="pass" name="pass" value="<?php echo $faculty->pass; ?>" placeholder="Pass">
						</div>

						<div class="input-container">
							<h6>Mobile number</h6>
							<input type="text" id="mobile_number" name="mobile_number" value="<?php echo $faculty->mobile_number; ?>" placeholder="Mobile number">
						</div>

						<div class="input-container">
							<h6>First name</h6>
							<input type="text" id="first_name" name="first_name" value="<?php echo $faculty->first_name; ?>" placeholder="First name">
						</div>

						<div class="input-container">
							<h6>Last name</h6>
							<input type="text" id="last_name" name="last_name" value="<?php echo $faculty->last_name; ?>" placeholder="Last name">
						</div>

						<div class="input-container">
							<h6>Middle name</h6>
							<input type="text" id="middle_name" name="middle_name" value="<?php echo $faculty->middle_name; ?>" placeholder="Middle name">
						</div>

						<div class="input-container">
							<h6>Birthday</h6>
							<input type="date" id="birthday" name="birthday" value="<?php echo $faculty->birthday; ?>" max="<?php echo date('Y') - 1 . '-12-31'; ?>" placeholder="Last Name">
						</div>

						<div class="input-container edit">
							<button type="submit">
								<h6>Save changes</h6>
							</button>

							<div class="input-container edit a">
								<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Account/index"><h6>Cancel</h6></a>
							</div>
						</div>
					
					</div>
					<?php endif ?>
					</form>
				</div>
			</div>
        </div>
      </div>
    </div>

	<script>
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

	// Initialize "Add Research" modal
    setupModal("editProfilePictureModal", "editProfilePictureBtn", "closeeditProfilePictureBtn");

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

	document.getElementById('profile_pic_change').addEventListener('change', function (event) {
		const file = event.target.files[0]; // Get the selected file
		if (file) {
			const reader = new FileReader(); // Create a FileReader to read the file

			// Load the file and update the preview images
			reader.onload = function (e) {
				const preview184 = document.getElementById('preview_184');
				const preview64 = document.getElementById('preview_64');
				const preview32 = document.getElementById('preview_32');

				// Update the src of preview images
				preview184.src = e.target.result;
				preview64.src = e.target.result;
				preview32.src = e.target.result;
			};

			reader.readAsDataURL(file); // Read the file as a data URL
		}
	});

	$(document).on('submit', '#editProfilePictureForm', function (e) {
		e.preventDefault();

		let formData = new FormData(this);

		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Account/changeProfilePic',
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function (response) {
				if (response.status === 'success') {
					$('#profilePicture').attr('src', response.profile_picture);			
					$('#editProfilePictureModal').hide();
					location.reload();
				} else {
					alert('Error: ' + response.message);
				}
			},
			error: function () {
				alert('An unexpected error occurred.');
			},
		});
	});

	</script>
	<script src="<?php echo base_url('assets/js/notification.js?v=' . time()); ?>"></script>



  </body>
</html>