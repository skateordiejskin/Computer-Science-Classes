<?php
session_start();
require_once("databaseLogin.php");
$setProfilePic=new DBconnector();


$profileUserID=mysql_real_escape_string($_POST['profileUserID']);
$pictureID=mysql_real_escape_string($_POST['pictureID']);
$comment=mysql_real_escape_string($_POST['comment']);
$date=date("y-m-d, G:i:s");
$userID=mysql_real_escape_string($_SESSION['userID']);


$setProfilePic->query("UPDATE pictures SET profilePicture=0 WHERE profilePicture=1 AND userID=$userID");

$setProfilePic->query("UPDATE pictures SET profilePicture=1 WHERE pictureID=$pictureID");

echo "<meta http-equiv='refresh' content='0; url=photoView.php?id=".$profileUserID."&pictureID=".$pictureID."' />";


?>
	