<?php 
	require 'header.php';
	require 'includes/handlers/settings_handler.php';
	require 'includes/form_handler/invite_handler.php';


?>
<br><a href="settings.php">Settings Page</a><br>
<?php 
	$firstName = $user['first_name'];
	$lastName = $user['last_name'];
	$email = $user['email'];
	$city = $user['city'];
	if($user['details_asked'] == 'no'){
		echo "<h1>Please update your details</h1>
	<i>You can also update the details later in the Settings Page</i>";
		$profilePicPath = $user['profile_pic'];
		echo "<img src='$profilePicPath' >";

	echo "<br>
	 <a href=\"#\">Upload new display pic</a><br>
	 <h2>Account Settings:</h2>
	 <h3>Profile Details</h3>
	<form method=\"POST\" action=\"index.php\">
		<div>
			<h4>First Name:</h4>
			<input type=\"text\" name=\"first_name_f\" value='$firstName'>
		</div>
		<div>
			<h4>Last Name:</h4>
			<input type=\"text\" name=\"last_name_f\" value='$lastName'>
		</div>
		<div>
			<h4>Email:</h4>
			<input type=\"email\" name=\"em_f\" value='$email'>
		</div>
		<div>
			<h4>Your Birthday:</h4>
			<input type=\"date\" name=\"dob_f\">
		</div>
		<div>
			<h4>Your city:</h4>
			<input type=\"text\" name=\"city_f\" value='$city'>
		</div>
		<br>";
		echo $message;
		echo "<input type=\"submit\" name=\"update_details_firstform\" value=\"Enter Details\">
		<input type=\"submit\" name=\"ask_later\" value=\"Ask Later\">
	</form>

		";
	}
	else{
		echo "<h2>Hey there! "; echo $firstName." ".$lastName; 
	 	echo "</h2>
	 	<h3>Here are your details:</h3>
	 	<i>The details can be changed at any time, by visiting the settings page..</i><br><br>
	 	<h3>Your e-mail: "; 
	 	echo $email; 
	 	echo"</h3>
	 	<h3>Your City: "; 
	 	echo $city;
	 	echo "</h3>";
	 	$numRowsInvite = 0;
	 	if ($userLoggedIn == '2') {
	 		echo"<a href=\"1\">Click here to visit the dashboard of User-1</a><br>";
	 		$inviteStatusQuery = mysqli_query($con, "SELECT * FROM invite WHERE user_to='2' and ignored='no' and accepted='no'");
	 		if ($inviteStatusQuery)
		 		$numRowsInvite = mysqli_num_rows($inviteStatusQuery);
		 	if ($numRowsInvite != 0) {
		 		$inviteRow = mysqli_fetch_array($inviteStatusQuery);
		 		echo "You've received a request from User".$inviteRow['user_from'];
		 		//form to accept or reject invitation
		 		echo "
		 		<form method=\"POST\" action=\"index.php\">
					<input type=\"submit\" name=\"invite_accept\" value=\"Accept\">
					<input type=\"submit\" name=\"invite_reject\" value=\"Deny Invitation\">
				</form>
		 		";

		 	}
	 	}
	 	elseif ($userLoggedIn == '1') {
	 		//Code to send invitation and see response
	 		$inviteStatusQuery = mysqli_query($con, "SELECT * FROM invite WHERE user_from='1' and user_to='2'");
	 		if ($inviteStatusQuery)
	 			$numRowsInvite = mysqli_num_rows($inviteStatusQuery);
	 		if ($numRowsInvite != 0){
	 			$inviteRow = mysqli_fetch_array($inviteStatusQuery);
	 			if ($inviteRow['ignored'] == 'no') {
	 				if ($inviteRow['accepted'] == 'yes')
	 					echo "User-2 has accepted your invitation.";
	 				else
	 					echo "Your request has been sent, kindly wait for User-2's response.";
	 			}
	 			else
	 				echo "Your invitation has been denied by User-2";
	 		}
	 		else{
	 			echo "
	 				<form method=\"POST\" action=\"index.php\">
					 	<h4>Send an invitation to User-2</h4>
					 	<input type=\"submit\" name=\"invite_create\" value=\"Invite\">
					 </form>
	 			";
	 		}
	 	}
	 	
	}
 ?>
</body>
</html>