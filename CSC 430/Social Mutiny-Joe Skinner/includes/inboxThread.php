<?php
session_start();
require_once '../databaseLogin.php';
include 'functions.inc';
$inbox = new DBconnector();
//$inboxID=$_GET['inboxid'];
$userID=$_SESSION['userID'];
$inboxID=$_POST['inboxid'];


$messagesQuery=$inbox->query("SELECT senderID, recipientID, message, date, unread, subject FROM messages WHERE inboxID='$inboxID' ORDER by date DESC limit 10");
while($messageFetch=$inbox->fetchArray($messagesQuery)){

	if($userID==$messageFetch['recipientID']){
		$userFetch=$inbox->fetchArray($inbox->query("SELECT firstName, lastName FROM users WHERE userID=".$messageFetch['senderID']));
		echo userNameLink($messageFetch['senderID'])."
					<br />"
			.$messageFetch['message'];
		echo "<div class='dateText'>
					".date("g:i a F j, Y" ,strtotime($messageFetch['date']))."
						</div>
						<hr />";
	}


	elseif($userID==$messageFetch['senderID']){
		echo userNameLink($userID)."
					<br />"
			.$messageFetch['message'];
		echo "<div class='dateText'>
					".date("g:i a F j, Y" ,strtotime($messageFetch['date']))."
					</div>
					<hr />";
	}
}
?>
</div>
