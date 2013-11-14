<?php
session_start();
require_once("databaseLogin.php");
$whiteboardPost = new DBconnector();

$userID=mysql_real_escape_string($_POST['userID']);
$profileUserID=mysql_real_escape_string($_POST['profileUserID']);
$post=htmlentities(mysql_real_escape_string($_POST['post']));
$date=date("y-m-d, G:i:s");

if(isset($post)&&(!empty($post))){
	if(($_POST['home']==1)){
		$whiteboardPost->query("INSERT INTO theBoard (post, sender, recipient, type, date) VALUES ('$post','$userID','$userID', 'post', '$date')");
		echo "<meta http-equiv='refresh' content='0; url=home.php' />";
	}
	elseif($_POST['home']!=1){
		$whiteboardPost->query("INSERT INTO theBoard (post, sender, recipient, type, date) VALUES ('$post','$userID','$profileUserID', 'post', '$date')");
		echo "<meta http-equiv='refresh' content='0; url=profile.php?id=".$profileUserID."' />";
	}
}
elseif(!isset($post)&&(empty($post))){
	if($_POST['home']==1)
		echo "<meta http-equiv='refresh' content='0; url=home.php' />";
	elseif($_POST['home']!=1)
		echo "<meta http-equiv='refresh' content='0; url=profile.php?id=".$profileUserID."' />";

}
?>