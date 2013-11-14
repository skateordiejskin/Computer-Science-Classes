<?php
session_start();
require_once("databaseLogin.php");
$deleteAccount = new DBconnector();

$userID=$_SESSION['userID'];
$yes=$_POST['yes'];
$no=$_POST['no'];
$thumbnail="Users/user".$userID."/thumbnails".$userID;
$userDir="Users/user".$userID;

if($yes!=NULL){
	$deleteFromFriends=$deleteAccount->query("DELETE FROM friends WHERE friendID=$userID OR userID=$userID");
	$deleteFromUsers=$deleteAccount->query("DELETE FROM users WHERE userID=$userID");
	$deleteFromTheBoard=$deleteAccount->query("DELETE FROM theBoard WHERE sender=$userID OR reciever=$userID");

	rmdir($thumbnail);
	rmdir($userDir);
	echo "<h2 align='center'>Your Account is Being Deleted</h2><meta http-equiv='refresh' content='1; url=http://socialmutiny.com' />";
	session_destoy();
}
else{
	echo "<meta http-equiv='refresh' content='1; url=http://socialmutiny.com' />";
}
?>