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
								<input type="file" id="announcement_attachment" name="announcement_attachment" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" multiple hidden>
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
		<a href="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Dashboard/index">
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
        <div class="main-content-2 main-content-2-profile">
			<div class="cover-photo">
					<div class="cover-photo-real">
						<button id="editCoverPhotoBtn">
						<img id="coverPhoto" src="<?php echo base_url($faculty->cover_photo); ?>" alt="Cover Photo">
							<div class="overlay">
								<img src="<?php echo base_url('assets/images/icon/edit.svg'); ?>">
							</div>
						</button>
					</div>
					
					<div class="profile-picture">
						<button id="editProfilePictureBtn">
						<img id="profilePicture" src="<?php echo base_url($faculty->profile_picture); ?>" alt="Profile Picture">
							<div class="overlay">
								<img src="<?php echo base_url('assets/images/icon/edit.svg'); ?>">
							</div>
						</button>
					</div>
			</div>
									<!-- Edit Profile Modal -->
									<div id="editProfilePictureModal" class="modal">
									<div class="modal-content img-modal-content">
										<div class="modal-header">
											<div class="modal-header-text">
												<h3>Edit Profile</h3>
												<h6>Choose your profile picture.</h6>
											</div>
											
											<div class="close-btn-modal" id="closeEditProfilePictureBtn">
												<img src="<?php echo base_url('assets/images/icon/x.svg'); ?>" alt="">
											</div>
										</div>
										<form id="editProfilePictureForm" method="post" enctype="multipart/form-data" action="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/changeProfilePic">
											<div class="form-group img-form-group">
												<div class="pic-preview-container">
													<div class="preview">
														<div class="px184">
															<img id="preview_184" src="<?php echo base_url(!empty($faculty->profile_picture) ? $faculty->profile_picture : 'assets/images/profile/default_profile.png'); ?>" alt="">
														</div>
														<h6>184px</h6>
													</div>
													<div class="preview">
														<div class="px64">
															<img id="preview_64" src="<?php echo base_url(!empty($faculty->profile_picture) ? $faculty->profile_picture : 'assets/images/profile/default_profile.png'); ?>" alt="">
														</div>
														<h6>64px</h6>
													</div>

													<div class="preview">
														<div class="px32">
															<img id="preview_32" src="<?php echo base_url(!empty($faculty->profile_picture) ? $faculty->profile_picture : 'assets/images/profile/default_profile.png'); ?>" alt="">
														</div>
														<h6>32px</h6>
													</div>
												</div>


												<div class="pic-upload-container">
													<input type="file" id="profile_pic_change" name="profile_picture" accept=".jpg,.jpeg,.png">
													<label for="profile_pic_change">Upload your profile</label>
													<h6>Upload a file from your device. Image should be square, at least 184px x 184px.</h6>
												</div>
											</div>
											
											<div class="button-submit-container">
												<button type="submit" class="btn">Save & Confirm</button>
											</div>					
										</form>
									</div>
									</div> 

									<!-- Edit Cover Photo Modal -->
									<div id="editCoverPhotoModal" class="modal">
									<div class="modal-content img-modal-content">
										<div class="modal-header">
											<div class="modal-header-text">
												<h3>Edit Cover Photo</h3>
												<h6>Choose your cover photo.</h6>
											</div>
											
											<div class="close-btn-modal" id="closeeditCoverPhotoBtn">
												<img src="<?php echo base_url('assets/images/icon/x.svg'); ?>" alt="">
											</div>
										</div>
										<form id="editCoverPhotoForm" method="post" enctype="multipart/form-data" action="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/changeCoverPhoto">
											<div class="form-group img-form-group">
												<div class="pic-preview-container">
													<div class="preview">
														<div class="px184">
															<img id="preview_184_cover" src="<?php echo base_url(!empty($faculty->cover_photo) ? $faculty->cover_photo : 'assets/images/cover/sbu_default_cover.png'); ?>" alt="">
														</div>
														<h6>184px</h6>
													</div>
													<div class="preview">
														<div class="px64">
															<img id="preview_64_cover" src="<?php echo base_url(!empty($faculty->cover_photo) ? $faculty->cover_photo : 'assets/images/cover/sbu_default_cover.png'); ?>" alt="">
														</div>
														<h6>64px</h6>
													</div>

													<div class="preview">
														<div class="px32">
															<img id="preview_32_cover" src="<?php echo base_url(!empty($faculty->cover_photo) ? $faculty->cover_photo : 'assets/images/cover/sbu_default_cover.png'); ?>" alt="">
														</div>
														<h6>32px</h6>
													</div>
												</div>


												<div class="pic-upload-container">
													<input type="file" id="cover_photo_change" name="cover_photo" accept=".jpg,.jpeg,.png">
													<label for="cover_photo_change">Upload your profile</label>
													<h6>Upload a file from your device. Image should be square, at least 184px x 184px.</h6>
												</div>
											</div>
											
											<div class="button-submit-container">
												<button type="submit" class="btn">Save & Confirm</button>
											</div>					
										</form>
									</div>
									</div> 

			<div class="the-profile-main-container">
				<form method="post" action="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/insertUpdatedProfile">
				<?php if (isset($faculty) && $faculty !== null): ?>
				<div class="the-profile-headings">
					<div class="profile-headings-left">
						<div class="profile-left-subheadings">
							<div class="form-input">
								<h6>First name</h6>
								<input type="text" id="first_name" name="first_name" value="<?php echo $faculty->first_name; ?>" placeholder="First Name" required>
							</div>

							<div class="form-input">
								<h6>Middle name</h6>
								<input type="text" id="middle_name" name="middle_name" value="<?php echo $faculty->middle_name; ?>" placeholder="Middle Name">
							</div>

							<div class="form-input">
								<h6>Last name</h6>
								<input type="text" id="last_name" name="last_name" value="<?php echo $faculty->last_name; ?>" placeholder="Last Name" required>
							</div>
							
							<div class="form-input">
								<h6>Birthday</h6>
								<input type="date" id="birthday" name="birthday" value="<?php echo $faculty->birthday; ?>" max="<?php echo date('Y') - 1 . '-12-31'; ?>" placeholder="Last Name">
							</div>
						
							<div class="form-input">
								<h6>Email</h6>
								<input type="text" id="email" name="email" value="<?php echo $faculty->email; ?>" placeholder="Email" required>
							</div>
							
							<div class="form-input">
								<h6>Mobile Number</h6>
								<input type="text" id="mobile_number" name="mobile_number" value="<?php echo $faculty->mobile_number; ?>" placeholder="Mobile Number">
							</div>
						</div>

						<div class="profile-buttons">
							<a href="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/cancelEdit">
								<div class="profile-button-container cancel-btn">
									<h5>Cancel</h5>
								</div>
							</a>

							<button type="submit" class="save-btn">								
								<h5>Save Changes</h5>			
							</button>
						</div>
					</div>

					<div class="profile-headings-right">
						<div class="faculty-role-container">
							<div class="role-heading-container role-row">
								<h5>Current Role</h5>
								<img src="<?php echo base_url('assets/images/icon/rolebag.svg'); ?>" alt="">
							</div>

							
							<div class="role-item-container role-row">
								<div class="role-item-profile">
									<h5><?php echo $faculty->role_name; ?></h5>
								</div>

								<div class="role-item-profile">
									<h5><?php echo $faculty->position; ?></h5>
								</div>
							</div>
						</div>

						<div class="faculty-job-information">
							<div><h5><?php echo $faculty->department; ?><h5 class="sub-h5">&nbsp| Department</h5></h5></div>
							<div><h5><?php echo $faculty->employment_type; ?><h5 class="sub-h5">&nbsp| Employment Type</h5></h5></div>
							<div><h5><?php echo $faculty->date_hired; ?><h5 class="sub-h5">&nbsp| Date Hired</h5></h5></div>
						</div>
					</div>
				</div>
				<?php endif ?>
				</form>

				<!-- Tables -->
				<div class="tables-profile-container">
					<!-- Qualifications -->
						<div class="the-content-container">
							<div class="sub-content-container">
								<div class="table-heading">
									<h4>Qualifications</h4>
								</div>

								<div class="add-button">
									<button id="addQualificationsBtn" type="button" class="btn">+ &nbsp&nbsp Add Qualifications</button>
								</div>
										
										<!-- Add Qualifications Modal -->
										<div id="addQualificationsModal" class="modal">
										<div class="modal-content">
											<div class="modal-header">
											<h3>Add Qualifications</h3>
											</div>
											<form id="addQualificationsForm" method="post" action="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/createQualifications" enctype="multipart/form-data">
												<div class="form-group">
													<select id="academic_degree" name="academic_degree" required>
														<option value="" disabled selected>Academic Degree</option>
														<option value="Associate Degree">Associate Degree</option>
														<option value="Bachelor's Degree">Bachelor's Degree</option>
														<option value="Master's Degree">Master's Degree</option>
														<option value="Doctoral Degree">Doctoral Degree</option>

													</select>
												</div>

												<div class="form-group">
													<input type="text" id="institution" name="institution" placeholder="Institution" required>
												</div>

												<div class="form-group">
													<select id="add_year_graduated" name="year_graduated" required>
													</select>
												</div>

												<div class="form-group">
													<div class="attachment-container">
														<label for="qualification_attachment" class="attachment-button">
															<img src="https://cdn-icons-png.flaticon.com/512/54/54719.png" alt="">
															Attach PDF
														</label>
														<input type="file" id="qualification_attachment" name="qualification_attachment" accept=".pdf" hidden>
														<div id="qualification_attachment_preview" class="attachment-preview"></div>
													</div>
												</div>

												<button type="submit" class="btn">Save & Confirm</button>

												<div class="close-text" id="closeaddQualificationsBtn">
													<h6 class="back-step">Cancel</h6>
												</div>
											</form>
										</div>
										</div> 

										<!-- Edit Qualifications Modal -->
										<div id="editQualificationsModal" class="modal">
										<div class="modal-content">
											<div class="modal-header">
											<h3>Edit Qualifications</h3>
											</div>
											<form id="editQualificationsForm" method="post" action="" enctype="multipart/form-data">
												<div class="form-group">
													<select id="academic_degree" name="academic_degree" required>
														<option value="" disabled selected>Academic Degree</option>
														<option value="Associate Degree">Associate Degree</option>
														<option value="Bachelor's Degree">Bachelor's Degree</option>
														<option value="Master's Degree">Master's Degree</option>
														<option value="Doctoral Degree">Doctoral Degree</option>

													</select>
												</div>

												<div class="form-group">
													<input type="text" id="institution" name="institution" placeholder="Institution" required>
												</div>

												<div class="form-group">
													<select id="edit_year_graduated" name="year_graduated" required>
														<option value="" disabled selected>Year Graduated</option>
													</select>
												</div>

												<div class="form-group">
													<div class="attachment-container">
														<label for="qualification_attachment_edit" class="attachment-button">
															<img src="https://cdn-icons-png.flaticon.com/512/54/54719.png" alt="">
															Attach PDF
														</label>
														<input type="file" id="qualification_attachment_edit" name="qualification_attachment" accept=".pdf" hidden>
														<div id="qualification_attachment_preview_edit" class="attachment-preview"></div>
													</div>
												</div>

												<button type="submit" class="btn">Save & Confirm</button>

												<div class="close-text" id="closeEditQualificationsBtn">
													<h6 class="back-step">Cancel</h6>
												</div>
											</form>
										</div>
										</div> 
							</div>
							
							<div id="container">    
								<table class="table" id="QualificationsList" name="QualificationsList">
									<thead>
									<tr>
										<th>#</th>
										<th>Academic Degree</th>
										<th>Institution</th>
										<th>Year Graduated</th>
										<th>Copy of Diploma</th>
										<th>Action</th>
									</tr>
									</thead>

									<tbody>
										
									</tbody>
								</table>

							</div>
						</div>

					<!-- Industry Experience -->
						<div class="the-content-container">
							<div class="sub-content-container">
								<div class="table-heading">
									<h4>Industry Experience</h4>
								</div>
								
								<div class="add-button">
									<button id="addExperienceBtn" type="button" class="btn">+ &nbsp&nbsp Add Experience</button>
								</div>
										
										<!-- Add Experience Modal -->
										<div id="addExperienceModal" class="modal">
										<div class="modal-content">
											<div class="modal-header">
											<h3>Add Experience</h3>
											</div>
											<form id="addExperienceForm" method="post" action="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/createExperience">
												<div class="form-group">
													<input type="text" id="company_name" name="company_name" placeholder="Name of Company" required>
												</div>
												<div class="form-group">
													<input type="text" id="job_position" name="job_position" placeholder="Job Position" required>
												</div>
												<div class="form-group">
													<select id="add_years_of_experience" name="years_of_experience" required>
														<option value="" disabled selected>Years of Experience</option>
													</select>
												</div>
												
												<button type="submit" class="btn">Save & Confirm</button>

												<div class="close-text" id="closeaddExperienceBtn">
													<h6 class="back-step">Cancel</h6>
												</div>
											</form>
										</div>
										</div> 

										<!-- Edit Experience Modal -->
										<div id="editExperienceModal" class="modal">
										<div class="modal-content">
											<div class="modal-header">
											<h3>Edit Experience</h3>
											</div>
											<form id="editExperienceForm" method="post" action="">
												<div class="form-group">
													<input type="text" id="company_name" name="company_name" placeholder="Name of Company" required>
												</div>
												<div class="form-group">
													<input type="text" id="job_position" name="job_position" placeholder="Job Position" required>
												</div>
												<div class="form-group">
													<select id="edit_years_of_experience" name="years_of_experience" required>
														<option value="" disabled selected>Years of Experience</option>
													</select>
												</div>
												
												<button type="submit" class="btn">Save & Confirm</button>

												<div class="close-text" id="closeEditExperienceBtn">
													<h6 class="back-step">Cancel</h6>
												</div>
											</form>
										</div>
										</div> 
										
							</div>

							<div id="container">    
								<table class="table" id="ExperienceList" name="ExperienceList">
									<thead>
									<tr>
										<th>#</th>
										<th>Name of Company</th>
										<th>Job Position</th>
										<th>Years of Experience</th>
										<th>Action</th>
									</tr>
									</thead>

									<tbody>
										
									</tbody>
								</table>

							</div>
						</div>

						<!-- Certifications -->
						<div class="the-content-container">
							<div class="sub-content-container">
								<div class="table-heading">
									<h4>Certifications</h4>
								</div>

								<div class="add-button">
									<button id="addCertificationBtn" type="button" class="btn">+ &nbsp&nbsp Add Certification</button>
								</div>

								<!-- Add Certification Modal -->
								<div id="addCertificationModal" class="modal">
									<div class="modal-content">
										<div class="modal-header">
											<h3>Add Certification</h3>
										</div>
										<form id="addCertificationForm" method="post" action="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/createCertifications" enctype="multipart/form-data">
											<div class="form-group">
												<input type="text" id="certification_name" name="certification_name" placeholder="Certification Name" required>
											</div>
											<div class="form-group">
												<input type="text" id="certification_title" name="certification_title" placeholder="Certification Title" required>
											</div>
											<div class="form-group">
												<select id="add_year_received" name="year_received">
													<option value="" disabled selected>Year Received</option>
												</select>
											</div>
											<div class="form-group">
												<input type="date" id="add_certification_expiration_date" name="expiration_date" required>
											</div>
											<div class="form-group">
												<div class="attachment-container">
													<label for="certification_attachment" class="attachment-button">
														<img src="https://cdn-icons-png.flaticon.com/512/54/54719.png" alt="">
														Attach PDF
													</label>
													<input type="file" id="certification_attachment" name="certification_attachment" accept=".pdf" hidden>
													<div id="certification_attachment_preview" class="attachment-preview"></div>
												</div>
											</div>

											<button type="submit" class="btn">Save & Confirm</button>

											<div class="close-text" id="closeAddCertificationBtn">
												<h6 class="back-step">Cancel</h6>
											</div>
										</form>
									</div>
								</div>

								<!-- Edit Certification Modal -->
								<div id="editCertificationModal" class="modal">
									<div class="modal-content">
										<div class="modal-header">
											<h3>Edit Certification</h3>
										</div>
										<form id="editCertificationForm" method="post" action="" enctype="multipart/form-data">
											<div class="form-group">
												<input type="text" id="edit_certification_name" name="certification_name" placeholder="Certification Name" required>
											</div>
											<div class="form-group">
												<input type="text" id="edit_certification_title" name="certification_title" placeholder="Certification Title" required>
											</div>
											<div class="form-group">
												<select id="edit_year_received" name="year_received">
													<option value="" disabled selected>Year Received</option>
												</select>
											</div>
											<div class="form-group">
												<input type="date" id="edit_certification_expiration_date" name="expiration_date" required>
											</div>
											<div class="form-group">
												<div class="attachment-container">
													<label for="certification_attachment_edit" class="attachment-button">
														<img src="https://cdn-icons-png.flaticon.com/512/54/54719.png" alt="">
														Attach PDF
													</label>
													<input type="file" id="certification_attachment_edit" name="certification_attachment" accept=".pdf" hidden>
													<div id="certification_attachment_preview_edit" class="attachment-preview"></div>
												</div>
											</div>

											<button type="submit" class="btn">Save & Confirm</button>

											<div class="close-text" id="closeEditCertificationBtn">
												<h6 class="back-step">Cancel</h6>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div id="container">    
								<table class="table" id="CertificationList" name="CertificationList">
									<thead>
										<tr>
											<th>#</th>
											<th>Name of Organization/Company</th>
											<th>Certification Title</th>
											<th>Year Received</th>
											<th>Expiration Date</th>
											<th>Copy of Certificate</th>
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
    </div>
