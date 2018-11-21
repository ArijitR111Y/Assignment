<?php 
	require 'config/config.php';
	if (isset($_SESSION['user_id'])) {
		$userLoggedIn = $_SESSION['user_id'];
		$userDetailsQuery = mysqli_query($con, "SELECT * FROM user where user_id=$userLoggedIn");
		if (!$userDetailsQuery){
	    	printf("Error: %s\n", mysqli_error($con));
	    	exit();
		}
		$user = mysqli_fetch_array($userDetailsQuery);
	}
	else{
		header("Location: login.php");
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
</head>
<body>
	<?php 
	echo "<h1>User$userLoggedIn has logged in</h1>";
	 ?>
	<a href="includes/handlers/logout.php">Click here to logout!;)</a>