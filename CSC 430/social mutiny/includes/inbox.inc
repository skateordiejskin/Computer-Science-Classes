<div id='inbox' class="sub section">
<br /><br />
<h2 align='center'>Inbox</h2><br />
<?php
require_once 'databaseLogin.php';
$inbox = new DBconnector();

$userID=$_SESSION['userID'];

$inboxQuery=$inbox->query("SELECT * from (SELECT inboxID, senderID, recipientID, message, date FROM messages WHERE (recipientID=$userID OR senderID=$userID) ORDER BY date DESC) as tmp GROUP BY inboxID ORDER BY date desc");

if ($inbox->numRows($inboxQuery)==0){
	echo "<div align='center'>You have no messages in your inbox!</div>";
}

else{
	while($messageFetch=$inbox->fetchArray($inboxQuery)){
		if($userID==$messageFetch['recipientID']){

			$userFetch=$inbox->fetchArray($inbox->query("SELECT firstName, lastName FROM users WHERE userID=".$messageFetch['senderID']));

			echo "<h4 align='left' class='acc_trigger'>
						<a href=\"javascript:void(0);\">".$userFetch['firstName']." ".$userFetch['lastName']."</a>
					</h4>".$messageFetch['message']."
					<h6 align='right'>".date("g:i a F j, Y" ,strtotime($messageFetch['date']))."</h6>
					<div class='acc_container'>";
			$messagesQuery=$inbox->query("SELECT senderID, recipientID, message, date, unread, subject FROM messages WHERE inboxID='$inboxID' ORDER by date DESC");
			echo "<br />";
			while($messageFetch=$inbox->fetchArray($messagesQuery)){

				if($userID==$messageFetch['senderID']){
					echo userNameLink($userID)."<br />".$messageFetch['message'];
					echo "<div id='dateText'>".date("g:i a F j, Y" ,strtotime($messageFetch['date']))."</div><hr />";
				}

				elseif($userID==$messageFetch['recipientID']){
					echo userNameLink($messageFetch['recipientID'])."<br />".$messageFetch['message'];
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


			// include "includes/messages.php?inboxID=".base64_encode($messageFetch['inboxID'])."&pid=".base64_encode($messageFetch['senderID']);

			echo "</div><hr />";
		}
		elseif($userID==$messageFetch['senderID']){
			$userFetch=$inbox->fetchArray($inbox->query("SELECT firstName, lastName FROM users WHERE userID=".$messageFetch['recipientID']));
			$inboxID=$messageFetch['inboxID'];
			echo "<h4 align='left' class='acc_trigger'>
						<a href=\"javascript:void(0);\">".$userFetch['firstName']." ".$userFetch['lastName']."</a>
					</h4>".$messageFetch['message']."
					<h6 align='right'>".date("g:i a F j, Y" ,strtotime($messageFetch['date']))."</h6>
					<div class='acc_container'>";
			$messagesQuery2=$inbox->query("SELECT senderID, recipientID, message, date, unread, subject FROM messages WHERE inboxID='$inboxID' ORDER by date DESC");
			echo "<br />";
			while($messageFetch=$inbox->fetchArray($messagesQuery2)){


				if($userID==$messageFetch['senderID']){
					echo userNameLink($userID)."<br />".$messageFetch['message'];
					echo "<div id='dateText'>".date("g:i a F j, Y" ,strtotime($messageFetch['date']))."</div><hr />";
				}

				elseif($userID==$messageFetch['recipientID']){
					echo userNameLink($messageFetch['recipientID'])."<br />".$messageFetch['message'];
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


			// include "includes/messages.php?inboxID=".base64_encode($messageFetch['inboxID'])."&pid=".base64_encode($messageFetch['senderID']);

			echo "</div><hr />";

		}
	}
}
?>
</div>
<hr />