<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

</head>
<body>

<div class="main-container">

	<div class="loginform-container">
		<div class="login-content">
			<form action="http://localhost/GitHub/facultyportal/index.php/common_controllers/Auth/procLogin" method="post">
				<div class="input-container">
					<label for="email">Email address:</label>
					<input type="text" id="email" name="email">
				</div>
				<div class="input-container">
					<label for="pass">Password:</label>
					<input type="password" id="pass" name="pass">
				</div>
				<input type="submit" value="Submit">
			</form>
		</div>
	</div>

</div>

</body>
</html>
