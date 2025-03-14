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
			<a href="http://localhost/GitHub/facultyportal/index.php/admin_controllers/Dashboard/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/dash.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Dashboard</div></div>
				</div>
			</a>

			<a href="http://localhost/GitHub/facultyportal/index.php/admin_controllers/UserManagement/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/usermanage.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">User Management</div></div>
				</div>
			</a>
          
		  	<a href="http://localhost/GitHub/facultyportal/index.php/admin_controllers/CourseManagement/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/course.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Course Management</div></div>
				</div>
			</a>
          
		  	<a href="http://localhost/GitHub/facultyportal/index.php/admin_controllers/ResearchManagement/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/research.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Research Management</div></div>
				</div>
			</a>
    
		  	<a href="http://localhost/GitHub/facultyportal/index.php/admin_controllers/Reports/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/reports.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">Reports</div></div>
				</div>
			</a>

			<a href="http://localhost/GitHub/facultyportal/index.php/admin_controllers/SystemSettings/index">
				<div class="nav-link">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/settings.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4">System Settings</div></div>
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
			<a href="http://localhost/GitHub/facultyportal/index.php/admin_controllers/Account/index">
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
          <div class="heading-container"><div class="text-wrapper-8">Courses, Department Chair</div></div>
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
							<button id="addCourseBtn" type="button" class="btn">+ &nbsp&nbsp Add User</button>
						</div>
								
								<!-- Add Course Modal -->
								<div id="addCourseModal" class="modal">
								<div class="modal-content">
									<div class="modal-header">
									<h3>Add Course</h3>
									</div>
									<form id="addFacultyForm" method="post" action="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Courses/createCourse">
										<div class="form-group">
											<input type="text" id="course_code" name="course_code" placeholder="Course Code" required>
										</div>
										<div class="form-group">
											<input type="text" id="course_name" name="course_name" placeholder="Course Name" required>
										</div>
										<div class="form-group">
											<select id="number_of_units" name="number_of_units" required>
												<option value="" disabled selected>Number of Units</option>
												<option value="0">0</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
											</select>
										</div>
										<div class="form-group">
											<select id="faculty_id" name="faculty_profile_id" required>
												<option value="" disabled selected>Faculty In-Charge</option>
												<option value=""></option>
											</select>
										</div>
										<div class="form-group">
											<input type="text" id="class_section" name="class_section" placeholder="Class Section" required>
										</div>

										<button type="submit" class="btn">Save & Confirm</button>

										<div>
											<h6 class="back-step" id="closeaddCourseBtn">Cancel</h6>
										</div>
									</form>
								</div>
								</div> 
								
								<!-- Edit Course Modal -->
								<div id="editCourseModal" class="modal">
								<div class="modal-content">
									<div class="modal-header">
									<h3>Edit Course</h3>
									</div>
									<form id="editCourseForm" method="post" action="">
										<div class="form-group">
											<input type="text" id="course_code" name="course_code" required>
										</div>
										<div class="form-group">
											<input type="text" id="course_name" name="course_name" required>
										</div>
										<div class="form-group">
											<select id="number_of_units" name="number_of_units" required>
												<option value="" disabled>Number of Units</option>
												<option value="0">0</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
											</select>
										</div>
										<div class="form-group">
											<select id="faculty_assigned" name="faculty_profile_id" required>
												<option value="" disabled>Faculty In-Charge</option>
											</select>
										</div>
										<div class="form-group">
											<input type="text" id="class_section" name="class_section" required>
										</div>

										<button type="submit" class="btn">Save & Confirm</button>

										<div>
											<h6 class="back-step" id="closeeditCourseBtn">Cancel</h6>
										</div>
									</form>
								</div>
								</div> 
								
					</div>
				</div>

				<div class="the-content-container">
					<div id="container">    
						<table class="table" id="courseList" name="courseList">
							<thead>
							<tr>
								<th>#</th>
								<th>Email</th>
								<th>Last Name</th>
								<th>First Name</th>
								<th>Middle Initial</th>
								<th>Department</th>
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
	// Call the function to fetch faculty when the page loads
	$(document).ready(function() {
		fetchFaculty(); // Fetch faculty when Add Course modal opens
		fetchCourses();
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
                if (modalId === "addCourseModal") {
                    selectElement = $('#faculty_id');
                } else if (modalId === "editCourseModal") {
                    selectElement = $('#faculty_assigned');
                }

                if (selectElement) {
                    selectElement.empty();
                    selectElement.append('<option value="" disabled selected>Faculty In-Charge</option>');
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
	function fetchCourses() {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Courses/getCourses',  // Update the URL as necessary
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

	// Function to create the table with course data
	function createCourseTable(result, sno) {
		sno = Number(sno);
		$('#courseList tbody').empty(); // Clear existing rows
		for (index in result) {
			var id = result[index].id;
			var course_code = result[index].course_code;
			var course_name = result[index].course_name;
			var number_of_units = result[index].number_of_units;
			var faculty_assigned = result[index].faculty_assigned;
			var class_section = result[index].class_section;

			sno += 1;

			var tr = "<tr>";
			tr += "<td>" + sno + "</td>";  // Serial number
			tr += "<td>" + course_code + "</td>";
			tr += "<td>" + course_name + "</td>";
			tr += "<td>" + number_of_units + "</td>";
			tr += "<td>" + faculty_assigned + "</td>";
			tr += "<td>" + class_section + "</td>";
			tr += "<td><a href='#' onclick='fetchCourseById(" + id + ")'>" +
					"<div class='table-icon-container'>" +
						"<div><img class='img' src='" + "<?php echo base_url('assets/images/icon/edit.svg'); ?>" + "' /></div>" +
						"<div><a href='http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Courses/deleteCourse/" + id + "'>" +
							"<img class='img' src='" + "<?php echo base_url('assets/images/icon/x.svg'); ?>" + "' /></a></div>" +
					"</div></td>";

			tr += "</tr>";

			$('#courseList tbody').append(tr);  // Append the new row to the table body
		}
	}

	// Function to fetch course data via AJAX
	function fetchCourseById(courseId) {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Courses/getCourseByID/' + courseId, // Updated URL with courseId
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				console.log('Fetched Course:', result);
				if (result && result.id) {
					populateEditModal(result); // Populate the modal with fetched data
				} else {
					console.error('Error: Course not found!');
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching course by ID:', error);
			}
		});
	}
	
	function populateEditModal(course) {
		$('#editCourseModal #course_code').val(course.course_code);
		$('#editCourseModal #course_name').val(course.course_name);
		$('#editCourseModal #number_of_units').val(course.number_of_units);
		
		// Fetch faculty options and set selected value
		fetchFaculty('editCourseModal', function() {
			$('#editCourseModal #faculty_assigned').val(course.faculty_profile_id);
		});

		$('#editCourseModal #class_section').val(course.class_section);
		$('#editCourseForm').attr('action', 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Courses/updateCourse/' + course.id);
		$('#editCourseModal').show(); // Display the modal
	}

	// Close modal when clicking outside of it (on the backdrop)
	window.addEventListener("click", function (event) {
		if (event.target === document.getElementById('editCourseModal')) {
			$('#editCourseModal').hide(); // Use fadeOut for smoother hiding
		}
	});

	// Attach event listener to "Cancel" button inside the Edit Course Modal
	$('#closeeditCourseBtn').on('click', function () {
		$('#editCourseModal').hide(); // Hide the modal when clicked
	});

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
	setupModal("postAnnouncementModal", "postAnnouncementBtn", "closeModalBtn");

	// Initialize "Add Course" modal
    setupModal("addCourseModal", "addCourseBtn", "closeaddCourseBtn");

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
	setupFileAttachment("announcement_attachment", "announcement_attachment_preview", false);

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