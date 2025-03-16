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
          
		  	<a href="http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index">
				<div class="nav-link active">
					<div class="image-wrapper"><img class="img" src="<?php echo base_url('assets/images/icon/announce.svg'); ?>" /></div>
					<div class="frame-2"><div class="text-wrapper-4 highlight">Announcements</div></div>
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
				month: 'long', 
				day: '2-digit'
			}).replace(/,/, ','); 

			// Format the time
			var time = dateTime.toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true, 
            timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone 
        	});

			var editedText = '';
			if (item.updated_at) {
				var updatedDateTime = new Date(item.updated_at);
				var updatedDate = updatedDateTime.toLocaleDateString('en-US', {
					year: 'numeric',
					month: 'long',
					day: '2-digit',
				}).replace(/,/, ',');
				var updatedTime = updatedDateTime.toLocaleTimeString('en-US', {
					hour: '2-digit',
					minute: '2-digit',
					hour12: true,
					timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone 
				});
				editedText = `<span class="edited-text">(Edited - ${updatedDate} | ${updatedTime})</span>`;
			}

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
					<p>${item.from} ${editedText}</p>
					<p>${item.title}</p>
				</div>
			</td>
			<td>
				<div class="action-container">
					<a href="http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/view/${item.id}" class="announcementBtn">Details</a>
					<div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-id="${item.id}">
                            <img src="<?php echo base_url('assets/images/icon/more.png'); ?>" alt="More Options">
                        </a>
                        <div class="dropdown-menu" id="dropdown-${item.id}" style="display: none;">
                            <a href="http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/edit/${item.id}" class="dropdown-item">Edit</a>
                            <a href="#" class="dropdown-item delete-btn" data-id="${item.id}">Delete</a>
                        </div>
                    </div>				
				</div>
			</td>
			`;

			$('#announcementList tbody').append(tr);  // Append the new row to the table body
		});

		// Add event listeners for dropdown toggles
		document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
			toggle.addEventListener('click', function(e) {
				e.preventDefault();
				const id = this.getAttribute('data-id');
				const dropdownMenu = document.getElementById(`dropdown-${id}`);

				// Hide all other dropdowns
				document.querySelectorAll('.dropdown-menu').forEach(menu => {
					if (menu.id !== `dropdown-${id}`) {
						menu.style.display = 'none';
						document.body.appendChild(menu); // Move back to body if needed
					}
				});

				// Move the dropdown to the body to break stacking context
				const toggleRect = this.getBoundingClientRect();
				document.body.appendChild(dropdownMenu);
				dropdownMenu.style.position = 'fixed'; // Use fixed positioning relative to viewport
				dropdownMenu.style.top = `${toggleRect.bottom + 5}px`; // Position below the toggle
				dropdownMenu.style.left = `${toggleRect.left - dropdownMenu.offsetWidth}px`; // Align to the right of the toggle
				dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
			});
		});

		// Add event listener to close dropdown when clicking outside
		document.addEventListener('click', function(e) {
			if (!e.target.closest('.dropdown')) {
				document.querySelectorAll('.dropdown-menu').forEach(menu => {
					menu.style.display = 'none';
				});
			}
		});

		// Add event listeners for delete buttons
		document.querySelectorAll('.delete-btn').forEach(btn => {
			btn.addEventListener('click', function(e) {
				e.preventDefault();
				const id = this.getAttribute('data-id');
				if (confirm('Are you sure you want to delete this announcement?')) {
					// Perform DELETE request via AJAX
					fetch(`http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Announcements/delete/${id}`, {
						method: 'POST',
						headers: {
							'Content-Type': 'application/json',
						}
					})
					.then(response => response.json())
					.then(data => {
						if (data.success) {
							alert('Announcement deleted successfully.');
							// Reload the table or remove the row
							location.reload();
						} else {
							alert('Failed to delete announcement: ' + data.message);
						}
					})
					.catch(error => {
						console.error('Error:', error);
						alert('An error occurred while deleting the announcement.');
					});
				}
			});
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