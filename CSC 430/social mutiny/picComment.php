<?php
	require_once 'databaseLogin.php';
	
	
	$userProfile = new DBconnector();
	
	$userID=mysql_real_escape_string($_POST['userID']);
	$profileUserID=mysql_real_escape_string($_POST['profileUserID']);
	$pictureID=mysql_real_escape_string($_POST['pictureID']);
	$post=mysql_real_escape_string($_POST['post']);
	$date=date("y-m-d, G:i:s");
	
	
	$picCommentInsert=$userProfile->query("INSERT INTO pictureComments (userID, pictureID, postingUserID, post, date) VALUES ('$profileUserID', '$pictureID','$userID','$post', '$date')");
	//$picCommentBoardInsert=$userProfile->query("INSERT INTO theBoard (recipient, pictureID, sender, type, date) VALUES ('$profileUserID', '$pictureID','$userID','$post', '$date')");
	
	echo "<meta http-equiv='refresh' content='0; url=profile.php?id=".base64_encode($profileUserID)."#pictures' />";
	
	?>
	