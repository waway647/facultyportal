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

	<script type="text/javascript">
		var base_url = "<?php echo base_url(); ?>"; // Passing PHP base_url to JS
	</script>
	
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
											<div class="form-input">
												<h6>Role</h6>
												<select id="user_role_id" name="user_role_id" required>
													<option value="2">Faculty</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="form-input">
												<h6>Email</h6>
												<input type="email" id="email" name="email" placeholder="Email" required>
												<small id="email-status" style="color:red;"></small>
											</div>
										</div>
										<div class="form-group">
											<div class="form-input">
												<h6>Password</h6>
												<input type="password" id="pass" name="pass" placeholder="Password" required>
											</div>
										</div>

										<button type="submit" class="btn">Continue</button>

										<div>
											<h6 id="closeAddFacultyBtn" class="back-step">Cancel</h6>
										</div>
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
											<div class="form-input">
												<h6>First Name</h6>
												<input type="text" id="first_name" name="first_name" placeholder="First Name" required>
											</div>
										</div>
										<div class="form-group">
											<div class="form-input">
												<h6>Last Name</h6>
												<input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
											</div>
										</div>
										<div class="form-group">
											<div class="form-input">
												<h6>Middle Name</h6>
												<input type="text" id="middle_name" name="middle_name" placeholder="Middle Name">
											</div>
										</div>
										<div class="form-group">
											<div class="form-input">
												<h6>Date Hired</h6>
												<input type="date" id="date_hired" name="date_hired" placeholder="Date Hired" required>
											</div>
										</div>
										<div class="form-group">
											<div class="form-input">
												<h6>Department</h6>
												<select id="department" name="department" required>
													<option value="" disabled selected>Choose a Department</option>
													<option value="Information Technology">Information Technology</option>
													<option value="Computer Science">Computer Science</option>
													<option value="Information Systems">Information Systems</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="form-input">
												<h6>Employment Type</h6>
												<select id="employment_type" name="employment_type" required>
													<option value="" disabled selected>Choose Employment Type</option>
													<option value="Full-Time">Full-Time</option>
													<option value="Part-Time">Part-Time</option>
												</select>
											</div>
										</div>

										<button type="submit" class="btn">Save & Confirm</button>

										<div>
											<h6 id="closeAddFacultyBtnStep2" class="back-step">Cancel</h6>
										</div>
									</form>
								</div>
								</div>
					</div>
				</div>

				<div id="profileCardContainer" class="the-content-container">
					
				</div>
			</div>
        </div>
      </div>
    </div>

	<script>
	// Call the function to fetch user profiles when the page loads
	$(document).ready(function() {
		fetchUserProfiles(); // Fetch data and create grid
		countAllFaculty();

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
				fetchUserProfiles(searchTerm);  
			}
		});
	});

	// Function to fetch user profiles and create the grid
	function fetchUserProfiles(query = '') {
				$.ajax({
					url: 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/FacultyManagement/fetchUserProfiles', // URL to fetch data
					type: 'GET',
					data: { search: query },
					dataType: 'json',
					success: function(result) {
						console.log(result); // Debugging statement to check the structure of result
						createGrid(result, 0);  // Call the function to create the grid with the fetched data
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

	function createGrid(result) {
		$('#profileCardContainer').empty(); // Clear previous content
		let sno = 0; // Initialize serial number

		result.forEach(function(user) {
			sno += 1;

			// Extract user details with fallback for null/undefined values
			const id = user.id || '';
			const firstName = user.first_name || '';
			const lastName = user.last_name || '';
			const middleName = user.middle_name || '';
			const department = user.department || '';
			const email = user.email || '';
			const mobileNumber = user.mobile_number || '';
			const age = parseInt(user.age) || 0;
			const profilePicture = user.profile_picture || 'assets/images/profile/default_profile.png';

			// Construct full name
			const name = [lastName, firstName, middleName].filter(Boolean).join(', ').replace(/, $/, '');

			// Age display
			const ageLine = age > 0 ? `<h6 class="role-class">${age} ${age === 1 ? 'year' : 'years'} old</h6>` : '';

			// Email and mobile number rows
			const emailRow = email
				? `<div class="contact-row">
					<div class="icon-contact">
						<img src="<?php echo base_url('assets/images/icon/email.svg'); ?>" alt="">
					</div>
					<h6>${email}</h6>
				</div>`
				: '';
			const mobileRow = mobileNumber
				? `<div class="contact-row">
					<div class="icon-contact">
						<img src="<?php echo base_url('assets/images/icon/phone.svg'); ?>" alt="">
					</div>
					<h6>${mobileNumber}</h6>
				</div>`
				: '';

			// Profile card
			const card = `
				<div class="profile-card-container">
					<div class="card-left">
						<div class="the-pic-container">
							<img src="${base_url}${profilePicture}" alt="Profile Picture">
						</div>
						<div class="the-details-container">
							<h4>${name}</h4>
							<div class="the-sub-details">
								${ageLine}
								<h6>${department}</h6>
							</div>
						</div>
					</div>
					<div class="card-right">
						${emailRow}
						${mobileRow}
					</div>
					<div class="card-action-container">
						<div class="card-action">
							<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/viewProfile/${id}">
								<button type="button" class="btn">View Profile</button>
							</a>
						</div>
					</div>
				</div>
			`;

			// Append the profile card to the container
			$('#profileCardContainer').append(card);
		});
	}


			

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
		const openButton = openButtonId ? document.getElementById(openButtonId) : null;
		const closeButton = document.getElementById(closeButtonId);

		// Open modal (only if openButtonId is provided)
		if (openButton) {
			openButton.onclick = function () {
				modal.style.display = "block";
			};
		}

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

	// Initialize "Add Faculty" modal
	setupModal("addFacultyModal", "addFacultyBtn", "closeAddFacultyBtn");

	// Step 2 modal (no open button)
    setupModal("addFacultyModalStep2", null, "closeAddFacultyBtnStep2");

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

	document.getElementById('email').addEventListener('input', function () {
		let email = this.value;
		let statusMessage = document.getElementById('email-status');
		let submitButton = document.querySelector('#addFacultyForm button[type="submit"]');

		if (email.length > 0) {
			// Make an AJAX request to check if the email already exists
			fetch('http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/FacultyManagement/checkEmailExists', {
				method: 'POST',
				body: new URLSearchParams({ email: email }),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded',
				},
			})
				.then(response => response.text())
				.then(result => {
					if (result === 'Email already in use') {
						statusMessage.textContent = 'This email is already in use.';
						statusMessage.style.color = 'maroon';
						submitButton.disabled = true; // Disable the submit button
					} else {
						statusMessage.textContent = '';
						submitButton.disabled = false; // Enable the submit button
					}
				})
				.catch(error => {
					console.error('Error:', error);
					// If there's an error, ensure the button remains disabled
					submitButton.disabled = true;
				});
		} else {
			statusMessage.textContent = '';
			submitButton.disabled = false; // Reset the button state if the email field is empty
		}
	});
	</script>



  </body>
</html>