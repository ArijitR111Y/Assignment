<?php 

	if (isset($_POST['invite_accept'])) {
		$inviteAcceptQuery = mysqli_query($con, "UPDATE invite SET accepted='yes' where user_to='$userLoggedIn' and user_from = '1'");
		header('Location: index.php');
	}

	if (isset($_POST['invite_reject'])) {
		$inviteAcceptQuery = mysqli_query($con, "UPDATE invite SET ignored='yes' where user_to='$userLoggedIn' and user_from = '1'");
		header('Location: index.php');
	}

	if (isset($_POST['invite_create'])) {
		$inviteAcceptQuery = mysqli_query($con, "INSERT INTO invite VALUES('1', '2', 'no', 'no')");
		header('Location: index.php');
	}
 ?>