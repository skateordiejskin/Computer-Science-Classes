<?php
session_start();
require_once 'databaseLogin.php';
$messages = new DBconnector();

$userID=mysql_real_escape_string($_SESSION['userID']);
$otherUser=mysql_real_escape_string(base64_decode($_GET['pid']));
$inboxID=mysql_real_escape_string(base64_decode($_GET['inboxID']));

$query=$messages->query("SELECT senderID, recipientID, message, date, unread, subject FROM messages WHERE inboxID='$inboxID' ORDER by date DESC");
$changeUnread = $messages->query("UPDATE messages SET unread=0 WHERE inboxID='$inboxID AND recipientID='$userID''");

echo "<br />";
while($messageFetch=$messages->fetchArray($query)){


	if($userID==$messageFetch['senderID']){
		echo userNameLink($userID)."<br />".$messageFetch['message'];
		echo "<div id='dateText'>".date("g:i a F j, Y" ,strtotime($messageFetch['date']))."</div>";

		echo "<hr />";
	}

	elseif($userID==$messageFetch['recipientID']){
		echo userNameLink($otherUser)."<br />".$messageFetch['message'];
		echo "<div id='dateText'>".date("g:i a F j, Y" ,strtotime($messageFetch['date']))."</div>";

		echo "<hr />";
	}
}

echo "<form action='sendMessage.php' method='post'>
				<input type='hidden' name='userID' id='userID' value='".$userID."' />
				<input type='hidden' name='profileUserID' id='profileUserID' value='".$otherUser."' />
				<input type='hidden' name='inboxID' id='inboxID' value='".$inboxID."' />
				Reply:<br /><textarea name='message' id='body' rows='5' cols='50'/></textarea>
				<input type='submit' value='Send' /></form>";


include 'includes/footer.inc';


?>
	 