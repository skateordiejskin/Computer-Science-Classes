<?php
include 'includes/header.inc';
include 'includes/sidebarHome.inc';

require_once 'databaseLogin.php';
$inbox = new DBconnector();

$userID=$_SESSION['userID'];

$inboxQuery=$inbox->query("SELECT inboxID, senderID, recipientID, message, date, unread, subject FROM messages WHERE recipientID=$userID OR senderID=$userID GROUP BY inboxID ORDER BY date DESC");


echo "<br /><div class='span-19 last text' id='whiteboard'>";

if ($inbox->numRows($inboxQuery)==0){
	echo "<div align='center'>You have no messages in your inbox!</div>";
}

else{
	while($messageFetch=$inbox->fetchArray($inboxQuery)){
		if($userID==$messageFetch['recipientID']){
			
			$userFetch=$inbox->fetchArray($inbox->query("SELECT firstName, lastName FROM users WHERE userID=".$messageFetch['senderID']));
		
			echo "<div class='portfolioContainer'><h4 align='left'><a href='myMessages.php?id=".base64_encode($userID)."&pid=".base64_encode($messageFetch['senderID'])."&inboxID=".base64_encode($messageFetch['inboxID'])."'>".$userFetch['firstName']." ".$userFetch['lastName']."</a></h4>".$messageFetch['message']."<h6 align='right'>".date("g:i a F j, Y" ,strtotime($messageFetch['date']))."</h6></div><hr />";
	}
		elseif($userID==$messageFetch['senderID']){
			$userFetch=$inbox->fetchArray($inbox->query("SELECT firstName, lastName FROM users WHERE userID=".$messageFetch['recipientID']));

			echo "<div class='portfolioContainer'><h4 align='left'><a href='myMessages.php?id=".base64_encode($userID)."&pid=".base64_encode($messageFetch['recipientID'])."&inboxID=".base64_encode($messageFetch['inboxID'])."'>".$userFetch['firstName']." ".$userFetch['lastName']."</a></h4>".$messageFetch['message']."<h6 align='right'>".date("g:i a F j, Y" ,strtotime($messageFetch['date']))."</h6></div><hr />";
		}
	}
}
echo "</div>";
include 'includes/footer.inc';

?>
	 