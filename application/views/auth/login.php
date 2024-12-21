<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login | San Beda University</title>
	<link rel="icon" href="<?php echo base_url('assets/images/logo/sbu_logo.svg'); ?>" type="image/x-icon">
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/style.css?<?php echo time(); ?>"> 

</head>
<body>

<div class="main-container login-page">

	<div class="logo-container">
		<img src="<?php echo base_url('assets/images/logo/sbu_logo.svg'); ?>" alt="">
	</div>

	<div class="login-card-container">
		<div class="login-card">
			<div class="login-heading-container">
				<h3>Login</h3>
			</div>
			<form action="http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/procLogin" method="post">
				<div class="form-container">
					<div class="input-container">
						<input type="email" id="email" name="email" placeholder="Email">
					</div>
					<div class="input-container">
						<input type="password" id="pass" name="pass" placeholder="Password">
					</div>
				</div>

				<div class="button-container">
					<input type="submit" value="Login">

					<a href="">
						<div class="forgot-password-container">
							<h6>Forgot Password?</h6>
						</div>
					</a>
				</div>	
			</form>
		</div>
	</div>

</div>

</body>
</html>
