<?php
	require("database.php");
	session_start();// Starting Session
	// Storing Session
	$user_check=$_SESSION['login_user'];
	// SQL Query To Fetch Complete Information Of User
	$sql="SELECT * FROM useraccount WHERE email='".$user_check."'";
	$res = odbc_exec($conn,$sql);
	$row = odbc_fetch_array($res);
	$login_session = $row['email'];

	$fullname = $row['firstname']." ".$row['lastname'];

	if(!isset($login_session)){
		odbc_close($connection); // Closing Connection
		header('Location: index.php'); // Redirecting To Home Page
	}
?>