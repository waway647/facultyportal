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
				<div class="nav-link active">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/course.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4 highlight">Courses</div></div>
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
          <div class="heading-container"><div class="text-wrapper-8">Courses, Department Chair</div></div>
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
							<h4>Courses List&nbsp</h4>
							<h4 class="left-sub-numbers">(<span id="totalCourses"></span>)</h4>
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
							<button id="addCourseBtn" type="button" class="btn">+ &nbsp&nbsp Add Course</button>
						</div>
								
								<!-- Add Course Modal -->
								<div id="addCourseModal" class="modal">
								<div class="modal-content">
									<div class="modal-header">
									<h3>Add Course</h3>
									</div>
									<form id="addCourseForm" method="post" action="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Courses/createCourse">
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
								<th>Course Code</th>
								<th>Course Name</th>
								<th>No. of Units</th>
								<th>Faculty Assigned</th>
								<th>Class Section</th>
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
		fetchCourses();
		fetchTotalCourses();

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
					if (modalId === "addCourseModal") {
						selectElement = $('#faculty_id'); // Add Research Modal
					} else if (modalId === "editCourseModal") {
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

	// Function to fetch course data via AJAX
	function fetchCourses(query = '') {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Courses/getCourses',  // Update the URL as necessary
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

	function fetchTotalCourses(){
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Courses/getTotalCourses',
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				console.log('AJAX success (Total Courses):', result);
				if (result) {
					$('#totalCourses').text(result);
				} else {
					console.error('Error: Total courses not found!');
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching total courses:', error);
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
			tr += "<td>" + item.faculty_assigned + "</td>";
			tr += "<td>" + item.class_section + "</td>";
			tr += "<td><a href='#' onclick='fetchCourseById(" + item.id + ")'>" +
					"<div class='table-icon-container'>" +
						"<div><img class='img' src='<?php echo base_url('assets/images/icon/edit.svg'); ?>' /></div>" +
						"<div><a href='http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Courses/deleteCourse/" + item.id + "'>" +
							"<img class='img' src='<?php echo base_url('assets/images/icon/x.svg'); ?>' /></a></div>" +
					"</div></a></td>";
			tr += "</tr>";

			$('#courseList tbody').append(tr); // Append the new row to the table body
		});
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

	// Initialize "Add Course" modal
    setupModal("addCourseModal", "addCourseBtn", "closeaddCourseBtn");

	</script>
	<script src="<?php echo base_url('assets/js/faculty.js?v=' . time()); ?>"></script>
	<script src="<?php echo base_url('assets/js/notification.js?v=' . time()); ?>"></script>


  </body>
</html>