<?php 
	require 'config/config.php';
	require 'includes/form_handler/login_handler.php';

	if (isset($_SESSION['user_id'])) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
</head>
<body>
	<div class="heading">
		<h1>User Login</h1>
		<p>For user1 and user2</p>
	</div>
	<div class="login" id="login">
		<form action="login.php" method="POST">
			<div>
				<input type="number" name="log_user_id" min="1" max="2" placeholder="Enter the userId number" style="width: 175px;" required>
			</div>
			<div>
				<input type="password" name="log_password" placeholder="Enter your password" required><br>
				<i>The default password is set to root followed by the user_id without any spaces in between.</i><br>
				<i>However, by logging in using the default password after the first time, the user will be able to change his/her password.</i>
			</div>
			<br>
			<div>
				<input type="submit" name="log_button" value="Click here to Login">
			</div>
		</form>
	</div>
</body>
</html>