</div>

	<script>
	$(document).ready(function() {
			fetchQualifications();
			fetchExperience();
			fetchCertification();
		});

	function fetchQualifications() {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/getQualifications',  // Update the URL as necessary
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				console.log('AJAX success (Qualifications):', result);
				if (Array.isArray(result)) {
					createQualificationsTable(result, 0);  // Call the function to create the table and pass the result
				} else {
					console.error('Expected an array but received:', result);
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching qualifications:', error);
			}
		});
	}

	function createQualificationsTable(result, sno) {
		sno = Number(sno);
		$('#QualificationsList tbody').empty(); // Clear existing rows
		for (let index in result) {
			let id = result[index].id;
			let academic_degree = result[index].academic_degree;
			let institution = result[index].institution;
			let year_graduated = result[index].year_graduated;
			let qualification_attachment = result[index].qualification_attachment;

			sno += 1;

			let tr = "<tr>";
			tr += "<td>" + sno + "</td>"; // Serial number
			tr += "<td>" + academic_degree + "</td>";
			tr += "<td>" + institution + "</td>";
			tr += "<td>" + year_graduated + "</td>";
			tr += "<td>" + qualification_attachment + "</td>";
			tr +=
				"<td><a href='#' onclick='fetchQualificationsById(" +
				id +
				")'>" +
				"<div class='table-icon-container'>" +
				"<div><img class='img' src='" +
				"<?php echo base_url('assets/images/icon/edit.svg'); ?>" +
				"' /></div>" +
				"<div><a href='http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/deleteQualifications/" +
				id +
				"'>" +
				"<img class='img' src='" +
				"<?php echo base_url('assets/images/icon/x.svg'); ?>" +
				"' /></a></div>" +
				"</div></td>";

			tr += "</tr>";

			$('#QualificationsList tbody').append(tr); // Append the new row to the table body
		}
	}

	let currentBackupId = null;

	// Function to fetch course data via AJAX
	function fetchQualificationsById(qualificationsId) {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/getQualificationsByID/' + qualificationsId,
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				if (result && !result.error) {
					currentBackupId = qualificationsId;
					populateEditQualificationsModal(result); // Populate the modal with the fetched data
				} else {
					console.error('Error: ' + (result.error || 'Qualification not found!'));
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching qualification by ID:', error);
			}
		});
	}

	function deleteBackup() {
		if (currentBackupId) {
			$.ajax({
				url: 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/deleteBackup/' + currentBackupId,
				type: 'POST',
				dataType: 'json',
				success: function (response) {
					if (response.success) {
						console.log('Backup qualification deleted successfully.');
					} else {
						console.error('Error: ' + (response.error || 'Failed to delete backup qualification.'));
					}
				},
				error: function (xhr, status, error) {
					console.error('Error deleting backup qualification:', error);
				}
			});
			currentBackupId = null; // Reset the backup ID
		}
	}

	function populateEditQualificationsModal(qualification) {
		console.log("Populating modal with qualification:", qualification);

		// Populate the year graduated dropdown
		fetchYearsInYearGraduated('editQualificationsModal', function() {
			$('#edit_year_graduated').val(qualification.year_graduated);
			console.log(`Set selected year: ${qualification.year_graduated}`);
		});

		// Populate other fields
		$('#editQualificationsModal #academic_degree').val(qualification.academic_degree);
		$('#editQualificationsModal #institution').val(qualification.institution);

		// Handle file preview
		const attachmentPreview = $('#qualification_attachment_preview_edit');
		if (qualification.qualification_attachment) {
			attachmentPreview.html(`<a href="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/ViewQualificationPDF/${qualification.id}" target="_blank">View Existing Diploma</a>`);
		} else {
			attachmentPreview.html("");
		}

		// Leave the attachment input field empty for new uploads
		$('#editQualificationsModal #qualification_attachment_edit').val('');

		// Set form action URL for updating qualifications
		$('#editQualificationsForm').attr(
			'action',
			'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/updateQualifications/' + qualification.id
		);

		// Show the modal
		$('#editQualificationsModal').modal('show');
	}

	// Close modal when clicking outside of it (on the backdrop)
	window.addEventListener("click", function (event) {
		if (event.target === document.getElementById('editQualificationsModal')) {
			$('#editQualificationsModal').hide();
			deleteBackup();
		}

		if (event.target === document.getElementById('editExperienceModal')) {
			$('#editExperienceModal').hide();
		}

		if (event.target === document.getElementById('editCertificationModal')) {
			$('#editCertificationModal').hide();
		}
	});

	// Attach event listener to "Cancel" button inside the Edit Course Modal
	$('#closeEditQualificationsBtn').on('click', function () {
		$('#editQualificationsModal').hide();
		deleteBackup();
	});

	$('#closeEditExperienceBtn').on('click', function () {
		$('#editExperienceModal').hide();
	});

	$('#closeEditCertificationBtn').on('click', function () {
		$('#editCertificationModal').hide();
	});


	function fetchExperience() {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/getExperience',  // Update the URL as necessary
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				console.log('AJAX success (Experience):', result);
				if (Array.isArray(result)) {
					createExperienceTable(result, 0);  // Call the function to create the table and pass the result
				} else {
					console.error('Expected an array but received:', result);
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching experience:', error);
			}
		});
	}

	function createExperienceTable(result, sno) {
		sno = Number(sno);
		$('#ExperienceList tbody').empty(); // Clear existing rows
		for (index in result) {
			var id = result[index].id;
			var company_name = result[index].company_name;
			var job_position = result[index].job_position;
			var years_of_experience = result[index].years_of_experience;

			sno += 1;

			var tr = "<tr>";
			tr += "<td>" + sno + "</td>";  // Serial number
			tr += "<td>" + company_name + "</td>";
			tr += "<td>" + job_position + "</td>";
			tr += "<td>" + years_of_experience + "</td>";
			tr += "<td><a href='#' onclick='fetchExperienceById(" + id + ")'>" +
					"<div class='table-icon-container'>" +
						"<div><img class='img' src='" + "<?php echo base_url('assets/images/icon/edit.svg'); ?>" + "' /></div>" +
						"<div><a href='http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/deleteExperience/" + id + "'>" +
							"<img class='img' src='" + "<?php echo base_url('assets/images/icon/x.svg'); ?>" + "' /></a></div>" +
					"</div></td>";
					
			tr += "</tr>";

			$('#ExperienceList tbody').append(tr);  // Append the new row to the table body
		}
	}

	// Function to fetch course data via AJAX
	function fetchExperienceById(experienceId) {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/getExperienceByID/' + experienceId,
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				if (result && !result.error) {
					populateEditExperienceModal(result); // Populate the modal with the fetched data
				} else {
					console.error('Error: ' + (result.error || 'Experience not found!'));
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching experience by ID:', error);
			}
		});
	}
	
	function populateEditExperienceModal(experience) {
		console.log("Populating modal with experience:", experience);

		// Populate the year graduated dropdown
		fetchYearsInExperience('editExperienceModal', function() {
			// Set the selected value after populating the dropdown
			$('#edit_years_of_experience').val(experience.years_of_experience);
			console.log(`Set selected year: ${experience.years_of_experience}`);
		});

		// Populate other fields
		$('#editExperienceModal #company_name').val(experience.company_name);
		$('#editExperienceModal #job_position').val(experience.job_position);

		// Set form action URL
		$('#editExperienceForm').attr(
			'action',
			'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/updateExperience/' + experience.id
		);

		$('#editExperienceModal').show();
	}

	function fetchCertification() {
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/getCertifications',  // Update the URL as necessary
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				console.log('AJAX success (Certification):', result);
				if (Array.isArray(result)) {
					createCertificationTable(result, 0);  // Call the function to create the table and pass the result
				} else {
					console.error('Expected an array but received:', result);
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching certification:', error);
			}
		});
	}

	function createCertificationTable(result, sno) {
		sno = Number(sno);
		$('#CertificationList tbody').empty(); // Clear existing rows
		for (index in result) {
			var id = result[index].id;
			var certification_name = result[index].certification_name;
			var certification_title = result[index].certification_title;
			var year_received = result[index].year_received;
			var expiration_date = result[index].expiration_date;
			var certification_attachment = result[index].certification_attachment;

			sno += 1;

			var tr = "<tr>";
			tr += "<td>" + sno + "</td>";  // Serial number
			tr += "<td>" + certification_name + "</td>";
			tr += "<td>" + certification_title + "</td>";
			tr += "<td>" + year_received + "</td>";
			tr += "<td>" + expiration_date + "</td>";
			tr += "<td>" + certification_attachment + "</td>";
			tr += "<td><a href='#' onclick='fetchCertificationById(" + id + ")'>" +
					"<div class='table-icon-container'>" +
						"<div><img class='img' src='" + "<?php echo base_url('assets/images/icon/edit.svg'); ?>" + "' /></div>" +
						"<div><a href='http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/deleteCertification/" + id + "'>" +
							"<img class='img' src='" + "<?php echo base_url('assets/images/icon/x.svg'); ?>" + "' /></a></div>" +
					"</div></td>";				
			tr += "</tr>";

			$('#CertificationList tbody').append(tr);  // Append the new row to the table body
		}
	}

	function fetchCertificationById(certificationId){
		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/getCertificationsByID/' + certificationId,
			type: 'GET',
			dataType: 'json',
			success: function(result) {
				if (result && !result.error) {
					populateEditCertificationModal(result); // Populate the modal with the fetched data
				} else {
					console.error('Error: ' + (result.error || 'Certification not found!'));
				}
			},
			error: function(xhr, status, error) {
				console.error('Error fetching certification by ID:', error);
			}
		});
	}


	function populateEditCertificationModal(certification) {
		console.log("Populating modal with certification:", certification);

		// Populate the year graduated and expiration date dropdowns
		 fetchYearOfCertification('editCertificationModal', function() {
			$('#edit_year_received').val(certification.year_received);
			console.log(`Set selected year: ${certification.year_received}`);
		});

		// Populate the form fields with the certification data
		$('#editCertificationModal #edit_certification_name').val(certification.certification_name);
		$('#editCertificationModal #edit_certification_title').val(certification.certification_title);
		$('#editCertificationModal #edit_certification_expiration_date').val(certification.expiration_date);
		
		// Handle file preview
		const attachmentPreview = $('#certification_attachment_preview_edit');
		if (certification.certification_attachment) {
			attachmentPreview.html(`<a href="http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/ViewCertificationPDF/${certification.id}" target="_blank">View Existing PDF</a>`);
		} else {
			attachmentPreview.html("");
		}

		// Leave the attachment input field empty for new uploads
		$('#editCertificationModal #certification_attachment_edit').val('');

		// Set form action URL for updating certification
		$('#editCertificationForm').attr(
			'action',
			'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/updateCertification/' + certification.id
		);

		// Show the modal
		$('#editCertificationModal').modal('show');
	}

	$(window).on('click', function (event) {
		if ($(event.target).is('#editQualificationsModal')) {
			closeModal('editQualificationsModal');
		}
	});

	$(window).on('click', function (event) {
		if ($(event.target).is('#editCertificationModal')) {
			closeModal('editCertificationModal');
		}
	});

	$(document).on('click', '#closeEditQualificationsBtn', function () {
		closeModal('editQualificationsModal');
	});

	$(document).on('click', '#closeEditCertificationBtn', function () { 
		closeModal('editCertificationModal');
	});


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

		// Close modal when clicking outside
		window.addEventListener("click", function (event) {
			if (event.target === modal) {
				modal.style.display = "none";
			}
		});
	}

	// Initialize "Add Qualifications" modal
	setupModal("addQualificationsModal", "addQualificationsBtn", "closeaddQualificationsBtn");

	// Initialize "Add Experience" modal
	setupModal("addExperienceModal", "addExperienceBtn", "closeaddExperienceBtn");

	// Initialize "Add Certifications" modal
    setupModal("addCertificationModal", "addCertificationBtn", "closeAddCertificationBtn");

	// Initialize "Add Profile" modal
    setupModal("editProfilePictureModal", "editProfilePictureBtn", "closeEditProfilePictureBtn");

	// Initialize "Add Cover Photo" modal
    setupModal("editCoverPhotoModal", "editCoverPhotoBtn", "closeeditCoverPhotoBtn");

	function fetchYearsInYearGraduated(modalId, callback) {
		const currentYear = new Date().getFullYear();
		const selectElement = modalId === 'addQualificationsModal'
			? $('#add_year_graduated') 
			: $('#edit_year_graduated');

		if (selectElement.length === 0) {
			console.error('Dropdown element not found for modal:', modalId);
			return;
		}

		// Clear existing options and add a default placeholder
		selectElement.empty();
		selectElement.append('<option value="" disabled selected>Year Graduated</option>');

		// Populate the dropdown with years from 1950 to the current year
		for (let i = currentYear; i >= 1950; i--) {
			selectElement.append('<option value="' + i + '">' + i + '</option>');
		}

		// Execute the callback if provided
		if (callback && typeof callback === 'function') {
			callback();
		}
	}

	function fetchYearsInExperience(modalId, callback) {
		const currentYear = new Date().getFullYear();
		const selectElement = modalId === 'addExperienceModal'
			? $('#add_years_of_experience') 
			: $('#edit_years_of_experience');

		if (selectElement.length === 0) {
			console.error('Dropdown element not found for modal:', modalId);
			return;
		}

		// Clear existing options and add a default placeholder
		selectElement.empty();
		selectElement.append('<option value="" disabled selected>Years of Experience</option>');

		// Populate the dropdown with years from 1950 to the current year
		for (let i = 0; i <= 50  ; i++) {
			selectElement.append('<option value="' + i + '">' + i + '</option>');
		}

		// Execute the callback if provided
		if (callback && typeof callback === 'function') {
			callback();
		}
	}

	function fetchYearOfCertification(modalId, callback) {
		const currentYear = new Date().getFullYear();
		const selectElement = modalId === 'addCertificationModal'
			? $('#add_year_received')
			: $('#edit_year_received');

		if (selectElement.length === 0) {
			console.error('Dropdown element not found for modal:', modalId);
			return;
		}

		// Clear existing options and add a default placeholder
		selectElement.empty();
		selectElement.append('<option value="" disabled selected>Year Received</option>');

		// Populate the dropdown with years from 2000 to the current year
		for (let i = currentYear; i >= 2000; i--) {
			selectElement.append('<option value="' + i + '">' + i + '</option>');
		}

		// Execute the callback if provided
		if (callback && typeof callback === 'function') {
			callback();
		}
	}

	$('#addQualificationsBtn').on('click', function() {
			fetchYearsInYearGraduated('addQualificationsModal');
		$('#addQualificationsModal').show();
	});

	$('#addExperienceBtn').on('click', function() {
			fetchYearsInExperience('addExperienceModal');
		$('#addExperienceModal').show();
	});

	$('#addCertificationBtn').on('click', function() {
		fetchYearOfCertification('addCertificationModal');
		$('#addCertificationModal').show();
	});

	$('#addCertificationBtn').on('click', function() {
		fetchExpirationDate('addCertificationModal');
		$('#addCertificationModal').show();
	});		

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

	setupFileAttachment("certification_attachment", "certification_attachment_preview", false);

	setupFileAttachment("certification_attachment_edit", "certification_attachment_preview_edit", false);

	setupFileAttachment("qualification_attachment", "qualification_attachment_preview", false);

	setupFileAttachment("qualification_attachment_edit", "qualification_attachment_preview_edit", false);

	// Call setupFileAttachment for 'announcement_attachment' if required
	setupFileAttachment("announcement_attachment", "announcement_attachment_preview", true);

	document.getElementById('profile_pic_change').addEventListener('change', function (event) {
		const file = event.target.files[0]; // Get the selected file
		if (file) {
			const reader = new FileReader(); // Create a FileReader to read the file

			// Load the file and update the preview images
			reader.onload = function (e) {
				const preview184 = document.getElementById('preview_184');
				const preview64 = document.getElementById('preview_64');
				const preview32 = document.getElementById('preview_32');

				// Update the src of preview images
				preview184.src = e.target.result;
				preview64.src = e.target.result;
				preview32.src = e.target.result;
			};

			reader.readAsDataURL(file); // Read the file as a data URL
		}
	});

	document.getElementById('cover_photo_change').addEventListener('change', function (event) {
		const file = event.target.files[0]; // Get the selected file
		if (file) {
			const reader = new FileReader(); // Create a FileReader to read the file

			// Load the file and update the preview images
			reader.onload = function (e) {
				const preview184 = document.getElementById('preview_184_cover');
				const preview64 = document.getElementById('preview_64_cover');
				const preview32 = document.getElementById('preview_32_cover');

				// Update the src of preview images
				preview184.src = e.target.result;
				preview64.src = e.target.result;
				preview32.src = e.target.result;
			};

			reader.readAsDataURL(file); // Read the file as a data URL
		}
	});


	$(document).on('submit', '#editProfilePictureForm', function (e) {
		e.preventDefault();

		let formData = new FormData(this);

		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/changeProfilePic',
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function (response) {
				if (response.status === 'success') {
					$('#profilePicture').attr('src', response.profile_picture);			
					$('#editProfilePictureModal').hide();
				} else {
					alert('Error: ' + response.message);
				}
			},
			error: function () {
				alert('An unexpected error occurred.');
			},
		});
	});

	$(document).on('submit', '#editCoverPhotoForm', function (e) {
		e.preventDefault();

		let formData = new FormData(this);

		$.ajax({
			url: 'http://localhost/GitHub/facultyportal/index.php/faculty_controllers/Profile/changeCoverPhoto',
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function (response) {
				if (response.status === 'success') {
					$('#coverPhoto').attr('src', response.cover_photo);			
					$('#editCoverPhotoModal').hide();
				} else {
					alert('Error: ' + response.message);
				}
			},
			error: function () {
				alert('An unexpected error occurred.');
			},
		});
	});

	</script>
	<script src="<?php echo base_url('assets/js/faculty.js?v=' . time()); ?>"></script>
	<script src="<?php echo base_url('assets/js/notification.js?v=' . time()); ?>"></script>
	<script src="<?php echo base_url('assets/js/script.js'); ?>"></script>



  </body>
</html>