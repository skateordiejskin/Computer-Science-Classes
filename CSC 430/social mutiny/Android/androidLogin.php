<?php
	require_once("dbLoginAndroid.php");
	$androidLogin = new DBconnector();	
	
	//$email=$_POST['email'];
	//$password=$_POST['password'];
	
	$email="a.m@csi.edu";
	$password=md5("ahmed1");
			
	$loginCount=$androidLogin->numRows($androidLogin->query("SELECT userID FROM users WHERE email='$email' and password ='$password'"));
	
	if(isset($email)&&(isset($password))&&(!empty($email))&&(!empty($password))){
		if(($loginCount==1)){
			$loginArray=$androidLogin->fetchArray($androidLogin->query("SELECT userID FROM users WHERE email='$email' and password ='$password'"));
			header("Location:webservice1.php?user=".$loginArray['userID']);
			//return $loginArray['userID'];
			//echo $loginArray['userID'];
			}
		}
	else 
		return 0;//header('Location:loginFailed.php');
		?>