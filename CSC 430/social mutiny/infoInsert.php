<?php
	session_start();
	require_once("databaseLogin.php");
	$infoInsert = new DBconnector();	

	$userID=$_SESSION['userID'];
		
	$about=mysql_real_escape_string($_POST['about']);
	$movies=mysql_real_escape_string($_POST['movies']);
	$music=mysql_real_escape_string($_POST['music']);
	$books=mysql_real_escape_string($_POST['books']);
	$tv=mysql_real_escape_string($_POST['tv']);
		
	$insertInfo=$infoInsert->query("UPDATE users SET about='$about', movies='$movies', music='$music', books='$books', tv='$tv' WHERE userID=$userID");
		
	header("Location:home.php");				
?>