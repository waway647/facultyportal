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
        <div class="nav-links-container">
			<a href="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Dashboard/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/dash.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Dashboard</div></div>
				</div>
			</a>
          
		  	<a href="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Announcements/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/announce.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Announcements</div></div>
				</div>
			</a>
          
		  	<a href="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/profile.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Profile</div></div>
				</div>
			</a>
          
		  	<a href="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Courses/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/course.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Courses</div></div>
				</div>
			</a>
          
		  	<a href="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/ResearchOutputs/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/research.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Research Outputs</div></div>
				</div>
			</a>
    
		  	<a href="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Consultations/index">
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
			<div id="notificationPanel" class="notification-panel"></div>
			
			<!-- Your profile link and other content here -->
			<a href="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Account/index">
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
          <div class="heading-container"><div class="text-wrapper-8">Announcements, Faculty member</div></div>
		  <div class="container-management">
				<div class="item-summary-container">
					<div class="boxes-container">
							<div class="item-box">
								<div class="left-summary-container">
									<div class="summary-img-container">
										<img src="<?php echo base_url('assets/images/profile/user.png'); ?>" alt="">
									</div>

									<h4>Total</h4>
								</div>
								
								<h2>3</h2>
							</div>

							<div class="item-box">
								<div class="summary-img-container">
									<img src="<?php echo base_url('assets/images/profile/user.png'); ?>" alt="">
								</div>

								<h4>Total</h4>

								<h2>3</h2>
							</div>

							<div class="item-box">
								<div class="summary-img-container">
									<img src="<?php echo base_url('assets/images/profile/user.png'); ?>" alt="">
								</div>

								<h4>Total</h4>

								<h2>3</h2>
							</div>
						</div>
					</div>

					<div class="sub-content-container ann">
						<div class="left-sub">
							<h4>Announcement List&nbsp</h4>
							<h4 class="left-sub-numbers">(3)</h4>
						</div>

						<!-- //Sort By -->
						<div class="right-sub-ann">
							<!-- <div class="searchDisplay">
								<a href=""><img class='img' src='<?php echo base_url('assets/images/icon/x.svg'); ?>' /></a>
								<h6 id="searchDisplay"></h6>
							</div> -->
							<p>Sort By</p>
							<div class="sub-container">
								<button class="button">
									<div class="div-wrapper">
										<select name="sort" id="sortSelect">
											<option value="" disabled selected>Choose sort order</option>
											<option value="desc">Newest First</option>
											<option value="asc">Oldest First</option>
											<option value="title_asc">Title (A-Z)</option>
											<option value="title_desc">Title (Z-A)</option>
										</select>
									</div>
								</button>
							</div>								
						</div>

						<!-- //Sort Date -->
						<div class="right-sub-ann">
							<!-- <div class="searchDisplay">
								<a href=""><img class='img' src='<?php echo base_url('assets/images/icon/x.svg'); ?>' /></a>
								<h6 id="searchDisplay"></h6>
							</div> -->
							<p>Date</p>
							<div class="sub-container">
								<button class="button">
									<div class="div-wrapper">
										<input type="date" name="date" id="sortDate">
									</div>
								</button>
							</div>								
						</div>

						<!-- //Search -->
						<div class="right-sub-ann">
							<div class="searchDisplay">
								<a href=""><img class='img' src='<?php echo base_url('assets/images/icon/x.svg'); ?>' /></a>
								<h6 id="searchDisplay"></h6>
							</div>
							<p>Search</p>
							<div class="sub-container">
								<button class="button">
									<div class="frame"><img class="img" src="<?php echo base_url('assets/images/icon/search.svg'); ?>" /></div>
									<div class="div-wrapper">
										<input type="search" name="search" id="searchInput" placeholder="Search">
									</div>
								</button>
							</div>								
						</div>
					</div>

					<div class="the-content-container-2">
						<div id="container">    
							<table class="table table-2" id="announcementList" name="announcementList">
								<thead>
								<tr>
									<th><input type="checkbox" class="checkbox"></th>
									<th>Date & Time</th>
									<th>Announcements</th>
									<th></th>
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

	<script>
	$(document).ready(function() {
		fetchAnnouncements(); // Fetch all Announcements on page load
		fetchFaculty();
	});

	function fetchFaculty() {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/common_controllers/FacultyDetails/getFaculty', 
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				console.log('AJAX success (Faculty Data):', result);

				if (Array.isArray(result)) {
					let loggedUserId = $('#logged_in_user').val(); // Hidden input storing logged user ID
					let facultyFullName = $('#full_name'); // Default text if no match is found

					result.forEach(function(faculty) {
						if (faculty.id == loggedUserId) {
							facultyFullName.text(faculty.full_name); // Get the logged-in faculty's full name
						}
					});

				} else {
					console.error('Expected an array but received:', result);
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching faculty:', error);
			}
		});
	}

	// Function to fetch course data via AJAX
	function fetchAnnouncements(query = '') {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Announcements/getAnnouncements',  // Update the URL as necessary
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

	// Function to create the table with course data
	function createAnnouncementsTable(result) {
		$('#announcementList tbody').empty();  // Clear existing rows
		var sno = `<input type="checkbox" class="checkbox">`;  // Initialize serial number
		result.forEach(function(item) {
			/* sno += 1; */

			// Split created_at into date and time
			var dateTime = new Date(item.created_at);
			
			// Format the date with alphabetical month
			var date = dateTime.toLocaleDateString('en-US', {
				year: 'numeric',
				month: 'long', // 'short' for abbreviated month (e.g., "Feb"), use 'long' for full month (e.g., "February")
				day: '2-digit'
			}).replace(/,/, ','); // e.g., "Feb 28 2025"

			// Format the time
			var time = dateTime.toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true, // Use 12-hour format with AM/PM
            timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone // User's local time zone
        	});

			var tr = `<tr>
			<td>${sno}</td>
			<td>
				<div class="date-time-container">
					<p>${date}</p>
					<p>${time}</p>
				</div>
			</td>
			<td>
				<div class="announcement-container">
					<p>${item.from}</p>
					<p>${item.title}</p>
				</div>
			</td>
			<td>
				<div class="action-container">
					<a href="" class="announcementBtn">Details</a>
					<a href="" class="">
						<img src="<?php echo base_url('assets/images/icon/more.png'); ?>" alt="">
					</a>				
				</div>
			</td>
			`;

			$('#announcementList tbody').append(tr);  // Append the new row to the table body
		});
	}


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
        window.addEventListener("click", function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    }

	// Initialize "Post Announcement" modal
	setupModal("postAnnouncementModal", "postAnnouncementBtn", "closeModalBtn");

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

	/* // File attachment handling
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

	}); */

	</script>
	<script src="<?php echo base_url('assets/js/faculty.js?v=' . time()); ?>"></script>
	<script src="<?php echo base_url('assets/js/notification.js?v=' . time()); ?>"></script>
	<script src="<?php echo base_url('assets/js/script.js'); ?>"></script>



  </body>
</html>