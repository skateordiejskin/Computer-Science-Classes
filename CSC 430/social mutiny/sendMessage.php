<?php
session_start();
require_once 'databaseLogin.php';
$sendMessage = new DBconnector();
	
	$userID=mysql_real_escape_string($_SESSION['userID']);
	$profileUserID=mysql_real_escape_string($_POST['profileUserID']);
	$message=mysql_real_escape_string($_POST['message']);
	$date=date("y-m-d, G:i:s");
	
	$inboxID=$userID."_".$profileUserID;
	
	if($sendMessage->query("INSERT INTO messages (inboxID, senderID, recipientID, subject, message, date, unread) VALUES ('$inboxID','$userID', '$profileUserID','No Subject', '$message', '$date','1')"))
	echo "<meta http-equiv='refresh' content='1; url=profile.php?id=".base64_decode($profileUserID)."' />";
		
	
	else
		echo "Message could not send <meta http-equiv='refresh' content='1; url=profile.php?id=".base64_decode($profileUserID)."' />";
		
	?>
	