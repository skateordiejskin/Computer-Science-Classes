<?php

include 'includes/header.inc';

$userID=$_SESSION['userID'];
require_once("databaseLogin.php");
$connector = new DBconnector();



$currentPass=htmlentities(mysql_real_escape_string(md5(md5($_POST['currPass']))));

$newPass=htmlentities(md5(md5($_POST['newPass'])));

$passConfirm=htmlentities(mysql_real_escape_string(md5(md5($_POST['passConfirm']))));


$passwordArray=$connector->fetchArray($connector->query("SELECT password FROM users WHERE userID=$userID"));

$password=$passwordArray['password'];



if($password!=$currentPass){
	echo "That is not your current password, please try again.";
}

if($newPass!=$passConfirm){
	echo "Your new password is not the same as the password confirmation. Please Try again";
}

if(($newPass==$passConfirm)&&($currentPass==$password)){

	$passwordChange=$connector->query("UPDATE users SET password='$newPass' WHERE userID=$userID");

	if($passwordChange){

		echo "<h5 align='center'>
			<div class='span-19 last text' id='whiteboard'>Your password has been successfully changed!
		<meta http-equiv='refresh' content='2; url=http://testing.socialmutiny.com/accountSettings.php' />";
	
	}

}

?>