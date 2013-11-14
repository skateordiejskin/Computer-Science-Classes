<?php
session_start();
require_once("databaseLogin.php");
$whiteboardPost = new DBconnector();

if($_POST){
$userID=mysql_real_escape_string($_POST['userID']);
$profileUserID=mysql_real_escape_string($_POST['profileUserID']);
$post=htmlentities(mysql_real_escape_string($_POST['post']));
$home=$_POST['home'];
$date=date("y-m-d, G:i:s");

if(isset($post)&&(!empty($post))){
		$whiteboardPost->query("INSERT INTO theBoard (post, sender, recipient, type, date) VALUES ('$post','$userID','$profileUserID', 'post', '$date')");
	
}
}
else{}
?>