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
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/table.css?<?php echo time(); ?>"> 
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/profile.css?<?php echo time(); ?>"> 

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
        <div class="nav-links-container">
			<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Dashboard/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/dash.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Dashboard</div></div>
				</div>
			</a>
          
		  	<a href="http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index">
				<div class="nav-link active">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/announce.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4 highlight">Announcements</div></div>
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
            <div class="main-content-2">
                <div class="heading-container"><div class="text-wrapper-8">Announcements, Department Chair</div></div>
                    <div class="container-management">
                        <div class="edit-form-container">
                            <h2>Edit Announcement</h2>
                            <?php if ($this->session->flashdata('error')): ?>
                                <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
                            <?php endif; ?>
                            <form action="http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/update/<?php echo $announcement->id; ?>" method="POST" enctype="multipart/form-data">
                                <label for="title">Title:</label>
                                <input type="text" name="title" id="title" value="<?php echo $announcement->title; ?>" required>

                                <label for="content">Content:</label>
                                <textarea name="content" id="content" rows="5" required><?php echo $announcement->content; ?></textarea>

                                <label for="announcement_file_path">Attachments (optional):</label>
                                <input type="file" name="announcement_file_path[]" id="announcement_file_path" multiple>

                                <h3>Existing Attachments</h3>
                                <?php if (!empty($attachments)): ?>
                                    <?php foreach ($attachments as $attachment): ?>
                                        <p>
                                            <a href="<?php echo base_url($attachment->announcement_file_path); ?>" target="_blank">
                                                <?php echo basename($attachment->announcement_file_path); ?>
                                            </a>
                                            <a href="http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/delete_attachment/<?php echo $attachment->id; ?>" style="color: red; margin-left: 10px;" onclick="return confirm('Are you sure you want to delete this attachment?');">Delete</a>
                                        </p>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>No attachments available.</p>
                                <?php endif; ?>

                                <button type="submit">Update Announcement</button>
                            </form>
                            <a href="http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index" style="display: inline-block; margin-top: 10px;">Back to Announcements</a>
                        </div>
				    </div>
			</div>
        </div>
    </div>					
	<script>
	$(document).ready(function() {
		fetchAnnouncements(); // Fetch all Announcements on page load
	});

	// Function to fetch course data via AJAX
	function fetchAnnouncements(query = '') {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/getAnnouncements',  // Update the URL as necessary
			type: 'GET',
			data: { search: query },
			dataType: 'json',
			success: function(result) {
				console.log('AJAX success (Announcements):', result);
				if (Array.isArray(result)) {
					if (result.length === 0) {
						$('#announcementList tbody').html('<tr><td colspan="4">No announcements found.</td></tr>');
					} else {
						createAnnouncementsTable(result); // Populate the table
					}
				} else {
					console.error('Expected an array but received:', result);
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching Announcements:', error);
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
	const attachmentPreview = document.getElementById("announcement_attachment_preview");
	let attachedFiles = []; // Store uploaded files dynamically

	// Configuration for file validation (matching backend constraints)
	const MAX_FILE_SIZE = 32 * 1024 * 1024; // 32MB in bytes
	const ALLOWED_TYPES = [
		"image/jpeg",
		"image/jpg",
		"image/png",
		"application/pdf",
		"application/msword",
		"application/vnd.openxmlformats-officedocument.wordprocessingml.document"
	];
	const MAX_FILES = 10; // Maximum number of files allowed (adjust as needed)

	attachmentInput.addEventListener("change", function () {
		const newFiles = Array.from(attachmentInput.files);

		// Check total number of files (existing + new)
		if (attachedFiles.length + newFiles.length > MAX_FILES) {
			alert(`You can only upload a maximum of ${MAX_FILES} files.`);
			attachmentInput.value = ""; // Clear input to allow re-selection
			return;
		}

		// Validate and process each new file
		newFiles.forEach((file) => {
			// Check if file is already attached
			if (attachedFiles.some((attachedFile) => attachedFile.name === file.name)) {
				alert(`File "${file.name}" is already attached.`);
				return;
			}

			// Validate file type
			if (!ALLOWED_TYPES.includes(file.type)) {
				alert(`File "${file.name}" has an invalid type. Allowed types: jpg, jpeg, png, pdf, doc, docx.`);
				return;
			}

			// Validate file size
			if (file.size > MAX_FILE_SIZE) {
				alert(`File "${file.name}" exceeds the maximum size of 32MB.`);
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
				img.style.maxWidth = "50px"; // Limit image size in preview
				img.style.maxHeight = "50px";
				img.onload = function () {
					URL.revokeObjectURL(img.src); // Free memory
				};
				previewItem.appendChild(img);
			} else {
				// Display an icon or placeholder for non-image files
				const icon = document.createElement("span");
				icon.textContent = "📄"; // Use an emoji or icon for non-image files
				icon.style.fontSize = "24px";
				previewItem.appendChild(icon);
			}

			// Display file name
			const fileName = document.createElement("span");
			fileName.textContent = file.name;
			fileName.style.display = "block";
			fileName.style.maxWidth = "100px"; // Limit width to prevent overflow
			fileName.style.overflow = "hidden";
			fileName.style.textOverflow = "ellipsis";
			fileName.style.whiteSpace = "nowrap";
			previewItem.appendChild(fileName);

			// Display file size
			const fileSize = document.createElement("span");
			fileSize.textContent = `(${(file.size / (1024 * 1024)).toFixed(2)}MB)`;
			fileSize.style.fontSize = "12px";
			fileSize.style.color = "#666";
			previewItem.appendChild(fileSize);

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

	// Ensure form submission includes the attached files
	const form = document.querySelector("#addAnnouncement"); // Use the correct form ID
	form.addEventListener("submit", function (event) {
		// Prevent submission if no files are attached (if required)
		// Uncomment if you want to enforce at least one file
		// if (attachedFiles.length === 0) {
		//     alert("Please attach at least one file.");
		//     event.preventDefault();
		//     return;
		// }

		// Re-add the attached files to the input for submission
		if (attachedFiles.length > 0) {
			const dataTransfer = new DataTransfer();
			attachedFiles.forEach((file) => {
				dataTransfer.items.add(file);
			});
			attachmentInput.files = dataTransfer.files; // Set the file input to include attached files
		}
	});

	</script>
	<script src="<?php echo base_url('assets/js/faculty.js?v=' . time()); ?>"></script>
	<script src="<?php echo base_url('assets/js/notification.js?v=' . time()); ?>"></script>

  </body>
</html>