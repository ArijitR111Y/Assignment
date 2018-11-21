<?php 
	ob_start(); 
	//session_start(); 
	if(!isset($_SESSION)){ 
	        session_start(); 
	    }
	//connecting to database "network"
	$con=mysqli_connect("localhost","root","","network");
	//Error handling
	if(mysqli_connect_errno())
	{
		echo "fail to connect".mysqli_connect_errno();
	}
 ?>