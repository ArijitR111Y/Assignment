<?php 
	require 'header.php';
 	
 	if (isset($_GET['other_user_id'])) {
 		$otherUserId = $_GET['other_user_id'];
 		if ($otherUserId == $userLoggedIn || $userLoggedIn == 1)
 			header("Location: index.php");
 		$user_details_query = mysqli_query($con, "SELECT * FROM user WHERE user_id='$otherUserId'");
 		$otherUser = mysqli_fetch_array($user_details_query); 	
 	}

 	$statusCheck = mysqli_query($con, "SELECT * FROM invite where user_from = '$otherUserId' and user_to = '$userLoggedIn' and accepted='no' and ignored ='no'");
 	$numRows = mysqli_num_rows($statusCheck);

 	if ($numRows == 0) {
 		$status = "Not sent yet!";
 	}
 	else{
 		$inviteRow = mysqli_fetch_array($statusCheck);
 		$status = $inviteRow['accepted'];
 	}
 ?>

 	<br><a href="index.php">User Dashboard</a><br>	
 	<h2>Welcome to User<?php echo $otherUserId; ?>'s Dashboard</h2>
 	<h3>Name of User<?php echo $otherUserId.": ".$otherUser['first_name']." ".$otherUser['last_name']; ?></h3>
 	<h3>Date of bith: <?php echo date($otherUser['dob']); ?></h3>
 	<h3>Email address: <?php echo $otherUser['email']; ?></h3>
 	<h3>City: <?php echo $otherUser['city']; ?></h3>
 	<h3>Invitation status: <?php echo $status; ?></h3>
 	<?php 
 		if ($status == 'no') {
 			echo "<i>If you wish to accept the request, go to your dashboard and click on the <strong>Accept</strong> button</i><br>";
 		}
 	 ?>
 </body>
 </html>