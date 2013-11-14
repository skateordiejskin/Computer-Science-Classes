<?php
	session_start();
	require_once("databaseLogin.php");
	$connector = new DBconnector();	
	
	$email=$_COOKIE['email'];
	$password=$_COOKIE['password'];
	if(isset($email) && isset($password)){
		$loginSelect=$connector->query("SELECT userID FROM users WHERE email='$email' and password ='$password'");
		$loginCount=$connector->numRows($loginSelect);
		if($loginCount==1){
			$loginArray=$connector->fetchArray($loginSelect);
		 	$_SESSION['userID']=$loginArray['userID'];
		 	header("Location: home.php");
		 	}
    	} 
      ?>