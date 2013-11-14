<?php
	require_once 'databaseLogin.php';
	$userProfile = new DBconnector();
	
	$profileUserID=mysql_real_escape_string($_POST['userID']);
	$pictureID=mysql_real_escape_string($_POST['pictureID']);
	$title=htmlentities(mysql_real_escape_string($_POST['title']));
	$date=date("y-m-d, G:i:s");
	
		
	$picCommentInsert=$userProfile->query("UPDATE pictures SET title='$title' WHERE userID=$profileUserID AND pictureID=$pictureID");
	
	echo "<meta http-equiv='refresh' content='0; url=photoView.php?id=".$profileUserID."&pictureID=".$pictureID."' />";
	
	?>
	