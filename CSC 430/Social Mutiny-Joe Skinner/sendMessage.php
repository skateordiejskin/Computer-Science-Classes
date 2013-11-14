<?php
session_start();
require_once 'databaseLogin.php';
include 'includes/functions.inc';
$sendMessage = new DBconnector();
	
	$userID=mysql_real_escape_string($_SESSION['userID']);
	$profileUserID=mysql_real_escape_string($_POST['profileUserID']);
	$message=mysql_real_escape_string(htmlentities($_POST['message']));
	$inboxID=mysql_real_escape_string($_POST['inboxID']);
	$date=date("y-m-d, G:i:s");
	
	//$inboxID=$userID."_".$profileUserID;
	
	if($sendMessage->query("INSERT INTO messages (inboxID, senderID, recipientID, subject, message, date, unread) VALUES ('$inboxID','$userID', '$profileUserID','No Subject', '$message', '$date','1')"))		
	{

						}
	else
		echo "Message could not send";
		
	?>
	