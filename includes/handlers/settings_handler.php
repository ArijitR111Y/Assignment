<?php 
	if(isset($_POST['update_details_firstform'])) {

		$first_name = $_POST['first_name_f'];
		$last_name = $_POST['last_name_f'];
		$email = $_POST['em_f'];
		$dob = $_POST['dob_f'];
		$city = $_POST['city_f'];

		$email_check = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");
		$row = mysqli_fetch_array($email_check);
		$matched_user = $row['user_id'];

		if($matched_user == "") {
			$message = "Details updated!<br><br>";

			$query = mysqli_query($con, "UPDATE user SET first_name='$first_name', last_name='$last_name', email='$email', dob='$dob', city='$city', details_asked='yes' WHERE user_id='$userLoggedIn'");
			header('Location: index.php');
		}
		else 
			$message = "That email is already in use!<br><br>";
	}
	elseif (isset($_POST['update_details'])) {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['em'];
		$city = $_POST['city'];

		$email_check = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");
		$row = mysqli_fetch_array($email_check);
		$matched_user = $row['user_id'];

		if($matched_user == "" || $matched_user == $userLoggedIn) {
			$message = "Details updated!<br><br>";

			$query = mysqli_query($con, "UPDATE user SET first_name='$first_name', last_name='$last_name', email='$email', city='$city', details_asked='yes' WHERE user_id='$userLoggedIn'");
			header('Location: index.php');
		}
		else 
			$message = "That email is already in use!<br><br>";	
	}
	else 
		$message = "";

	if (isset($_POST['update_password'])) {
		$old_password = $_POST['old_password'];
		$new_password_1 = $_POST['new_password_1'];
		$new_password_2 = $_POST['new_password_2'];

		$password_query = mysqli_query($con, "SELECT password FROM user WHERE user_id='$userLoggedIn'");
		$row = mysqli_fetch_array($password_query);
		$db_password = $row['password'];
		if($old_password == $db_password) {
			if($new_password_1 == $new_password_2) {
				$new_password = $new_password_1;
				$password_query = mysqli_query($con, "UPDATE user SET password='$new_password' WHERE user_id='$userLoggedIn'");
				$password_message = "Password has been changed!<br><br>";
			}
			else {
				$password_message = "Your two new passwords need to match!<br><br>";
			}
		}
	}
	else
		$password_message = "";

	if (isset($_POST['ask_later'])) {
		$query = mysqli_query($con, "UPDATE user SET details_asked='yes' WHERE user_id='$userLoggedIn'");
		header('Location: index.php');		
	}
 ?>