<?php 
	require 'header.php';
	require 'includes/handlers/settings_handler.php';

	$firstName = $user['first_name'];
	$lastName = $user['last_name'];
	$email = $user['email'];
	$city = $user['city'];

?>
	<!-- <h1>Please update your details</h1>
	<i>You can also update the details later in the Settings Page</i>
	
	<?php  
		$profilePicPath = $user['profile_pic'];
		echo "<img src='$profilePicPath' >"
	?>;
	<br>
	<a href="#">Upload new display pic</a><br>
 -->
 	<br><a href="index.php">User Dashboard</a><br>	
 	<h2>Account Settings:</h2>
	<h3>Profile Details</h3>
	<form method="POST" action="settings.php">
		<div>
			<h4>First Name:</h4>
			<input type="text" name="first_name" value='<?php echo $firstName; ?>'>
		</div>
		<div>
			<h4>Last Name:</h4>
			<input type="text" name="last_name" value='<?php echo $lastName; ?>'>
		</div>
		<div>
			<h4>Email:</h4>
			<input type="email" name="em" value='<?php echo $email; ?>'>
		</div>
		<div>
			<h4>Your city:</h4>
			<input type="text" name="city" value='<?php echo $city; ?>'>
		</div><br><br>
		<?php echo $message; ?>
		<input type="submit" name="update_details" value="Enter Details">
	</form><br><br>
	<h3>Change your password:</h3>
	<form method="POST" action="settings.php">
		<div>
			<h4>Old password:</h4>
			<input type="password" name="old_password" required>
		</div>
		<div>
			<h4>New password:</h4>
			<input type="password" name="new_password_1" required>
		</div>
		<div>
			<h4>Confirm New password:</h4>
			<input type="password" name="new_password_2" required>
		</div><br><br>
		<?php echo $password_message; ?>
		<input type="submit" name="update_password" value="Update Password">
	</form>

</body>
</html>