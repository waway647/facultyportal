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
          <div class="heading-container"><div class="text-wrapper-8">Research Outputs, Faculty</div></div>
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
						<h4>Research List&nbsp</h4>
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
							<button id="addResearchBtn" type="button" class="btn">+ &nbsp&nbsp Add Research</button>
						</div>
								
								<!-- Add Research Modal -->
								<div id="addResearchModal" class="modal">
									<div class="modal-content">
										<div class="modal-header">
										<h3>Add Research</h3>
										</div>
										<form id="addResearchForm" method="post" action="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/ResearchOutputs/createResearch" enctype="multipart/form-data">
											<div class="form-group">
												<input type="text" id="title" name="title" placeholder="Research Title" required>
											</div>
											<div class="form-group">
												<select id="add_publication_year" name="publication_year">
													<option value="" disabled selected>Year Published</option>
												</select>
											</div>
											<div class="form-group">
												<input type="text" id="faculty_id" name="faculty_profile_id" placeholder="Author name" required>
											</div>
											<div class="form-group">
												<div class="attachment-container">
													<label for="research_attachment" class="attachment-button">
														<img src="https://cdn-icons-png.flaticon.com/512/54/54719.png" alt="">
														Attach PDF
													</label>
													<input type="file" id="research_attachment" name="research_attachment" accept=".pdf" hidden>
													<div id="research_attachment_preview" class="attachment-preview"></div>
												</div>
											</div>
										
											<button type="submit" class="btn">Save & Confirm</button>

											<div class="close-text" id="closeaddResearchBtn">
												<h6 class="back-step">Cancel</h6>
											</div>
										</form>
									</div>
								</div> 

								<!-- Edit Research Modal -->
								<div id="editResearchModal" class="modal">
									<div class="modal-content">
										<div class="modal-header">
										<h3>Edit Research</h3>
										</div>
										<form id="editResearchForm" method="post" action="" enctype="multipart/form-data">
											<div class="form-group">
												<input type="text" id="title" name="title" placeholder="Research Title" required>
											</div>
											<div class="form-group">
												<select id="edit_publication_year" name="publication_year">
													<option value="" disabled selected>Year Published</option>
												</select>
											</div>
											<div class="form-group">
												<select id="faculty_assigned" name="faculty_profile_id" required>
													<option value="" disabled>Author</option>
												</select>
											</div>
											<div class="form-group">
												<div class="attachment-container">
													<label for="research_attachment_edit" class="attachment-button">
														<img src="https://cdn-icons-png.flaticon.com/512/54/54719.png" alt="">
														Attach PDF
													</label>
													<input type="file" id="research_attachment_edit" name="research_attachment" accept=".pdf" hidden>
													<div id="research_attachment_preview_edit" class="attachment-preview"></div>
												</div>
											</div>
										
											<button type="submit" class="btn">Save & Confirm</button>

											<div class="close-text" id="closeeditResearchBtn">
												<h6 class="back-step">Cancel</h6>
											</div>
										</form>
									</div>
								</div> 
								
	
								
					</div>
				</div>

				<div class="the-content-container">
					<div id="container">    
						<table class="table" id="researchList" name="researchList">
							<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Year Published</th>
								<th>Research PDF</th>
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
		fetchResearch();
		fetchFaculty();
	});

	// Fetch faculty_id for the select dropdown
	function fetchFaculty(modalId, callback, selectedFacultyId = null) {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/ResearchOutputs/getFaculty',
			type: 'GET',
			dataType: 'json',
			success: function (result) {
				console.log('AJAX success:', result);

				if (Array.isArray(result)) {
					let selectElement;

					// Identify the correct select element
					if (modalId === "addResearchModal") {
						selectElement = $('#faculty_id'); // Add Research Modal
					} else if (modalId === "editResearchModal") {
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

	function fetchResearch() {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/ResearchOutputs/getResearch',  // Update the URL as necessary
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				console.log('AJAX success (Research):', result);
				if (Array.isArray(result)) {
					createResearchTable(result, 0);  // Call the function to create the table and pass the result
				} else {
					console.error('Expected an array but received:', result);
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching research:', error);
			}
		});
	}

	function createResearchTable(result, sno) {
		sno = Number(sno);
		$('#researchList tbody').empty(); // Clear existing rows
		for (index in result) {
			var id = result[index].id;
			var title = result[index].title;
			var publication_year = result[index].publication_year;
			var research_attachment = result[index].research_attachment;

			sno += 1;

			var tr = "<tr>";
			tr += "<td>" + sno + "</td>";  // Serial number
			tr += "<td>" + title + "</td>";
			tr += "<td>" + publication_year + "</td>";
			tr += "<td><a href='javascript:void(0)' onclick='openPDFInNewTab(" + id + ")'>View PDF</a></td>";
			tr += "<td><a href='#' onclick='fetchResearchById(" + id + ")'>" +
					"<div class='table-icon-container'>" +
						"<div><img class='img' src='" + "<?php echo base_url('assets/images/icon/edit.svg'); ?>" + "' /></div>" +
						"<div><a href='http://localhost/GitHub/facultyportal/index.php/faculty_controllers/ResearchOutputs/deleteResearch/" + id + "'>" +
							"<img class='img' src='" + "<?php echo base_url('assets/images/icon/x.svg'); ?>" + "' /></a></div>" +
					"</div></td>";				
			tr += "</tr>";

			$('#researchList tbody').append(tr);  // Append the new row to the table body
		}
	}

	// JavaScript function to open the PDF in a new tab
	function openPDFInNewTab(id) {
		// Construct the URL to open the PDF
		var url = 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/ViewResearchPDF/' + id;
		// Open the URL in a new tab
		window.open(url, '_blank');
	}

	// Function to fetch research data via AJAX
	function fetchResearchById(researchId) {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/ResearchOutputs/getResearchByID/' + researchId,
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				if (result && !result.error) {
					populateEditResearchModal(result); // Populate the modal with the fetched data
				} else {
					console.error('Error: ' + (result.error || 'Research not found!'));
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching research by ID:', error);
			}
		});
	}
	
	function populateEditResearchModal(research) {
		console.log("Populating modal with research:", research);

		// Populate the year published dropdown
		fetchYearsInYearPublished('editResearchModal', function () {
			$('#edit_publication_year').val(research.publication_year);
			console.log(`Set selected year: ${research.publication_year}`);
		});

		// Populate the form fields with the research data
		$('#editResearchModal #title').val(research.title);

		// Handle file preview
		const attachmentPreview = $('#research_attachment_preview_edit');
		if (research.research_attachment) {
			attachmentPreview.html(
				`<a href="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/ResearchOutputs/viewResearchPDF/${research.id}" target="_blank">View Existing PDF</a>`
			);
		} else {
			attachmentPreview.html('');
		}

		// Leave the attachment input field empty for new uploads
		$('#editResearchModal #research_attachment_edit').val('');

		// Fetch and populate faculty dropdown
		fetchFaculty('editResearchModal', function () {
			console.log(`Faculty dropdown populated. Selected faculty: ${research.faculty_assigned}`);
		}, research.faculty_profile_id);

		// Set form action URL for updating research
		$('#editResearchForm').attr(
			'action',
			'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/ResearchOutputs/updateResearch/' + research.id
		);

		// Show the modal
		$('#editResearchModal').modal('show');
	}

	// Function to handle the modal visibility and reset it properly
	function closeModal(modalId) {
		const modal = $('#' + modalId);
		const attachmentPreview = $('#' + modalId + ' #research_attachment_preview_edit');
		
		// Clear attachment preview when closing modal
		attachmentPreview.html('');
		
		// Clear form inputs (to prevent stale data)
		modal.find('form')[0].reset();

		modal.modal('hide');  // Use Bootstrap modal hide method
	}

	// Close modal when clicking outside of it (on the backdrop)
	$(window).on('click', function (event) {
		if ($(event.target).is('#editResearchModal')) {
			closeModal('editResearchModal');
		}
	});

	// Attach event listener to "Cancel" button inside the Edit Research Modal
	$(document).on('click', '#closeeditResearchBtn', function () {
		closeModal('editResearchModal');
	});

	// Function to initialize a modal
    function setupModal(modalId, openButtonId, closeButtonId) {
        const modal = document.getElementById(modalId);
        const openButton = document.getElementById(openButtonId);
        const closeButton = document.getElementById(closeButtonId);

        // Open modal
        openButton.onclick = function () {
            modal.style.display = "block";
            if (modalId === "addResearchModal" || modalId === "editResearchModal") {
                fetchFaculty(modalId);
				fetchYearsInYearPublished('addResearchModal');
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
    setupModal("addResearchModal", "addResearchBtn", "closeaddResearchBtn");

	
	function fetchYearsInYearPublished(modalId, callback) {
		const currentYear = new Date().getFullYear();
		const startYear = 2000; // Fixed start year
		const selectElement = modalId === 'addResearchModal'
			? $('#add_publication_year')
			: $('#edit_publication_year');

		if (selectElement.length === 0) {
			console.error('Dropdown element not found for modal:', modalId);
			return;
		}

		// Clear existing options and add a default placeholder
		selectElement.empty();
		selectElement.append('<option value="" disabled selected>Year Published</option>');

		// Populate the dropdown with years from 2000 to the current year
		for (let i = currentYear; i >= startYear; i--) {
			selectElement.append('<option value="' + i + '">' + i + '</option>');
		}

		// Execute the callback if provided
		if (callback && typeof callback === 'function') {
			callback();
		}
	}

	// File attachment handling
	function setupFileAttachment(attachmentInputId, attachmentPreviewId, allowMultiple = true) {
		const attachmentInput = document.getElementById(attachmentInputId);
		const attachmentPreview = document.getElementById(attachmentPreviewId);
		let attachedFiles = []; // Store uploaded files dynamically

		// Listen for file selection
		attachmentInput.addEventListener("change", function () {
			// Clear previous files if only one file is allowed (for research_attachment)
			if (!allowMultiple) {
				attachedFiles = []; // Clear the previous files list if only one file is allowed
				attachmentPreview.innerHTML = ""; // Clear the preview area
			}

			// Loop through selected files and add them to attachedFiles array
			Array.from(attachmentInput.files).forEach((file) => {
				// Check if file is already attached
				if (attachedFiles.some((attachedFile) => attachedFile.name === file.name)) {
					alert(`File "${file.name}" is already attached.`);
					return;
				}

				// Add file to the list of attached files
				attachedFiles.push(file);

				// Create preview item for the file
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
		});

		// On form submission, ensure attached files are included
		const form = document.querySelector("form"); // Ensure you are selecting the right form
		form.addEventListener("submit", function (event) {
			// Only proceed if there are attached files
			if (attachedFiles.length > 0) {
				const dataTransfer = new DataTransfer(); // Necessary for adding files programmatically
				attachedFiles.forEach((file) => {
					dataTransfer.items.add(file);
				});
				attachmentInput.files = dataTransfer.files; // Set the file input to include attached files
			}
		});
	}

	// Call setupFileAttachment for 'research_attachment'
	setupFileAttachment("research_attachment", "research_attachment_preview", false);

	setupFileAttachment("research_attachment_edit", "research_attachment_preview_edit", false);

	// Call setupFileAttachment for 'announcement_attachment' if required
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
	</script>



  </body>
</html>