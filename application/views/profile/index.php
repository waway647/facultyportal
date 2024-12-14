<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/style.css?<?php echo time(); ?>"> 

</head>
<body>

<div class="page-container">
	<div class="main-container">
		<!-- navigation bar -->
		<div class="nav-container">
			<!-- role switch button -->
			<a href="">
				<div class="role-container">
					<div class="role-content">
						<!-- role image -->
						<img src="" alt="">
						
						<div class="role-headings">
							<h4>Role</h4>
							<h3><?php echo $this->session->userdata('logged_role'); ?></h3>
						</div>

						<!-- switch icon -->
						<img src="" alt="">
					</div>
				</div>
			</a>
			

			<!-- Post Announcement Button -->
			<button class="nav-post">Post Announcement</button>

			<!-- Navigation Search Bar -->
			<div class="nav-search-container">
				<!-- search icon -->
				<img src="" alt="">

				<!-- search form -->
				<form action="">
					<input type="text" placeholder="Search" name="search">
				</form>
			</div>

			<!-- Navigation Links -->
			<div class="nav-links-container">
				<a href="http://localhost/GitHub/facultyportal/index.php/common_controllers/Dashboard/index">
					<div class="nav-link">
						<!-- navlink icon -->
						<img src="" alt="">
						<h4>Dashboard</h4>
					</div>
				</a>
				<a href="">
					<div class="nav-link">
						<!-- navlink icon -->
						<img src="" alt="">
						<h4>Faculty Management</h4>
					</div>
				</a>
				<a href="">
					<div class="nav-link">
						<!-- navlink icon -->
						<img src="" alt="">
						<h4>Course Management</h4>
					</div>
				</a>
				<a href="">
					<div class="nav-link">
						<!-- navlink icon -->
						<img src="" alt="">
						<h4>Consultations</h4>
					</div>
				</a>
				<a href="">
					<div class="nav-link">
						<!-- navlink icon -->
						<img src="" alt="">
						<h4>Reports & Analytics</h4>
					</div>
				</a>
				<a href="">
					<div class="nav-link">
						<!-- navlink icon -->
						<img src="" alt="">
						<h4>User Management</h4>
					</div>
				</a>
				<a href="">
					<div class="nav-link">
						<!-- navlink icon -->
						<img src="" alt="">
						<h4>System Settings</h4>
					</div>
				</a>
				<a href="">
					<div class="nav-link">
						<!-- navlink icon -->
						<img src="" alt="">
						<h4>Help Center</h4>
					</div>
				</a>
				
				<!-- navlink separator -->
				<div class="nav-link-separator"></div>

				<!-- notifications nav link -->
				<a href="">
					<div class="nav-link">
						<!-- navlink icon -->
						<img src="" alt="">
						<h4>Notifications</h4>
					</div>
				</a>
			</div>

			<!-- Navigation Profile -->
			<a href="">
				<div class="nav-profile-container">
					<!-- navigation profile img -->
					<img src="" alt="">

					<div class="nav-profile-headings">
						<h3><?php echo $this->session->userdata('logged_first_name'); ?> <?php echo $this->session->userdata('logged_last_name'); ?></h3>
						<h4><?php echo $this->session->userdata('logged_email'); ?></h4>
					</div>
				</div>
			</a>
	
			<div class="version-container">
				<h4>v1.0.1</h4>
			</div>
		</div>
		
		<!-- content section (rightside) -->
		<div class="content-container">
			<div class="profile-container">
				<form action="http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/procLogin" method="post">
					<div class="input-container">
						<label for="email">Email address:</label>
						<input type="email" id="email" name="email">
					</div>
					<div class="input-container">
						<label for="pass">Password:</label>
						<input type="password" id="pass" name="pass">
					</div>
					<div class="input-container">
						<label for="mobile_number">Mobile number:</label>
						<input type="text" id="mobile_number" name="mobile_number">
					</div>
					<div class="input-container">
						<label for="first_name">First name:</label>
						<input type="text" id="first_name" name="first_name">
					</div>
					<div class="input-container">
						<label for="middle_name">Middle name:</label>
						<input type="text" id="middle_name" name="middle_name">
					</div>
					<div class="input-container">
						<label for="last_name">Last name:</label>
						<input type="text" id="last_name" name="last_name">
					</div>
					<div class="input-container">
						<label for="birthday">Birthday:</label>
						<input type="text" id="birthday" name="birthday">
					</div>
					<input type="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>
</div>

</body>
</html>
