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
			<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Dashboard/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/dash.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Dashboard</div></div>
				</div>
			</a>
          
		  	<a href="http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index">
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
				<div class="nav-link active">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/consult.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4 highlight">Consultations</div></div>
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
          <div class="heading-container"><div class="text-wrapper-8">Consultations, Department Chair</div></div>
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
						<h4>Consultation Timeslot List&nbsp</h4>
						<h4 class="left-sub-numbers">(<span id="totalConsultations"></span>)</h4>
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
							<button id="addConsultationBtn" type="button" class="btn">+ &nbsp&nbsp Add Timeslot</button>
						</div>
								
								<!-- Add Consultation Modal -->
								<div id="addConsultationModal" class="modal">
								<div class="modal-content">
									<div class="modal-header">
									<h3>Add Timeslot</h3>
									</div>
									<form id="addConsultationForm" method="post" action="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Consultations/createConsultation">
										<div class="form-group">
											<div class="form-input">
												<h6>Faculty</h6>
												<select id="faculty_id" name="faculty_profile_id" required>
													<option value="" disabled selected>Faculty</option>
													<option value=""></option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="form-input">
												<h6>Day</h6>
												<select id="day" name="day" required>
													<option value="" disabled selected>Day</option>
													<option value="Monday">Monday</option>
													<option value="Tuesday">Tuesday</option>
													<option value="Wednesday">Wednesday</option>
													<option value="Thursday">Thursday</option>
													<option value="Friday">Friday</option>
													<option value="Saturday">Saturday</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="form-input">
												<h6>Start Time</h6>
												<input type="time" id="start_time" name="start_time" placeholder="Start Time" required>
											</div>
										</div>
										<div class="form-group">
											<div class="form-input">
												<h6>End Time</h6>
												<input type="time" id="end_time" name="end_time" placeholder="End Time" required>
											</div>
										</div>
										<div class="form-group">
											<div class="form-input">
												<h6>Mode of Consultation</h6>
												<select id="mode_of_consultation" name="mode_of_consultation" required>
													<option value="" disabled selected>Mode of Consultation</option>
													<option value="Online">Online</option>
													<option value="In-Person">In-Person</option>
												</select>
											</div>
										</div>

										<button type="submit" class="btn">Save & Confirm</button>

										<div>
											<h6 class="back-step" id="closeaddConsultationBtn">Cancel</h6>
										</div>
									</form>
								</div>
								</div> 
								
								<!-- Edit Consultation Modal -->
								<div id="editConsultationModal" class="modal">
								<div class="modal-content">
									<div class="modal-header">
									<h3>Edit Timeslot</h3>
									</div>
									<form id="editConsultationForm" method="post" action="">
									<div class="form-group">
											<div class="form-input">
												<h6>Faculty</h6>
												<select id="faculty_assigned" name="faculty_profile_id" required>
													<option value="" disabled selected>Faculty</option>
													<option value=""></option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="form-input">
												<h6>Day</h6>
												<select id="day" name="day" required>
													<option value="" disabled selected>Day</option>
													<option value="Monday">Monday</option>
													<option value="Tuesday">Tuesday</option>
													<option value="Wednesday">Wednesday</option>
													<option value="Thursday">Thursday</option>
													<option value="Friday">Friday</option>
													<option value="Saturday">Saturday</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="form-input">
												<h6>Start Time</h6>
												<input type="time" id="start_time" name="start_time" placeholder="Start Time" required>
											</div>
										</div>
										<div class="form-group">
											<div class="form-input">
												<h6>End Time</h6>
												<input type="time" id="end_time" name="end_time" placeholder="End Time" required>
											</div>
										</div>
										<div class="form-group">
											<div class="form-input">
												<h6>Mode of Consultation</h6>
												<select id="mode_of_consultation" name="mode_of_consultation" required>
													<option value="" disabled selected>Mode of Consultation</option>
													<option value="Online">Online</option>
													<option value="In-Person">In-Person</option>
												</select>
											</div>
										</div>

										<button type="submit" class="btn">Save & Confirm</button>

										<div>
											<h6 class="back-step" id="closeeditConsultationBtn">Cancel</h6>
										</div>
									</form>
								</div>
								</div> 
								
					</div>
				</div>

				<div class="the-content-container">
					<div id="container">    
						<table class="table" id="consultationList" name="consultationList">
							<thead>
								<tr>
									<th>#</th>
									<th>Faculty</th>
									<th>Day</th>
									<th>Start Time</th>
									<th>End Time</th>
									<th>Mode of Consultation</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<!-- Data will be populated dynamically here -->
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
		fetchConsultations();
		fetchFaculty();
		fetchTotalConsultations();

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
				fetchConsultations(searchTerm);  
			}
		});
	});

	function fetchFaculty(modalId, callback, selectedFacultyId = null) {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/common_controllers/FacultyDetails/getFacultyNames',
			type: 'GET',
			dataType: 'json',
			success: function (result) {
				console.log('AJAX success:', result);

				if (Array.isArray(result)) {
					let selectElement;

					// Identify the correct select element
					if (modalId === "addConsultationModal") {
						selectElement = $('#faculty_id'); // Add Research Modal
					} else if (modalId === "editConsultationModal") {
						selectElement = $('#faculty_assigned'); // Edit Research Modal
					}

					if (selectElement) {
						// Clear existing options and add a default one
						selectElement.empty();
						selectElement.append('<option value="" disabled selected>Select Author</option>');

						// Populate the dropdown with faculty data
						result.forEach(function (faculty) {
							const isSelected = selectedFacultyId == faculty.id ? "selected" : "";
							selectElement.append(
								`<option value="${faculty.id}" ${isSelected}>${faculty.full_name}</option>`
							);
						});

						// Execute callback if provided
						if (callback && typeof callback === 'function') {
							callback();
						}
					} else {
						console.error('Select element not found for modal:', modalId);
					}
				} else {
					console.error('Expected an array but received:', result);
				}
			},
			error: function (xhr, status, error) {
				console.error('Error fetching faculty:', error);
			}
		});
	}

	function fetchTotalConsultations(){
			$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Consultations/getTotalConsultations',
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				console.log('AJAX success (Total Announcements):', result);
				if (result) {
					$('#totalConsultations').text(result);
				} else {
					console.error('Expected a total count but received:', result);
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching Total Announcements:', error);
			}
		});
	}

	// Function to fetch course data via AJAX
	function fetchConsultations(query = '') {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Consultations/getConsultations',  // Adjust the URL as necessary
			type: 'GET',
			data: { search: query }, // Send the search query to the server
			dataType: 'json',
			success: function(result) {
				console.log('AJAX success (Consultations):', result);
				if (Array.isArray(result)) {
					createConsultationTable(result, 0); // Call function to create the table with the result
				} else {
					console.error('Expected an array but received:', result);
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching consultations:', error);
			}
		});
	}

	// Function to create the table with course data
	function createConsultationTable(result) {
		$('#consultationList tbody').empty();  // Clear existing rows
		var sno = 0;  // Initialize serial number
		result.forEach(function(item) {
			sno += 1;

			var tr = "<tr>";
			tr += "<td>" + sno + "</td>";  // Serial number
			tr += "<td>" + item.faculty + "</td>";
			tr += "<td>" + item.day + "</td>";
			tr += "<td>" + item.start_time + "</td>";
			tr += "<td>" + item.end_time + "</td>";
			tr += "<td>" + item.mode_of_consultation + "</td>";
			tr += "<td><a href='#' onclick='fetchConsultationById(" + item.id + ")'>" +
					"<div class='table-icon-container'>" +
						"<div><img class='img' src='<?php echo base_url('assets/images/icon/edit.svg'); ?>' /></div>" +
						"<div><a href='http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Consultations/deleteConsultation/" + item.id + "'>" +
							"<img class='img' src='<?php echo base_url('assets/images/icon/x.svg'); ?>' /></a></div>" +
					"</div></td>";
			tr += "</tr>";

			$('#consultationList tbody').append(tr);  // Append the new row to the table body
		});
	}


	function fetchConsultationById(consultationId) {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Consultations/getConsultationByID/' + consultationId,
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				console.log('Fetched Consultation:', result);
				if (result && result.id) {
					populateEditModal(result); // Populate the modal with fetched data
				} else {
					console.error('Error: Consultation not found!');
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching consultation by ID:', error);
			}
		});
	}
	
	function populateEditModal(consultation) {
		fetchFaculty('editConsultationModal', function() {
			$('#editConsultationModal #faculty_assigned').val(consultation.faculty_profile_id);
		});

		$('#editConsultationModal #day').val(consultation.day);
		$('#editConsultationModal #start_time').val(consultation.start_time);
		$('#editConsultationModal #end_time').val(consultation.end_time);
		$('#editConsultationModal #mode_of_consultation').val(consultation.mode_of_consultation);

		$('#editConsultationForm').attr('action', 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Consultations/updateConsultation/' + consultation.id);
		$('#editConsultationModal').show(); // Display the modal
	}

	// Close modal when clicking outside of it (on the backdrop)
	window.addEventListener("click", function (event) {
		if (event.target === document.getElementById('editConsultationModal')) {
			$('#editConsultationModal').hide(); // Use fadeOut for smoother hiding
		}
	});

	// Attach event listener to "Cancel" button inside the Edit Course Modal
	$('#closeeditConsultationBtn').on('click', function () {
		$('#editConsultationModal').hide(); // Hide the modal when clicked
	});

	// Function to initialize a modal
    function setupModal(modalId, openButtonId, closeButtonId) {
        const modal = document.getElementById(modalId);
        const openButton = document.getElementById(openButtonId);
        const closeButton = document.getElementById(closeButtonId);

        // Open modal
        openButton.onclick = function () {
            modal.style.display = "block";
            if (modalId === "addCourseModal" || modalId === "editCourseModal" || modalId === "addConsultationModal") {
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

	// Initialize "Add Course" modal
    setupModal("addConsultationModal", "addConsultationBtn", "closeaddConsultationBtn");

	</script>
	<script src="<?php echo base_url('assets/js/faculty.js?v=' . time()); ?>"></script>
	<script src="<?php echo base_url('assets/js/notification.js?v=' . time()); ?>"></script>


  </body>
</html>