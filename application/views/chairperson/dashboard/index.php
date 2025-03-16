<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Faculty Portal | San Beda University</title>
	<link rel="icon" href="<?php echo base_url('assets/images/logo/sbu_logo.svg'); ?>" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/globals.css?<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css?<?php echo time(); ?>">

	<!-- jQuery library -->
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

</head>

<body>
	<div class="dashboard-faculty">
		<div class="nav-container">
			<div class="portal-logo">
				<div class="role-item">
					<div class="img-container"><img class="img"
							src="<?php echo base_url('assets/images/logo/sbu_logo.svg'); ?>" /></div>
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
								<div id="announcement_body" class="custom-textarea" contenteditable="true"
									placeholder="Write your announcement here..."></div>
								<div class="attachment-container">
									<label for="announcement_attachment" class="attachment-button">
										<img src="https://cdn-icons-png.flaticon.com/512/54/54719.png" alt="">
										Attach Files
									</label>
									<input type="file" id="announcement_attachment" name="announcement_attachment"
										accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" hidden>
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
					<div class="nav-link active">
						<div class="image-wrapper"><img class="img"
								src="<?php echo base_url('assets/images/icon/dash.svg'); ?>" /></div>
						<div class="frame-2">
							<div class="text-wrapper-4 highlight">Dashboard</div>
						</div>
					</div>
				</a>

				<a href="http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/index">
					<div class="nav-link">
						<div class="image-wrapper"><img class="img"
								src="<?php echo base_url('assets/images/icon/announce.svg'); ?>" /></div>
						<div class="frame-2">
							<div class="text-wrapper-4">Announcements</div>
						</div>
					</div>
				</a>

				<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Profile/index">
					<div class="nav-link">
						<div class="image-wrapper"><img class="img"
								src="<?php echo base_url('assets/images/icon/profile.svg'); ?>" /></div>
						<div class="frame-2">
							<div class="text-wrapper-4">Profile</div>
						</div>
					</div>
				</a>

				<a
					href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/FacultyManagement/index">
					<div class="nav-link">
						<div class="image-wrapper"><img class="img"
								src="<?php echo base_url('assets/images/icon/facultymanage.svg'); ?>" /></div>
						<div class="frame-2">
							<div class="text-wrapper-4">Faculty Management</div>
						</div>
					</div>
				</a>

				<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Courses/index">
					<div class="nav-link">
						<div class="image-wrapper"><img class="img"
								src="<?php echo base_url('assets/images/icon/course.svg'); ?>" /></div>
						<div class="frame-2">
							<div class="text-wrapper-4">Courses</div>
						</div>
					</div>
				</a>

				<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/ResearchOutputs/index">
					<div class="nav-link">
						<div class="image-wrapper"><img class="img"
								src="<?php echo base_url('assets/images/icon/research.svg'); ?>" /></div>
						<div class="frame-2">
							<div class="text-wrapper-4">Research Outputs</div>
						</div>
					</div>
				</a>

				<a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Consultations/index">
					<div class="nav-link">
						<div class="image-wrapper"><img class="img"
								src="<?php echo base_url('assets/images/icon/consult.svg'); ?>" /></div>
						<div class="frame-2">
							<div class="text-wrapper-4">Consultations</div>
						</div>
					</div>
				</a>
			</div>
			<div class="nav-links-container-2">
				<!-- Notification Button -->
				<a href="javascript:void(0);" id="notificationBtn">
					<div class="nav-link">
						<div class="image-wrapper"><img class="img"
								src="<?php echo base_url('assets/images/icon/notif.svg'); ?>" /></div>
						<div class="frame-2">
							<div class="text-wrapper-4">Notifications</div>
						</div>
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
								<img class="img-account"
									src="<?php echo base_url(!empty($faculty->profile_picture) ? $faculty->profile_picture : 'assets/images/profile/default_profile.png'); ?>"
									alt="Profile Picture">
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
					<div class="frame-4">
						<div class="text-wrapper-7">v1.0.1</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-content">
			<div class="main-content-2">
				<div class="heading-container">
					<div class="text-wrapper-8">Welcome, <?php echo $this->session->userdata('logged_id'); ?> Department
						Chair</div>
				</div>
				<div class="faculties-container-wrapper">
					<div class="faculties-container"></div>
				</div>
			</div>
		</div>
	</div>

	<script>

	</script>
	<script src="<?php echo base_url('assets/js/faculty.js?v=' . time()); ?>"></script>
	<script src="<?php echo base_url('assets/js/notification.js?v=' . time()); ?>"></script>


</body>

</html>