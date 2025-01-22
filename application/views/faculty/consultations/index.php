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
			<a href="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Account/index">
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
          <div class="heading-container"><div class="text-wrapper-8">Consultations, Faculty member</div></div>
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
							
							<h2>3</h2>
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
						<h4>Consultation Timeslot List&nbsp</h4>
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
							<button id="addConsultationBtn" type="button" class="btn">+ &nbsp&nbsp Add Timeslot</button>
						</div>
								
								<!-- Add Consultation Modal -->
								<div id="addConsultationModal" class="modal">
								<div class="modal-content">
									<div class="modal-header">
									<h3>Add Timeslot</h3>
									</div>
									<form id="addConsultationForm" method="post" action="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Consultations/createConsultation">
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
		fetchFaculty(); // Fetch faculty when Add Course modal opens
		fetchConsultations();
	});

	// Fetch faculty_id for the select dropdown
	function fetchFaculty(modalId, callback) {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Courses/getFaculty',
			type: 'GET',
			dataType: 'json',
			success: function (result) {
				console.log('AJAX success:', result);
				if (Array.isArray(result)) {
					let selectElement;
					if (modalId === "addConsultationModal") {
						selectElement = $('#faculty_id');
					} else if (modalId === "editConsultationModal") {
						selectElement = $('#faculty_assigned');
					}

					if (selectElement) {
						selectElement.empty();
						selectElement.append('<option value="" disabled selected>Faculty</option>');
						result.forEach(function (faculty) {
							selectElement.append('<option value="' + faculty.id + '">' + faculty.full_name + '</option>');
						});

						// Execute the callback if provided
						if (callback && typeof callback === 'function') {
							callback();
						}
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


	// Function to fetch course data via AJAX
	function fetchConsultations() {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Consultations/getConsultations',  // Update the URL as necessary
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				console.log('AJAX success (Consultations):', result);
				if (Array.isArray(result)) {
					createConsultationTable(result, 0);  // Call the function to create the table and pass the result
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
	function createConsultationTable(result, sno) {
		sno = Number(sno);
		$('#consultationList tbody').empty(); // Clear existing rows
		for (index in result) {
			var id = result[index].id;
			var faculty = result[index].faculty;
			var day = result[index].day;
			var start_time = result[index].start_time;
			var end_time = result[index].end_time;
			var mode_of_consultation = result[index].mode_of_consultation;

			sno += 1;

			var tr = "<tr>";
			tr += "<td>" + sno + "</td>";  // Serial number
			tr += "<td>" + faculty + "</td>";
			tr += "<td>" + day + "</td>";
			tr += "<td>" + start_time + "</td>";
			tr += "<td>" + end_time + "</td>";
			tr += "<td>" + mode_of_consultation + "</td>";
			tr += "<td><a href='#' onclick='fetchConsultationById(" + id + ")'>" +
					"<div class='table-icon-container'>" +
						"<div><img class='img' src='" + "<?php echo base_url('assets/images/icon/edit.svg'); ?>" + "' /></div>" +
						"<div><a href='http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Consultations/deleteConsultation/" + id + "'>" +
							"<img class='img' src='" + "<?php echo base_url('assets/images/icon/x.svg'); ?>" + "' /></a></div>" +
					"</div></td>";

			tr += "</tr>";

			$('#consultationList tbody').append(tr);  // Append the new row to the table body
		}
	}

	function fetchConsultationById(consultationId) {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Consultations/getConsultationByID/' + consultationId,
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

		$('#editConsultationForm').attr('action', 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Consultations/updateConsultation/' + consultation.id);
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

	// Initialize "Post Announcement" modal
	setupModal("postAnnouncementModal", "postAnnouncementBtn", "closeModalBtn");

	// Initialize "Add Course" modal
    setupModal("addConsultationModal", "addConsultationBtn", "closeaddConsultationBtn");

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