<?php 
	if (isset($_POST['log_button'])) {
		$id = $_POST['log_user_id'];
		$password = $_POST['log_password'];
		$check_user_query = mysqli_query($con, "SELECT * FROM user where user_id=$id and password='$password'");
		$num = mysqli_num_rows($check_user_query);

		if ($num == 1) {
			$row = mysqli_fetch_array($check_user_query);
			$user_id = $row['user_id'];
			$_SESSION['user_id'] = $user_id;
			header("Location: index.php");
		}
		// else{
		// 	echo "No such user found";
		// }
	}
 ?>