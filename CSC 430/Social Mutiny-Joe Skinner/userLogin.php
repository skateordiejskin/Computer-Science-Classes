<?php
	session_start();
	require_once("databaseLogin.php");
	$connector = new DBconnector();	
	
	$email=mysql_real_escape_string($_POST['email']);
	$password=mysql_real_escape_string(md5(md5($_POST['password'])));
	$rememberMe=mysql_real_escape_string($_POST['rememberMe']);
		
	$loginCount=$connector->numRows($connector->query("SELECT userID FROM users WHERE email='$email' and password ='$password'"));
	
	
	if((empty($password))&&(empty($email)) || ($loginCount!=1)) 
		echo "<meta http-equiv='refresh' content='0; url=loginFailed.php' />";

	elseif(((isset($email))&&(isset($password))) && (!empty($password))&&(!empty($email))){
		if(($loginCount==1)){
			if(isset($rememberMe)){
				setcookie('email', $email, time()+3600*24*30);
				setcookie('password', $password, time()+3600*24*30);					
				}
			else{
				setcookie('email', $email, false, '/socialmutiny', 'www.joeskinner.me');
				setcookie('password', $password, false, '/socialmutiny','www.joeskinner.me');
				}
	
			header("Location:home.php");

			$loginArray=$connector->fetchArray($connector->query("SELECT userID FROM users WHERE email='$email' and password ='$password'"));
			$_SESSION['userID']=$loginArray['userID'];
			$_SESSION['time']=time();
			}
		}
?>