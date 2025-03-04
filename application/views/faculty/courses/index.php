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
						<input type="hidden" id="logged_in_user" value="<?php echo $this->session->userdata('faculty_id'); ?>">
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
          <div class="heading-container"><div class="text-wrapper-8">My Courses</div></div>
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

				<div class="sub-content-container">
					<div class="left-sub">
						<h4>Course List&nbsp</h4>
						<h4 class="left-sub-numbers">(3)</h4>
					</div>

					<div class="right-sub">
						<div class="searchDisplay">
							<a href=""><img class='img' src='<?php echo base_url('assets/images/icon/x.svg'); ?>' /></a>
							<h6 id="searchDisplay"></h6>
						</div>
						
						<div class="search-container">
							<button class="button">
								<div class="frame"><img class="img" src="<?php echo base_url('assets/images/icon/search.svg'); ?>" /></div>
								<div class="div-wrapper">
									<input type="search" name="search" id="searchInput" placeholder="Search">
								</div>
							</button>
						</div>
								
					</div>
				</div>

				<div class="the-content-container">
					<div id="container">    
						<table class="table" id="courseList" name="courseList">
							<thead>
							<tr>
								<th>#</th>
								<th>Course Code</th>
								<th>Course Name</th>
								<th>No. of Units</th>
								<th>Year & Section</th>
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
	// Call the function to fetch faculty when the page loads
	$(document).ready(function() {
		fetchCourses();
		fetchFaculty();

		$('#searchInput').on('keypress', function(event) {
			if (event.which == 13) {  // Enter key is pressed
				var searchTerm = $(this).val().trim();  // Get and trim the search term from the input field

				// Check if there's a search term
				if (searchTerm === '') {
					// Hide the search display if there's no search term
					$('.searchDisplay').removeClass('show'); // Remove 'show' class
				} else {
					// Display the search term on the left side of the search bar
					$('#searchDisplay').text(searchTerm);  // Display the search term in the h6 element
					
					// Show the search display by adding 'show' class
					$('.searchDisplay').addClass('show');  // Add 'show' class to display it as flex
				}

				// Call the function to fetch consultations with the search term
				fetchCourses(searchTerm);  
			}
		});
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
	function fetchCourses(query = '') {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Courses/getCourses',  // Update the URL as necessary
			type: 'GET',
			data: { search: query },
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

	// Function to create the table with course data
	function createCourseTable(result) {
		$('#courseList tbody').empty(); // Clear existing rows
		var sno = 0; // Initialize serial number
		result.forEach(function(item) {
			sno += 1;

			var tr = "<tr>";
			tr += "<td>" + sno + "</td>"; // Serial number
			tr += "<td>" + item.course_code + "</td>";
			tr += "<td>" + item.course_name + "</td>";
			tr += "<td>" + item.number_of_units + "</td>";
			tr += "<td>" + item.class_section + "</td>";
			tr += "</tr>";

			$('#courseList tbody').append(tr); // Append the new row to the table body
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
            if (modalId === "addCourseModal" || modalId === "editCourseModal") {
                fetchFaculty(modalId);
            }
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
	// File attachment handling
	function setupFileAttachment(attachmentInputId, attachmentPreviewId, allowMultiple = true) {
	const attachmentInput = document.getElementById(attachmentInputId);
	const attachmentPreview = document.getElementById(attachmentPreviewId);
	let attachedFiles = []; // Store uploaded files dynamically

	attachmentInput.addEventListener("change", function () {
		// Clear previous files if only one file is allowed (for research_attachment)
		if (!allowMultiple) {
		attachedFiles = []; // Clear the previous files list if only one file is allowed
		attachmentPreview.innerHTML = ""; // Clear the preview area
		}

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
	}

	// Call setupFileAttachment for 'addCourseModal'
	</script>
	<script src="<?php echo base_url('assets/js/notification.js?v=' . time()); ?>"></script>
	<script src="<?php echo base_url('assets/js/script.js'); ?>"></script>

  </body>
</html>