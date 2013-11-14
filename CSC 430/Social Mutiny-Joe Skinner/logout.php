<?php
session_start();
require_once 'databaseLogin.php';
$logout = new DBconnector();
$userID=$_SESSION['userID'];
setcookie("email", "",time()-3600);
if(setcookie("email", "",time()-3600)){
	$logout->query("UPDATE users SET isOnline=0 WHERE userID=$userID");
	session_destroy();
	echo "<meta http-equiv='refresh' content='0; url=http://testing.socialmutiny.com' />";
}

?>